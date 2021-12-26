<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'role';
    public $timestamps = false;

    public function employee()
    {
        return $this->hasMany('App\Models\employee', 'roleID', 'roleID');
    }
    
}
