<?php

namespace App\Http\Controllers;

use App\Models\Blog;



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

}
