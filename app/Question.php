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
    public function files(){
    	return $this->belongsToMany('yuridik\File', 'question_file');
    }
}
