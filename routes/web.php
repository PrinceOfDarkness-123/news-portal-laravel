<?php

use App\Http\Controllers\CategoryController;
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
});

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.index');
