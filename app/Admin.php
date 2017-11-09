<?php

namespace yuridik;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use yuridik\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

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

    public function blogs()
    {
        return $this->morphMany('yuridik\Blog', 'blogable');
    }
    public function questionNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\QuestionsNotification');
    }
    public function blogNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\BlogsNotification');
    }
    public function answerNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\AnswerNotification');
    }
    public function commentNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\CommentsNotification');
    }
    public function userNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\UsersNotification');
    }
    public function withdrawNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\WithdrawsNotification');
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
