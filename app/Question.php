<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function lawyer(){
       return $this->belongsTo('yuridik\Client');
    }

    public function category(){
        return $this->belongsTo('yuridik\Category');
    }
}
