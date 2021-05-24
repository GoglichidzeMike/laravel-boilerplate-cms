<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BlogsController extends Controller
{

    public function __construct()
    {  
        $this->middleware(['auth']);
    }

    //dashboard blogs start here
    public function store(Request $request)
    {
        $this->validate($request, [
            'body'=> 'required',
            'name'=> 'required',
            'slug'=> 'required|unique:blogs',
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
            'slug'=> strtolower($request->slug),
            'image'=> $filename
        ]);

        return redirect()->route('blog.dashboard')->with('status', 'Blog created successfully');
    }


    //blog dashboard index


    public function index_dashboard()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(20); 
        
        return view('dashboard.blogs.index', [ 
            'blogs' => $blogs
        ]);
    }

    //blog dashboard create page
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    //blog dashboard show

    public function show($slug)
    {

        $blog = Blog::where('slug', '=', $slug)->firstOrFail();

        return view('dashboard.blogs.show',[
            'blog' => $blog
        ]);
    }


    //blog dashboard edit
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('dashboard.blogs.edit', ['blog' => $blog]);
    }

    //blog dashboard update

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->name = $request->name;
        $blog->body = $request->body;
        $blog->slug = strtolower($request->slug);

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

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        
        File::delete('uploads/image/'.$blog->image);

        return redirect()->route('blog.dashboard')->with('status', 'Blog deleted successfully');
    }




    //handles image upload in TinyMCE 

    public function image_upload(Request $request)
    {
        $file=$request->file('file');
        $filename = date('YmdHis') ."." . $file->getClientOriginalExtension();
        $path = '/uploads/image/'.$filename;
        $file->move('uploads/image' ,$filename);
        $fileNameToStore = $path;


        return json_encode(['location' => $fileNameToStore]); 
    }


}
