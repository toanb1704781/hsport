<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shoesbrand extends Model
{
    protected $table = 'shoesbrand';
    public $timestamps = false;
    
    public function shoes()
    {
        return $this->hasMany('App\Models\shoes', 'brandID', 'brandID');
    }
    
}
