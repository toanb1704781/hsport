<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employee';
    public $timestamps = false;

    public function information()
    {
        return $this->belongsTo('App\Models\information', 'infoID', 'infoID');
    }

    public function news()
    {
        return $this->hasMany('App\Models\news', 'empID', 'empID');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\role', 'roleID', 'roleID');
    }
    
    public function slider()
    {
        return $this->hasMany('App\Models\slider', 'empID', 'empID');
    }

    public function importgoods()
    {
        return $this->hasMany('App\Models\importgoods', 'empID', 'empID');
    }
    
    
}
