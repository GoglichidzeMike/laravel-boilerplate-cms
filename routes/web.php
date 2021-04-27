<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;


//some public routes
Route::get('/', function(){
    return view('home');
})->name('home');


Route::get('/contact', function(){
    return view('contact.index');
})->name('contact');


// Route::post('/upload', function(){
//     // $imgpath = request()->file('image')->store('uploads', 'public');    


//     // return response()->json(['location' => $imgpath]);

// });
Route::post('/upload', function(Request $request){
    // $imgpath = request()->file('image')->store('uploads', 'public');    
    // $imgpath = $request;    

    $image = request()->file('image');
    $destinationPath = 'uploads/image/';
    $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $filename);


    return json_encode(['location' => $filename ]);
});


//dashboard route
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


//blogs route
Route::get('/dashboard/blogs', [BlogsController::class,'index_dashboard'])->name('blog.dashboard')->middleware('auth');
Route::get('/dashboard/blogs/create', [BlogsController::class,'create'])->name('blog.create')->middleware('auth');
Route::get('/dashboard/blogs/{slug}', [BlogsController::class,'show'])->name('blog.show')->middleware('auth');
Route::get('/dashboard/blogs/edit/{id}', [BlogsController::class,'edit'])->name('blog.edit')->middleware('auth');
Route::post('/dashboard/blogs/update/{id}', [BlogsController::class,'update'])->name('blog.update')->middleware('auth');
Route::post('/dashboard/blogs/{id}', [BlogsController::class,'destroy'])->name('blog.destroy')->middleware('auth');

Route::get('/blogs', [BlogsController::class,'index'])->name('blogs');    // TODO: need to move this to public-blogs
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