<?php

namespace App\Http\Controllers\InternalAPI;

use App\Http\Controllers\Controller;
use App\Http\Middleware\UserReady;
use App\Models\BlockOff;
use App\Models\CallIn;
use App\Models\Shift;
use App\Models\ShiftType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AvailabilityController extends BaseAPIController
{
    public function __construct()
    {
        $this->middleware(UserReady::class);
    }

    public function blockOffShift(Request $request){

        try {
            $request_data = $request->validate([
                'date' => 'required|date',
                'type' => 'required|in:Morning,Noon,Night'
            ]);
            $shift_date = $request_data['date'];
            $shift_type = $request_data['type'];
        }catch (ValidationException $ex){
            return $this->badRequest($ex->errors());
        }

        $blockOff = new BlockOff();

        $shift = Shift::query()
            ->whereDate('date', '=', $shift_date)
            ->whereHas('type', function($query) use ( $shift_type ){
                $query->where('name', '=', $shift_type);
            })->first();

        if(!$shift){
            $type = ShiftType::query()
                ->where('name', '=', $shift_type)
                ->first();

            $shift = new Shift(['date' => $shift_date]);
            $shift->type()->associate($type);
            $shift->calculateDuration();
            $shift->save();
        }

        $blockOff->shift()->associate($shift);
        $user = Auth::user();

        try {
            return $user->blockOffs()->save($blockOff);
        }catch (QueryException  $ex){
            return $this->badRequest($ex->errorInfo);
        }

   }

   public function removeBlockOffFromShift(int $id){
        $authUser = Auth::user();

        //filter on both columns to make sure that a user can only
        //delete their own Block Offs
        BlockOff::query()
            ->where('user_id', '=', $authUser->id)
            ->where('id', '=', $id)
            ->delete()
            ;
        return $this->noContent();
   }

   public function callInForShift(int $shift_id, Request $request){

       try {
           $request_data = $request->validate([
               'reason' => 'required',
           ]);
       }catch (ValidationException $ex){
           return $this->badRequest($ex->errors());
       }

        $callIn = new CallIn($request_data);
        $callIn->shift()->associate(new Shift(['id' => $shift_id]));
        $callIn->user()->associate(Auth::user());

       try {
          $callIn->save();
          $callIn->unsetRelation('user');
          return $callIn;
       }catch (QueryException  $ex){
           return $this->badRequest($ex->errorInfo);
       }

   }
}
