<?php

use Illuminate\Support\Facades\Route;

// Member 1 — Home page
Route::get('/', function () {
    return view('home');
});

// Member 2 adds:  Route::get('/about', ...)    (on its own lines, below this comment)
// Member 3 adds:  Route::get('/contact', ...)
