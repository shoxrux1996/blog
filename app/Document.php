<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function client()
    {
        return $this->belongsTo('yuridik\Client');
    }

    protected $fillable = ['status'];

    public function category()
    {
        return $this->belongsTo('yuridik\Document_type', 'sub_type_id');
    }

    public function files()
    {
        return $this->morphMany('yuridik\File', 'fileable');
    }

    public function requests()
    {
        return $this->hasMany('yuridik\Request');
    }

    public function orders()
    {
        return $this->morphMany('yuridik\Order', 'typeable');
    }

    public function fees(){
        return $this->morphMany('yuridik\Fee', 'feeable');
    }
    public function notPayed(){
        return $this->fees()->exists() ? 0 : 1;
    }
}
