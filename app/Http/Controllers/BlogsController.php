<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
   public function index()
   {
       return view('blogs.index');
   }



   public function store(Request $request)
   {

    $this->validate($request, [
        'body'=> 'required',
        'name'=> 'required',
        'slug'=> 'required'
    ]);

    $request->user()->blogs()->create([
        'body'=> $request->body,
        'name'=> $request->name,
        'slug'=> $request->slug,
    ]);
    
        return back();
   }
}
