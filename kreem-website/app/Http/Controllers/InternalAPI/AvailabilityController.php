<?php

namespace App\Http\Controllers\InternalAPI;

use App\Http\Controllers\Controller;
use App\Http\Middleware\UserReady;
use App\Models\BlockOff;
use App\Models\Shift;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends BaseAPIController
{
    public function __construct()
    {
        $this->middleware(UserReady::class);
    }

    public function blockOffShift(int $shift){
        $user = Auth::user();
        $blockOff = new BlockOff();
        $blockOff->shift()->associate(new Shift(['id' => $shift]));

        try {
            return $user->blockOffs()->save($blockOff);
        }catch (QueryException  $ex){
            return response($ex->errorInfo, 400);
        }

   }
}
