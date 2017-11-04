<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function client()
    {
        return $this->belongsTo('yuridik\Client');
    }

    public function category()
    {
        return $this->belongsTo('yuridik\Category');
    }

    public function files()
    {
        return $this->morphMany('yuridik\File', 'fileable');
    }

    public function answers()
    {
        return $this->hasMany('yuridik\Answer');
    }

    public function order()
    {
        return $this->morphOne('yuridik\Order', 'typeable');
    }
    public function fees(){
        return $this->morphMany('yuridik\Fee', 'feeable');
    }
    public function notPayed(){
        return $this->fees()->exists() ? 0 : 1;
    }
    public function countAnswers()
    {
        return $this->answers()->count();
    }
    public function lawyers(){
        $collections = collect();
        $answers = $this->answers->where('lawyerable_type', 'yuridik\Lawyer')->unique('lawyerable_id');
        foreach ($answers as $answer)
            $collections->push($answer->lawyerable);
        return $collections;
    }

}
