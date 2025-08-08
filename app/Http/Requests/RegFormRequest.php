<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email|regex:/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|min:8|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_\W]).+$/',
            'confirm_password' => 'required|same:password',
            'agreement' => 'required',
        ];
    }
    public function messages() {
        return [
            'username.required' => 'User Name is Required',
            'username.min' => 'User Name must be at least 3 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid Email',
            'email.regex' => 'Invalid Email',
            'email.unique' => 'Looks like someone already used this email. Please enter a new one.',
            'password.required' => 'Password is Required',
            'password.min' => 'Password must be at least 8 characters',
            'password.max' => 'Password should not be more than 64 characters',
            'password.regex' => 'Password must contain at least one uppercase and lowercase characters, a number and a special character',
            'confirm_password.required' => 'Please re-enter the password here',
            'confirm_password.same' => 'Passwords do not match',
            'agreement.required' => '* You must read and accept the agreement by checking the box to proceed.'
        ];
    }
}
