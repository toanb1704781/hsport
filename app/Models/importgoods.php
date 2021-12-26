<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class importgoods extends Model
{
    protected $table = 'import_goods';
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Models\employee', 'empID', 'empID');
    }

    public function importdetail()
    {
        return $this->hasMany('App\Models\importdetail', 'importID', 'importID');
    }
    
    public function supplier()
    {
        return $this->belongsTo('App\Models\supplier', 'supID', 'supID');
    }
    
}
