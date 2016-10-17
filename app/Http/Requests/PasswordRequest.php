<?php

namespace App\Http\Requests;
use App\User;

class PasswordRequest extends Request
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
                    'password' => 'required|confirmed|min:6',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'password' => $user->id ==  $this->request->get('hidden_id') ? 'required|confirmed' : '',
                ];
            }
            default:
                break;
        }
    }
}
