<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = 'supplier';
    public $timestamps = false;
    
    
    public function importgoods()
    {
        return $this->hasMany('App\Models\importgoods', 'supID', 'supID');
    }
    
}
