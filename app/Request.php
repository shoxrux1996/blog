<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function document()
    {
        return $this->belongsTo('yuridik\Document');
    }

    public function lawyer()
    {
        return $this->belongsTo('yuridik\Lawyer');
    }
    public function responses()
    {
        return $this->hasMany('yuridik\Response');
    }

}
