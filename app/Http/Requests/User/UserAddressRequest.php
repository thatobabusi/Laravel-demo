<?php

namespace App\Http\Requests;
use App\User;

class UserAddressRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find($this->user()->id);

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'dob' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $this->request->get('hidden_id'),
                    'password' => $user->id ==  $this->request->get('hidden_id') ? 'required|confirmed' : '',
                    'department' => 'required|max:255',
                ];
            }
            default:
                break;
        }
    }
}
