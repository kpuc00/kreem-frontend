<?php

namespace App\Http\Controllers\InternalAPI;

use App\Http\Middleware\UserReady;
use App\User;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ScheduleController extends BaseAPIController
{
    public function __construct()
    {
        $this->middleware(UserReady::class);
    }


    public function index($date = null ){

        try {
            $date = new DateTime($date ?? 'now');
        } catch (\Exception $e) {
            throw new BadRequestHttpException("Date format is not supported, try yyyy-mm-dd, Michael. Pfff.. frontenders");
        }

        $startCalendar = new DateTime($date->format('yy-m-d'));
        $startCalendar->modify('first day of this month');
        $startCalendar->modify('Monday this week');
        $startCalendarString = $startCalendar->format('yy-m-d');

        $endCalendar = $startCalendar->add(new DateInterval('P6W'))->format('yy-m-d');

        $shifts = Auth::user()->shifts
            ->where('date', '>=', $startCalendarString)
            ->where('date', '<', $endCalendar)
            ->sortBy('date')
            ->load('type')
            ->load('blockOffs')
            ->load('call_ins')
            ->toArray()
            ;

        $response = array_values($shifts);
        $response = array_map(
            function($row){
            return [
                'id' => $row['id'],
                'date' => $row['date'],
                'shift' =>  $row['type'],
                'blockOffs' =>  $row['block_offs'],
                'call_ins' =>  $row['call_ins'],
            ];
        } , $response);

        return $this->modelToJson($response);
    }
}
