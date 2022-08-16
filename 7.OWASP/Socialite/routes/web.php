<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//socialite routes
//Google
Route::get('/public/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/public/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
//Facebook
Route::get('/public/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/public/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);
// end socialite routes

Auth::routes(['register' => false]);


