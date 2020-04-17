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

        $user = Auth::user();

        $filterByCurrentUser = function($query) {
            $query->where('user_id', '=', Auth::user()->id);
        };

        $shifts = $user->shifts
            ->where('date', '>=', $startCalendarString)
            ->where('date', '<', $endCalendar)
            ->sortBy('date')
            ->load('type')
            ->load(['blockOffs' => $filterByCurrentUser ])
            ->load(['callIns' => $filterByCurrentUser ])
            ->toArray()
            ;

        $response_data = array_values($shifts);
        $response_data = array_map(
            function($row){
            return [
                'id' => $row['id'],
                'date' => $row['date'],
                'type' =>  $row['type'],
                'blockOff' =>  $row['block_offs'][0] ?? null,
                'callIn' =>  $row['call_ins'][0] ?? null,
            ];
        } , $response_data);

        return $this->modelToJson($response_data);
    }
}
