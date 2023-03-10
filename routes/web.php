<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages/home', [
        'page' => \App\Models\Page::firstWhere('key', 'home'),
    ]);
});
