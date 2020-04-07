<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'scheduled_shift';

    protected $guarded = [];

    public function assignments(){
        return $this->hasMany(ShiftAssignment::class, 'scheduled_shift_id');
    }

    public function type(){
        return $this->belongsTo(ShiftType::class, 'shift_id');
    }
}
