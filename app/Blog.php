<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
  
    public function comments(){
    	return $this->hasMany('yuridik\Comment');
    }
    public function tags(){
    	return $this->belongsToMany('yuridik\Tag');
    }
     public function getRelatedIds(){
    	return $this->tags->pluck('id');
    }
    public function lawyer(){
         return $this->belongsTo('yuridik\Lawyer');
    }
}
