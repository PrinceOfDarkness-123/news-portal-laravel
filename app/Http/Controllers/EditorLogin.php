<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorLogin extends Controller
{
    //for render login form
    public function loginForm() {
        return view('auth.login');
    }
}
