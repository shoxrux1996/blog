<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'firstName', 'lastName', 'city_id',
    ];
    public function city()
    {
        return $this->belongsTo('yuridik\City');
    }
    public function lawyer(){
        return $this->hasOne('yuridik\Lawyer');
    }
    public function client(){
        return $this->hasOne('yuridik\Client');
    }
    public function file()
    {
        return $this->morphOne('yuridik\File', 'fileable');
    }
    public function transactions()
    {
        return $this->hasMany('yuridik\Transaction')->where('state', 2)->orderBy('id', 'desc');
    }
    public function orders()
    {
        return $this->hasMany('yuridik\Order')->orderBy('id', 'desc');
    }
    public function withdraws(){
        return $this->hasMany('yuridik\Withdraw')->where('state', 1)->orderBy('id', 'desc');
    }
    public function sentWithdrawRequest(){
        return $this->hasMany('yuridik\Withdraw')->where('state', 0)->count() > 0 ? true : false;
    }
    public function fees(){
        return $this->hasMany('yuridik\Fee')->orderBy('id','desc');
    }
    public function balance()
    {
        return ($this->transactions()->sum('amount') / 100) - $this->orders()->sum('amount') - $this->withdraws()->sum('amount') + $this->fees()->sum('amount');
    }

}
