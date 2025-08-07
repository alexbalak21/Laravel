<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Register Route
Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'register']);

// Logout Route
Route::post('/logout', [UserController::class, 'logout']);

//Login Route
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);

//Profile Route
Route::get('/profile', function () {
    return view('profile');
});
