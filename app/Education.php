<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = "educations";
    public $timestamps = false;

    public function lawyer(){
        return $this->belongsTo('yuridik\Lawyer');
    }
    public function country(){
        return $this->belongsTo('yuridik\Country');
    }
}
