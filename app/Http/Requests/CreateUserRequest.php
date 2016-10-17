<?php

namespace App\Http\Requests;
use App\User;

class CreateUserRequest extends Request
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
                    'gender'   => 'required|in:male,female',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'dob' => 'required|max:255',
                    'email' => 'required|email|unique:users,email,' . $this->request->get('hidden_id'),
                    'gender'   => 'required|in:male,female',
                ];
            }
            default:
                break;
        }
    }
}
