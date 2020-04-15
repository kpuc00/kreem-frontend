<?php

namespace App;

use App\Models\BlockOff;
use App\Models\Call_In;
use App\Models\Shift;
use DateTime;
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

    protected $guarded = [];

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

    //Disables the updated at assignment
    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function setPasswordAttribute($value){
        $this->password_changed_at = new DateTime();
        $this->password_hash = $value;
    }

    public function username()
    {
        return 'email';
    }

    public function shifts(){
        return $this->belongsToMany(Shift::class, 'user_scheduled_shift', 'user_id','scheduled_shift_id');
    }

    public function call_ins(){
        return $this->hasMany(Call_In::class, 'user_id');
    }

    public function blockOffs(){
        return $this->hasMany(BlockOff::class, 'user_id');
    }
}
