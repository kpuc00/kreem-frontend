<?php

namespace App\Http\Controllers\InternalAPI;

use App\Http\Controllers\Controller;
use App\Http\Middleware\UserReady;
use App\Models\BlockOff;
use App\Models\CallIn;
use App\Models\Shift;
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

    public function blockOffShift(int $shift_id){
        $user = Auth::user();
        $blockOff = new BlockOff();
        $blockOff->shift()->associate(new Shift(['id' => $shift_id]));

        try {
            return $user->blockOffs()->save($blockOff);
        }catch (QueryException  $ex){
            return $this->badRequest($ex->errorInfo);
        }

   }

   public function removeBlockOffFromShift(int $shift){
        $authUser = Auth::user();

        BlockOff::query()
            ->where('user_id', '=', $authUser->id)
            ->where('scheduled_shift_id', '=', $shift)
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
