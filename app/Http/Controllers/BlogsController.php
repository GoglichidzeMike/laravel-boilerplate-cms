<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //public blogs index
    public function index()
   {
    $blogs = Blog::paginate(10); 
    
    return view('blogs.index', [ 
        'blogs' => $blogs
    ]);
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


   //blog dashboard index

   
    public function blog_dashboard_index()
    {
       $blogs = Blog::paginate(20); 
        
       return view('dashboard.blogs.index', [ 
        'blogs' => $blogs
       ]);
    }

    //blog dashboard create page


    public function blog_create()
    {
       return view('dashboard.blogs.create');
    }

   //blog dashboard edit
   
   //blog dashboard update
   
   //blog dashboard delete

   //blog dashboard 




}
