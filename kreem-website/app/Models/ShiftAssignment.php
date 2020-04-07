<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShiftAssignment extends Model
{
    protected $table = 'user_scheduled_shift';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shift(){
        return $this->belongsTo(Shift::class, 'scheduled_shift_id');
    }
}
