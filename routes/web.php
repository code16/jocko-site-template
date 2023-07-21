<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/posts/index/{page?}', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/index/filter/{length}:{alpha}/{page?}', [PostsController::class, 'index'])->name('posts.index.filter');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
