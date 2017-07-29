<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function client(){
       return $this->belongsTo('yuridik\Client');
    }
    protected $fillable = ['status'];
    public function category(){
        return $this->belongsTo('yuridik\Document_type','sub_type_id');
    }
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
