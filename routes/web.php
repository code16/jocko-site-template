<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages/home', [
        'page' => \App\Models\Page::firstWhere('key', 'home'),
        'posts' => \App\Models\Post::all(),
    ]);
})->name('home.index');

Route::get('/post/{post}', function (\App\Models\Post $post) {
    return view('pages/post', [
        'post' => $post,
    ]);
})->name('post.show');
