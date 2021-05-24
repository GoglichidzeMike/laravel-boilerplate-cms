<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Event;

class LeadController extends Controller
{

    // public function __construct()
    // {  
    //     $this->middleware(['auth']);
    // }


    
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
        ]);


        Lead::create(
            [
             'name'=> $request->name,
             'message'=> $request->message,
             'phone'=> $request->phone,
             'email'=> $request->email,
             'referrer'=> $request->referrer
            ]
        );

        return redirect(url()->previous().'#contact')->with('status', 'თქვენი შეტყობინება წარმატებით გაიგზავნა!');
    }


    public function show($id)
    {
          $lead = Lead::find($id);

          if ($lead->referrer) {
           $event = Event::where('slug', '=', $lead->referrer )->firstOrFail();
           $lead->event = $event->name;
          };

          return view('dashboard.leads.show', ['lead'=>$lead]);
    }


    public function destroy($id)
    {
        $lead = Lead::find($id);
        $lead->delete();


        return redirect()->route('lead.dashboard')->with('status', 'Lead deleted successfully');
    }


    public function exportCsv(Request $request)
    {
        $fileName = 'leads_export_' .date('YmdHis') . ".csv";
        $leads = Lead::orderBy('created_at', 'desc')->get();

        $headers = array(
            "Content-type"        => "text/csv; charset=utf-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('name', 'phone', 'email', 'message', 'referrer', 'created_at');

        $callback = function() use($leads, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($leads as $lead) {
                $row['name']  = $lead->name;
                $row['phone']    = $lead->phone;
                $row['email']    = $lead->email;
                $row['message']  = $lead->message;
                $row['referrer']  = $lead->referrer;
                $row['created_at']  = $lead->created_at->toFormattedDateString();

                fputcsv($file, array($row['name'], $row['phone'], $row['email'], $row['message'], $row['referrer'], $row['created_at']), ";");
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
