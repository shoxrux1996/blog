<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'firstName', 'lastName', 'city_id',
    ];

    public function city(){

    	return $this->belongsTo('yuridik\City');
    }

    public function file(){
        return $this->morphOne('yuridik\File', 'fileable');
    }
    public function transactions(){
        return $this->hasMany('yuridik\Transaction')->where('state',2)->orderBy('id','desc');
    }
    public function orders(){
        return $this->hasMany('yuridik\Order')->orderBy('id','desc');
    }
    public function balance(){
        return ($this->transactions()->sum('amount')/100) - ($this->orders()->sum('amount'));
    }
}
