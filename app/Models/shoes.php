<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shoes extends Model
{
    protected $table = 'shoes';
    public $timestamps = false;

    
    public function shoestype()
    {
        return $this->belongsTo('App\Models\shoestype', 'typeID', 'typeID');
    }

    public function shoesbrand()
    {
        return $this->belongsTo('App\Models\shoesbrand', 'brandID', 'brandID');
    }

    public function shoescolor()
    {
        return $this->hasMany('App\Models\shoescolor', 'shoesID', 'shoesID');
    }
    
    
}
