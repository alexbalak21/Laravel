<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


//Register Route
Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'register']);
