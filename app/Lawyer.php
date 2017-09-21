<?php

namespace yuridik;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use yuridik\Notifications\LawyerResetPasswordNotification;

use Illuminate\Database\Eloquent\Collection;
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
    public function educations(){
        return $this->hasMany('yuridik\Education');
    }

    public function user()
    {
        return $this->belongsTo('yuridik\User');
    }
    public function blogs()
    {
        return $this->morphMany('yuridik\Blog', 'blogable');
    }
    public function categories()
    {
        return $this->belongsToMany('yuridik\Category', 'lawyer_category');
    }

    public function comments()
    {
        return $this->morphMany('yuridik\Comment', 'commentable');
    }

    public function answers()
    {
        return $this->morphMany('yuridik\Answer', 'lawyerable');
    }
    public function questions(){
        $collections = collect();
        foreach($this->answers->unique('question_id') as $answer)
         $collections->push($answer->question);
        return $collections;
    }
    public function requests()
    {
        return $this->hasMany('yuridik\Request');
    }
    public function questionNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\QuestionsNotification');
    }
    public function blogNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\BlogsNotification');
    }
    public function commentNotifications(){
        return $this->unreadNotifications()->where('type', 'yuridik\Notifications\CommentsNotification');
    }
    public function feedbacks()
    {
        return $this->hasManyThrough('yuridik\Feedback', 'yuridik\Answer','lawyerable_id','answer_id');
    }

    public function files()
    {
        return $this->morphMany('yuridik\File', 'fileable');
    }

    public function countPositiveFeedbacks()
    {
        return $this->feedbacks->where('helped', 1)->count();
    }

    public function countNegativeFeedbacks()
    {
        return $this->feedbacks->where('helped', 0)->count();
    }
}
