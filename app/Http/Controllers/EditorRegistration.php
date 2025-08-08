<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegFormRequest;
use App\Models\User;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class EditorRegistration extends Controller
{
    // To render the form
    public function registrationForm() {
        return view('auth.signup');
    }
    public function submitData(RegFormRequest $regRequest) {
       $regData = $regRequest->all();
       try {
             //Send to the database
          $user = User::create([
           'name' => $regData["username"],
           'email' => $regData["email"],
           'password' => Hash::make($regData["password"])
          ]);
          event(new Registered($user));
          
          $successMessage = "Verification Link Sent to Provided Email";
          return redirect()->back()->with('success', $successMessage);
       } catch (\Throwable $th) {
          return redirect()->back()->with('error', 'Something went wrong');
       }
    }
}
