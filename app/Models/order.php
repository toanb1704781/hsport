<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    public $timestamps = false;

    
    public function discount()
    {
        return $this->belongsTo('App\Models\discount', 'disID', 'disID');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\customer', 'cusID', 'cusID');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\payment', 'paymentID', 'paymentID');
    }

    public function orderstatus()
    {
        return $this->belongsTo('App\Models\orderstatus', 'statusID', 'statusID');
    }
    
    public function orderdetail()
    {
        return $this->hasMany('App\Models\orderdetail', 'orderID', 'orderID');
    }
    
}
