<?php

namespace yuridik;

use Illuminate\Database\Eloquent\Model;

class Document_type extends Model
{
    protected $table = "document_type";
    public $timestamps = false;
    public function documents(){
        return $this->hasMany('yuridik\Document');
    }
}
