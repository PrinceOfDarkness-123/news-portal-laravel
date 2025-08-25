<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditorLogin;
use App\Http\Controllers\EditorRegistration;
use App\Http\Controllers\NewsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(NewsController::class)->group(function() {
    Route::get('/', 'index')->name('news.index');
    Route::get('/news/{news}', 'show')->name('news.show');
    Route::get('/news-by-category/{id}', 'index');
});
// Route for rendering news by category
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.index');

//Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware([
    'auth','verified'
])->name('admin.dashboard');

//For editor registration
Route::controller(EditorRegistration::class)->prefix('editor')->group(function() {
    Route::get('/register-form','registrationForm')->name('auth.editor.signup');
    Route::post('/create','submitData')->name('auth.editor.create');
});

//For editor login
Route::controller(EditorLogin::class)->prefix('editor')->group(function() {
    Route::get('/login-form','loginForm')->name('auth.editor.loginform');
    Route::post('/login','login')->name('auth.editor.login');
});

// Email verification notice route (required by 'verified' middleware)
Route::get('/email/verify', function () {
    $email = Auth::user()->email;
    return redirect('editor/login-form')
    ->withInput(['email' => $email])
    ->with('emailVerificationInfo', 'Your email is not verified! Please check your inbox.');
})->middleware('auth')->name('verification.notice');

Route::post('email/resendMail', function (Request $request) {
    $userEmail = User::where('email', $request->email)->first();
    
    /*if (! $userEmail) {
        return back()->with('status', 'User not found.');
    }

    if ($userEmail->hasVerifiedEmail()) {
        return back()->with('status', 'Your email is already verified.');
    }*/

    $userEmail->sendEmailVerificationNotification();
    return back()->with('status', 'A new verification link has been sent to your email.');
})->name('resend.verification');

Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->middleware(['signed'])->name('verification.verify');