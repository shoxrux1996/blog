<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name'];
    public function blogs(){
    	return $this->belongsToMany('yuridik\Blog');
    }
   

}

