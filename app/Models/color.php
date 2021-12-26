<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $table = 'color';
    public $timestamps = false;

    public function shoescolor()
    {
        return $this->hasMany('App\Models\shoescolor', 'colorID', 'colorID');
        
    }
    
}
