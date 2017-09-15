<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    public function educations(){
        return $this->hasMany('yuridik\Country');
    }
}
