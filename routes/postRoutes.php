<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/new', [PostController::class, 'newPost'])->name('posts.new');
    Route::post('/', [PostController::class, 'create'])->name('posts.create');
});
