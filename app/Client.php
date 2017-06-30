<?php

namespace yuridik;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use yuridik\Notifications\ClientResetPasswordNotification;
class Client extends Authenticatable
{
    use Notifiable;
    protected $guard = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'confirmed',
    ];

       /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 protected $hidden = [
        'password', 'remember_token', 'confirmation_code',
    ];
  
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }

        public function user() 
    {
        return $this->belongsTo('yuridik\User');
    }

    public function comments()
    {
        return $this->morphMany('yuridik\Comment', 'commentable');
    }

    public function questions(){
        return $this->hasMany('yuridik\Question');
    }


}
