<?php

namespace App\Models;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'scheduled_shift';
    protected $guarded = [];
    public $timestamps = false;

    public function type(){
        return $this->belongsTo(ShiftType::class, 'shift_id');
    }

    public function callIns(){
        return $this->hasMany(CallIn::class, 'scheduled_shift_id');
    }

    public function blockOffs(){
        return $this->hasMany(BlockOff::class, 'scheduled_shift_id');
    }

    public function calculateDuration()
    {
        $start = new \DateTime($this->type->start_hour);
        $end = new \DateTime($this->type->end_hour);

        if($end < $start)
            $end->add(new \DateInterval("P1D"));
        $duration = $start->diff($end);

        $this->duration =  $duration->h + $duration->m / 60;
    }

}

