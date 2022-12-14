<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
class userCalendar extends Controller
{
       /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
      
        // dd("hello world!");
        if($request->ajax()) {
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
                      
             return response()->json($data);
        }
  
        return view('dashboard.user.dashboard');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
      // dd("request received");
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
                // dd($request->id);
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}
