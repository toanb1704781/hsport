<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = 'payment';
    public $timestamps = false;

    public function order()
    {
        return $this->hasMany('App\Models\order', 'paymentID', 'paymentID');
    }
}
