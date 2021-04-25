<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/dashboard/blogs', [DashboardController::class,'blog_dashboard_index'])->name('blog.dashboard');
Route::get('/dashboard/blogs/create', [DashboardController::class,'blog_create'])->name('blog.create');
Route::get('/dashboard/blogs/{slug}', [DashboardController::class,'blog_show'])->name('blog.show');
Route::get('/dashboard/blogs/edit/{id}', [DashboardController::class,'blog_edit'])->name('blog.edit');
Route::post('/dashboard/blogs/update/{id}', [DashboardController::class,'blog_update'])->name('blog.update');
Route::post('/dashboard/blogs/{id}', [DashboardController::class,'blog_delete'])->name('blog.destroy');
Route::post('/blogs', [DashboardController::class,'store']);



Route::get('/blogs', [BlogsController::class,'index'])->name('blogs');



Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');



