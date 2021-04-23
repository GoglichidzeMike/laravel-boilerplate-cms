<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/dashboard/blogs', [BlogsController::class,'blog_dashboard_index'])->name('blog.dashboard');
Route::get('/dashboard/blogs/create', [BlogsController::class,'blog_create'])->name('blog.create');
Route::get('/dashboard/blogs/{slug}', [BlogsController::class,'blog_show'])->name('blog.show');
Route::get('/dashboard/blogs/edit/{id}', [BlogsController::class,'blog_edit'])->name('blog.edit');
Route::post('/dashboard/blogs/update/{id}', [BlogsController::class,'blog_update'])->name('blog.update');
Route::post('/dashboard/blogs/{id}', [BlogsController::class,'blog_delete'])->name('blog.destroy');

Route::get('/blogs', [BlogsController::class,'index'])->name('blogs');
Route::post('/blogs', [BlogsController::class,'store']);



Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');



