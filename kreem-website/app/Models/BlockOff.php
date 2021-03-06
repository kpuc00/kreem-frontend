<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BlockOff extends Model
{
    protected $table = 'block_off';
    public $timestamps = false;

    protected $guarded = [];

    public function shift(){
        return $this->belongsTo(Shift::class, 'scheduled_shift_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
