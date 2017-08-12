<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('yuridik\User');
    }

    public function typeable()
    {
        return $this->morphTo();
    }
}
