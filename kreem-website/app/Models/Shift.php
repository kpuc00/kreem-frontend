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

    public function call_ins(){
        return $this->hasMany(Call_In::class, 'scheduled_shit_id');
    }

    public function blockOffs(){
        return $this->hasMany(BlockOff::class, 'scheduled_shit_id');
    }
}

