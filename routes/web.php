<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ProfileController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); 
Route::post('/register', [RegisterController::class, 'register']); 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google'); 
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update']);

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () { 
    return view('profile'); 
})->name('profile');

Route::get('/tasks', function () {
    return view('tasks');
})->name('tasks');

Route::post('/logout', function () { 
    Auth::logout(); return redirect('/login'); 
})->name('logout');