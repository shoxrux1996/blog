<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function lawyer(){
    	return $this->belongsTo('yuridik\Lawyer');
    }

    public function files()
    {
        return $this->morphMany('yuridik\File', 'fileable');
    }

    public function question(){
        return $this->belongsTo('yuridik\Question');
    }
}
