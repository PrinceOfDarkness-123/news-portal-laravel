<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class EditorRegistration extends Controller
{
    // To render the form
    public function registrationForm() {
        return view('auth.signup');
    }
    public function registerAccount(Request $request) {
        $request->validate([
            'username' => 'required|string|min:3',
            'email' => 'required|email|regex:/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|min:8|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_\W]).+$/',
            'confirm_password' => 'required|same:password',
            'agreement' => 'required'
        ], [
            'username.required' => 'User Name is Required',
            'username.min' => 'User Name must be at least 3 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid Email',
            'email.regex' => 'Invalid Email',
            'password.required' => 'Password is Required',
            'password.min' => 'Password must be at least 8 characters',
            'password.max' => 'Password should not be more than 64 characters',
            'password.regex' => 'Password must contain at least one uppercase and lowercase characters, a number and a special character',
            'confirm_password.required' => 'Please re-enter the password here',
            'confirm_password.same' => 'Passwords do not match',
            'agreement.required' => '* You must read and accept the agreement by checking the box to proceed.'
        ]
        );
        return $request->all();
    }
}
