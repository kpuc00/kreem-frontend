<?php

namespace App;

use App\Models\Shift;
use App\Models\ShiftAssignment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function username()
    {
        return 'email';
    }

    public function assignedShifts(){
        return $this->hasMany(ShiftAssignment::class);
    }

    public function shifts(){
        return $this->belongsToMany(Shift::class, 'user_scheduled_shift', 'user_id','scheduled_shift_id');
    }
}
