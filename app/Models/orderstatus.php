<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderstatus extends Model
{
    protected $table = 'order_status';
    public $timestamps = false;

    
    public function order()
    {
        return $this->hasMany('App\Models\order', 'statusID', 'statusID');
    }
    
}
