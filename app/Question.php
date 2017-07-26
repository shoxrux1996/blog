<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function client(){
       return $this->belongsTo('yuridik\Client');
    }

    public function category(){
        return $this->belongsTo('yuridik\Category');
    }
    public function files()
    {
        return $this->morphMany('yuridik\File', 'fileable');
    }
    public function answers(){
        return $this->hasMany('yuridik\Answer');
    }
    public function order()
    {
        return $this->morphMany('yuridik\Order', 'typeable');
    }
    public function countAnswers(){
        return $this->answers()->count();
    }
}
