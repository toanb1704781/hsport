<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    protected $table = 'slider';
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo('App\Models\employee', 'empID', 'empID');
    }
}
