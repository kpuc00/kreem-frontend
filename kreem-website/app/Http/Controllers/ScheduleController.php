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
            ->load('type');

        foreach ($shifts as $shift) {
            echo $shift->type->name . ' ' . $shift->date . '<br/>';
        }
    }
}
