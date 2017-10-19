<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function lawyerable()
    {
        return $this->morphTo();
    }

    public function files()
    {
        return $this->morphMany('yuridik\File', 'fileable');
    }

    public function question()
    {
        return $this->belongsTo('yuridik\Question');
    }

    public function feedback()
    {
        return $this->hasOne('yuridik\Feedback');
    }
    public function lawyerFee(){
        return $this->question->fees()->where('user_id',$this->lawyerable->user->id)->first();
    }

}
