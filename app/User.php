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
        return $this->hasMany('yuridik\Transaction');
    }
    public function orders(){
        return $this->hasMany('yuridik\Order');
    }
    public function balance(){
        return $this->transactions()->where('state',2)->sum('amount') - $this->orders()->sum('amount');
    }
}
