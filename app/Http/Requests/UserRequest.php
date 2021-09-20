<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $required =  [
            'name' => 'required|string',
            'phone' => 'required|numeric|digits:12|unique:users,phone',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
        ];

        if($this->routeIs('users.update')){
            $required['email'] = 'required|email';
            $required['phone'] = 'required|numeric|digits:12';
        }
        return $required;
    }
}
