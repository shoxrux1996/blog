<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children(){
    	return $this->hasMany('yuridik\Category');
    }
    public function parent(){
    	return $this->belongsTo('yuridik\Category');
    }


    public function lawyers(){
    	return $this->belongsToMany('yuridik\Lawyer');
    }
}
