<?php

namespace yuridik;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use yuridik\Notifications\LawyerResetPasswordNotification;
class Lawyer extends Authenticatable
{
    use Notifiable;
    protected $guard = 'lawyer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

       /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new LawyerResetPasswordNotification($token));
    }


        public function user() 
    {
        return $this->belongsTo('yuridik\User');
    }
   
        public function categories() 
    {
        return $this->belongsToMany('yuridik\Category','lawyer_category');
    }

    public function comments()
    {
        return $this->morphMany('yuridik\Comment', 'commentable');
    }
    
    public function answers(){
        return $this->hasMany('yuridik\Answer');
    }

    public function feedbacks()
    {
        return $this->hasManyThrough('yuridik\Feedback', 'yuridik\Answer');
    }
}
