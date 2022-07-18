<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function create(array $data){
           
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
      $maxscheduled_date=date('Y-m-d'." ".$start_time, mktime(0, 0, 0, date("m"), date("d")+90, date("Y")));
      $i=0;
      do{
        //echo $startscheduled_date." ".$endscheduled_date;
        $data['start_scheduleddate'] = $startscheduled_date;
        $data['end_scheduleddate'] = $endscheduled_date;
        $schedule = new Schedule();
        $schedule->event_id = $data['event_id'];
        $schedule->start_time = $data['start_scheduleddate'];
        $schedule->end_time = $data['end_scheduleddate'];
        $schedule->save();
        $i=$i+1;
        $k=$i*7;
        $endscheduled_date=date('Y-m-d'." ".$end_time, mktime(0, 0, 0, date("m"), date("d")+$m+$k, date("Y")));
        $startscheduled_date=date('Y-m-d'." ".$start_time, mktime(0, 0, 0, date("m"), date("d")+$m+$k, date("Y")));
    }
    while($maxscheduled_date>$startscheduled_date);

    
    }
}
