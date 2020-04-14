<?php

namespace App\Http\Controllers;

use App\Http\Middleware\UserReady;
use App\User;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(UserReady::class);
    }


    public function index(){

        $startCalendar = new DateTime('first day of this month');
        $startCalendar->modify('Monday this week');
        $startCalendarString = $startCalendar->format('yy-m-d');

        $endCalendar = $startCalendar->add(new DateInterval('P6W'))->format('yy-m-d');

        $shifts = Auth::user()->shifts
            ->where('date', '>=', $startCalendarString)
            ->where('date', '<', $endCalendar)
            ->sortBy('date')
            ->load('type')
            ->toArray()
            ;

        $shifts = array_values($shifts);
        $shifts = array_map(
            function($row){
            return [
                'date' => $row['date'],
                'shift' =>  $row['type']
            ];
        } , $shifts);


        return json_encode($shifts, JSON_OBJECT_AS_ARRAY);
    }
}
