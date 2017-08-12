<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = false;

    public function clients()
    {
        return $this->hasManyThrough('yuridik\Client', 'yuridik\User');
    }

    public function lawyers()
    {
        return $this->hasManyThrough('yuridik\Lawyer', 'yuridik\User');
    }

    public function users()
    {
        return $this->hasMany('yuridik\User');
    }
}
