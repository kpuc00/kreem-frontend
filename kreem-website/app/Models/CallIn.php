<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CallIn extends Model
{
    protected $table = 'call_in';
    public $timestamps = false;

    protected $guarded = [];

    public function shift(){
        return $this->belongsTo(Shift::class, 'scheduled_shift_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
