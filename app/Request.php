<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function document(){
    	return $this->belongsTo('yuridik\Document');
    }
}
