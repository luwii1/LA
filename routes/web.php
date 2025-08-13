<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TweetController::class, 'index'])
    ->name('Home');

Route::get('/profile' , function(){
    return view('profile', ['user' => Auth::user()]);
}) -> name('profile') ->middleware('auth');

Route::get('/login', [LoginController::class, 'create'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store']);


Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', LogoutController::class)
    ->name('logout');

Route::get('/tweet/{tweet}', [TweetController::class, 'view'])
    ->name('tweet.view');
Route::post('/tweet/create', [TweetController::class, 'store'])
    ->name('tweet.create');