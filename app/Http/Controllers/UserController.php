<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\PasswordRequest;
use App\PermissionCategory;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->middleware('auth', ['only' => [
            'index', 'show', 'create', 'edit', 'update', 'destroy', 'store',
        ]]);

        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(5);

        return view('users.index', compact('users'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editCompany(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required|max:255',
            'department' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
        ]);

        if (!$validator->fails()) {
            $company = Company::firstOrNew(
                [
                    'company' => $request->company,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            $company->Save();

            $user->Department()->detach();
            $company->Department()->attach($request->department, ['user_id' => $user->id]);

            flash()->success('Profile has been updated successfully.');

            return redirect()->route('editUser_path', $user->username);

        } else {

            flash()->error('Profile update un-successfully. Please make sure there are all fields are filled in correctly.');

            return redirect()->route('editUser_path', $user->username)
                ->withErrors($validator)
                ->withInput();
        }
    }


    /**
     * @param User $user
     * @return mixed
     */
    public function show(User $user)
    {
        if (Auth::user()->hasPermissionTo('View Profiles') || Auth::user()->id == $user->id || Auth::user()->hasRole('Admin'))
        {
            $users = $this->user->get();

            return view('users.user', compact('user', 'users'));
        }

        flash()->warning('You dont have permission to access this.');
        return redirect()->route('users_path');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return mixed
     */
    public function edit(User $user)
    {
        $permission_categories = PermissionCategory::all();
        $roles = Role::all();
        $departments = Department::all();

        $userInfo = $user
            ->select('users.*', 'companies.*', 'company_departments.department_id as department')
            ->join('company_departments', 'users.id', '=', 'company_departments.user_id')
            ->join('companies', 'companies.id', '=', 'company_departments.company_id')
            ->join('departments', 'departments.id', '=', 'company_departments.department_id')
            ->where('users.id', '=', $user->id)
            ->first();

        if(!isset($userInfo)) {
            //flash()->warning('Profile NOT complete.');
            $userInfo = $user;
        }

        return view('users.edit', compact('user', 'permission_categories', 'departments',
            'roles', 'userInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param CreateUserRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(User $user, CreateUserRequest $request)
    {
        $user->fill($request->input())->save();

        $user->save();

        flash()->success('Profile has been updated successfully.');

        return redirect()->route('showUsers_path', [$user->username]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editSettings(User $user)
    {
        return view('users.user-settings', compact('user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPassword(User $user) {
        return view('users.password', compact('user'));
    }

    /**
     * @param User $user
     * @param PasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePassword(User $user, PasswordRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6|confirmed'
        ]);

        $pass = auth()->attempt([
            'password' => $request->current_password
        ]);

        if (!$pass) {

            $validator->getMessageBag()->add('current_password', 'Incorrect password. Please try again.');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->password = bcrypt($request->get('new_password'));

        $user->save();

        flash()->success('Password has been updated successfully.');

        return redirect()->route('showUsers_path', [$user->username]);
    }

    /**
     * @param $user
     * @param $request
     * @return bool
     */
    private function Permissions($user, $request) {
        unset($request['_token'], $request['hidden_type']);
        if(!isset($user)) {
            $user = User::find(session('user_key'));
        }

        $old_roles = $user->roles()->get();

        $user->permissions()->detach();
        $user->roles()->detach();

        $role_count = 0;
        foreach ($request->all() as $item) {
            if (Permission::where('name', $item)->count()) {
                $user->givePermissionTo($item);
            }

            if (Role::where('name', $item)->count()) {
                $user->assignRole($item);
                $role_count++;
            }
        }

        if ($role_count == 0) {
            $user->roles()->attach($old_roles);

            return false;
        }

        return true;
    }

    /**
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPermissions(User $user, Request $request)
    {
        $roles = $this->Permissions($user, $request);

        if (!$roles) {
            flash()->warning('Please select at least one Role.');
            return redirect()->route('editUser_path', $user->username);
        }

        flash()->success('Permissions and Roles added successfully .');
        return redirect()->route('editUser_path', $user->username);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePermissions(Request $request)
    {
        $roles = $this->Permissions(null, $request);

        if (!$roles) {

            return response()->json([
                'success' => false,
                'errors' => [
                    'roles' => 'Please select at least one role for this user!'
                ]
            ]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * @param User $user
     * @return mixed
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        dd($user);
        $user->delete();

        return redirect()->route('users_path');
    }

    // AJAX CREATE USER CONTROLLER METHODS ****

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function create(User $user)
    {
        $permission_categories = PermissionCategory::all();
        $roles = Role::all();
        $departments = Department::all();

        return view('users.create', compact('user', 'users'))
            ->with('permission_categories', $permission_categories)
            ->with('departments', $departments)
            ->with('roles', $roles);
    }

    /**
     * @param CreateUserRequest|Request $request
     * @return mixed
     * @internal param User $user
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'username' => 'required|min:6|max:255|unique:users',
            'dob' => 'required|date',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required',
        ]);

        if (!$validator->fails()) {
            $user = User::firstOrNew(
                [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                ]);
            $user->Save();

            session(['user_key' => $user->id]);

            flash()->success('New User created Successfully.');
            return response()->json(['success' => true]);
        } else {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postal_address' => 'required|max:255',
            'physical_address' => 'required|max:255',
        ]);

        if (!$validator->fails()) {
            $user_key = session('user_key');
            $user = User::find($user_key);

            $user->fill($request->input())->save();
            $user->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required|max:255',
            'department' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
        ]);

        if (!$validator->fails()) {
            $company = Company::firstOrNew(
                [
                    'company' => $request->company,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            $company->Save();

            $company->Department()->attach($request->department, ['user_id' => session('user_key')]);

            return response()->json(['success' => true]);
        } else {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


}
