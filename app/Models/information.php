<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    protected $table = 'information';
    public $timestamps = false;
    
    public function employee()
    {
        return $this->hasMany('App\Models\employee', 'infoID', 'infoID');
    }

    public function customer()
    {
        return $this->hasMany('App\Models\customer', 'infoID', 'infoID');
    }
    
}
