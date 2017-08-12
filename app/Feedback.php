<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function client()
    {
        return $this->hasOne('yuridik\Client');
    }

    public function answer()
    {
        return $this->belongsTo('yuridik\Answer');
    }


}
