<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    public function index(){
        if(Auth::check()){
        return view('addevent');
        }
        return redirect('login');
    }

    public function store(Request $request){
       $data = $request->all();
       
       $event = new Event();
       $event->user_id = auth()->user()->id;
       $event->name = $data['Ename'];
       $event->description = $data['description'];
       $event->start_time = $data['start_time'];
       $event->end_time = $data['end_time'];
       $event->day = $data['day'];
       $event->save();
       $data['event_id'] = $event->id;
       $scheduler = new ScheduleController();

       $scheduler->create($data);
       return redirect('home');
    }

    public function createSchedule(array $data){

       $currentday=date('w');
       $scheduledday = intval($data['day']);
       if($scheduledday >= $currentday ){
        $m=$scheduledday-$currentday;
       }  else{
        $m=7-$currentday;
        $m=$m+$scheduledday;
      }
      $start_time = $data['start_time'];
      $end_time = $data['end_time'];
      $startscheduled_date=date('Y-m-d'." ".$start_time, mktime(0, 0, 0, date("m"), date("d")+$m, date("Y")));
      $endscheduled_date=date('Y-m-d'." ".$end_time, mktime(0, 0, 0, date("m"), date("d")+$m, date("Y")));
      $maxscheduled_date=date('Y-m-d'." ".$start_time, mktime(0, 0, 0, date("m"), date("d")+30, date("Y")));
      $i=0;
      do{
        //echo $startscheduled_date." ".$endscheduled_date;
        $data['start_scheduleddate'] = $startscheduled_date;
        $data['end_scheduleddate'] = $endscheduled_date;
        $scheduler = new ScheduleController();
        $scheduler->create($data);
        $i=$i+1;
        $k=$i*7;
        $endscheduled_date=date('Y-m-d'." ".$end_time, mktime(0, 0, 0, date("m"), date("d")+$m+$k, date("Y")));
        $startscheduled_date=date('Y-m-d'." ".$start_time, mktime(0, 0, 0, date("m"), date("d")+$m+$k, date("Y")));
    }
    while($maxscheduled_date>$startscheduled_date);

    }
}
