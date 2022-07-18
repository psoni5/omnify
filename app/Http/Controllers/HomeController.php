<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Event;

class HomeController extends Controller
{
    public function home()
    {
        
        if(Auth::check()){
            $id = Auth::user()->id;
            $events = Event::where('user_id',$id)->get();
            $data = [];
            foreach($events as $event){
                $event_name = $event->name;
                $event_id  = $event->id;
                $schedules = Schedule::where('event_id',$event_id)->get();
                
                foreach($schedules as $schedule){
                    $data[] = array('event_name'=>$event_name,'start_time'=>$schedule->start_time,
                    'end_time'=>$schedule->end_time);
                }
            }
            return view('auth.home')->with('data',$data);
        }
   
        return redirect("login")->withSuccess('are not allowed to access');
    }
}
