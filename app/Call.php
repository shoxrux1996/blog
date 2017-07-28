<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    public function client(){
       return $this->belongsTo('yuridik\Client');
    }
    protected $fillable = ['status'];
    public function files()
    {
        return $this->morphMany('yuridik\File', 'fileable');
    }
    public function requests(){
        return $this->hasMany('yuridik\Request');
    }
     public function order()
    {
        return $this->morphMany('yuridik\Order', 'typeable');
    }
    public function soft_requests(){
        return $this->requests->where('status',1);
    }
}
