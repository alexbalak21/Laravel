<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/new', [PostController::class, 'newPost'])->name('posts.new');
    Route::post('/', [PostController::class, 'create'])->name('posts.create');
    Route::get('/my', [PostController::class, 'myPosts'])->name('posts.my');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
});
