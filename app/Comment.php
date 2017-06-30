<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function blog(){
    	return $this->belongsTo('yuridik\Blog');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

}
