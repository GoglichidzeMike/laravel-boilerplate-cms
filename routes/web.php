<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//some public routes
Route::get('/', function(){
    return view('home');
})->name('home');


Route::get('/contact', function(){
    return view('contact.index');
})->name('contact');





// Route::post('/upload', function(Request $request){
//     $file=$request->file('file');
//     $filename = date('YmdHis') . $file->getClientOriginalExtension();
//     $path= url('/uploads/image').'/'.$filename;
//     $file->move(public_path('/uploads/image'),$filename);
//     $fileNameToStore= $path;

//     return json_encode(['location' => $fileNameToStore]); 
// });


//dashboard route
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


//blogs route
Route::get('/dashboard/blogs', [BlogsController::class,'index_dashboard'])->name('blog.dashboard')->middleware('auth');
Route::get('/dashboard/blogs/create', [BlogsController::class,'create'])->name('blog.create')->middleware('auth');
Route::get('/dashboard/blogs/{slug}', [BlogsController::class,'show'])->name('blog.show')->middleware('auth');
Route::get('/dashboard/blogs/edit/{id}', [BlogsController::class,'edit'])->name('blog.edit')->middleware('auth');
Route::post('/dashboard/blogs/update/{id}', [BlogsController::class,'update'])->name('blog.update')->middleware('auth');
Route::post('/dashboard/blogs/{id}', [BlogsController::class,'destroy'])->name('blog.destroy')->middleware('auth');
Route::post('/dashboard/blog/upload', [BlogsController::class,'image_upload'])->middleware('auth');

Route::get('/blogs', [BlogsController::class,'index'])->name('blogs');    // TODO: need to move this to public-blogs
Route::get('/blogs/{slug}', [BlogsController::class,'public_show'])->name('public_blogs.show');
Route::post('/blogs', [BlogsController::class,'store']);


// contact controllers
Route::get('/dashboard/leads', [LeadController::class, 'index'])->name('lead.dashboard');
Route::post('/contact', [LeadController::class,'store']);
Route::post('/contact/leads/{id}', [LeadController::class, 'destroy'])->name('lead.destroy');
Route::get('/leads/{id}', [LeadController::class, 'show'])->name('lead.show');

//Auth routes
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);
Route::post('/logout', [LogoutController::class,'store'])->name('logout');