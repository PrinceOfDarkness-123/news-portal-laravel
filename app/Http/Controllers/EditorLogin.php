<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorLogin extends Controller
{
    //for render login form
    public function loginForm() {
        return view('auth.login');
    }
    //for login scenario
    public function login(Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);

    $remember = $request->filled('remember');
    if (Auth::attempt($credentials, $remember)) {
        // Regenerate session to prevent fixation
        $request->session()->regenerate();

        // Check if logged-in user has editor role
        if (Auth::user()->role === "editor") {
            return redirect()->route('admin.dashboard');
        } else {
            Auth::logout();
            return back()->withErrors([
            'admin_access_denied' => 'This login form is for editors only.',
            ])->onlyInput('email');
        }
    } else {
        return back()->withErrors([
            'invalid_cred' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
  }
}