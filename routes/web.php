<?php

use Illuminate\Support\Facades\Route;

// Main route
Route::get('/', function () {
    return view('home');
});

// Include user-related routes
require __DIR__ . '/userRoutes.php';

// Include post-related routes
require __DIR__ . '/postRoutes.php';
