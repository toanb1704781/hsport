<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shoestype extends Model
{
    protected $table = 'shoestype';
    public $timestamps = false;

    public function shoes()
    {
        return $this->hasMany('App\Models\shoes', 'typeID', 'typeID');
    }
}
