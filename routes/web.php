<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditorLogin;
use App\Http\Controllers\EditorRegistration;
use App\Http\Controllers\NewsController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//For editor registration
Route::controller(EditorRegistration::class)->prefix('editor')->group(function() {
    Route::get('/register-form','registrationForm')->name('auth.signup');
    Route::post('/create','submitData')->name('auth.create');
});

//For editor login
Route::controller(EditorLogin::class)->prefix('editor')->group(function() {
    Route::get('/login-form','loginForm')->name('auth.login');
    Route::post('/login','login');
});

Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->middleware(['signed'])->name('verification.verify');