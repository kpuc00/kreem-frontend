<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'scheduled_shift';

    protected $guarded = [];

    public function type(){
        return $this->belongsTo(ShiftType::class, 'shift_id');
    }

    public function callIns(){
        return $this->hasMany(CallIn::class, 'scheduled_shift_id');
    }

    public function blockOffs(){
        return $this->hasMany(BlockOff::class, 'scheduled_shift_id');
    }

}

