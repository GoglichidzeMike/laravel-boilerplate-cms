<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{


    public function __construct()
    {  
        $this->middleware(['auth']);
    }



    public function index_dashboard()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(20); 
        
        return view('dashboard.events.index', [ 
            'events' => $events
        ]);
    }



    public function store(Request $request)
    {


        $this->validate($request, [
            'body'=> 'required',
            'name'=> 'required',
            'slug'=> 'required|unique:events',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //get image, set destination path, change image name to current time in secs and save it.
        $image = $request->file('image');
        $destinationPath = 'uploads/image/';
        $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $filename);




        $request->user()->events()->create([
            'name'=> $request->name,
            'body'=> $request->body,
            'slug'=> strtolower($request->slug),
            'image'=> $filename,
            'date'=> $request->date,
            'duration'=> $request->duration
        ]);

        return redirect()->route('event.dashboard')->with('status', 'Event created successfully');
    }

    public function create()
    {
        return view('dashboard.events.create');
    }




    public function show($slug)
    {

        $event = Event::where('slug', '=', $slug)->firstOrFail();

        return view('dashboard.events.show',[
            'event' => $event
        ]);
    }




    //event dashboard edit
    public function edit($id)
    {
        $event = Event::find($id);
        return view('dashboard.events.edit', ['event' => $event]);  
    }

    
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->body = $request->body;
        $event->date = $request->date;
        $event->duration = $request->duration;

        $event->slug = strtolower($request->slug);

        if($request->hasFile('image'))
        {
            File::delete('uploads/image/'.$event->image);
            $image = $request->file('image');
            $destinationPath = 'uploads/image/';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $event->image = $filename;
        }

        $event->save();

        return redirect()->route('event.show', $event->slug)->with('status', 'Event updated successfully');
    }

    //event dashboard delete

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        
        File::delete('uploads/image/'.$event->image);

        return redirect()->route('event.dashboard')->with('status', 'Event deleted successfully');
    }

}
