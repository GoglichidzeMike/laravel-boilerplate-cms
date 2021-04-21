<?php

use Illuminate\Support\Facades\Route;


Route::get('/register', [RegisterController::class,'index'])

Route::get('/', function () {
    return view('blogs.index');
});