<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{

    public function __construct()
    {  
        $this->middleware(['auth']);
    }


    
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate(20);

        return view('dashboard.leads.index',[
            'leads' => $leads
        ]);
    }



    public function store(Request $request)
    {
        //validate all the request
        $this->validate($request,[
            'message'=> 'required',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
        ]);


        Lead::create(
            [
             'name'=> $request->name,
             'message'=> $request->message,
             'phone'=> $request->phone,
             'email'=> $request->email
            ]
        );

        return redirect()->route('contact')->with('status', 'Your Message was successfully send!');
    }


    public function show($id)
    {
          $lead = Lead::find($id);

          return view('dashboard.leads.show', ['lead'=>$lead]);
    }


    public function destroy($id)
    {
        $lead = Lead::find($id);
        $lead->delete();


        return redirect()->route('lead.dashboard')->with('status', 'Lead deleted successfully');
    }


}
