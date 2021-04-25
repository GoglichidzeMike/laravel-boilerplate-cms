<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class DashboardController extends Controller

{
    public function __construct()
    {  
        $this->middleware(['auth']);
    }


    public function index()
    {
        return view('dashboard');
    }


    /// for dashboard

    public function store(Request $request)
    {
    $this->validate($request, [
        'body'=> 'required',
        'name'=> 'required',
        'slug'=> 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    //get image, set destination path, change image name to current time in secs and save it.
    $image = $request->file('image');
    $destinationPath = 'uploads/image/';
    $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $filename);

    $request->user()->blogs()->create([
        'body'=> $request->body,
        'name'=> $request->name,
        'slug'=> $request->slug,
        'image'=> $filename
    ]);

        return redirect()->route('blog.dashboard')->with('status', 'Blog created successfully');
    }


    //blog dashboard index


    public function blog_dashboard_index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(20); 
        
        return view('dashboard.blogs.index', [ 
        'blogs' => $blogs
        ]);
    }

    //blog dashboard create page
    public function blog_create()
    {
        return view('dashboard.blogs.create');
    }

    //blog dashboard show

    public function blog_show($slug)
    {

        $blog = Blog::where('slug', '=', $slug)->firstOrFail();

        return view('dashboard.blogs.show',[
            'blog' => $blog
        ]);
    }


    //blog dashboard edit
    public function blog_edit($id)
    {
        $blog = Blog::find($id);
        return view('dashboard.blogs.edit', ['blog' => $blog]);
    }

    //blog dashboard update

    public function blog_update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->name = $request->name;
        $blog->body = $request->body;

        if($request->hasFile('image'))
        {
            File::delete('uploads/image/'.$blog->image);
            $image = $request->file('image');
            $destinationPath = 'uploads/image/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->route('blog.show', $blog->slug)->with('status', 'Blog updated successfully');
    }

    //blog dashboard delete

    public function blog_delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        
        File::delete('uploads/image/'.$blog->image);

        return redirect()->route('blog.dashboard')->with('status', 'Blog deleted successfully');
    }


    //blog dashboard 



}
