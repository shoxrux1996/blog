<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    public function user()
    {
        return $this->belongsTo('yuridik\User');
    }

    public function feeable()
    {
        return $this->morphTo();
    }

}
