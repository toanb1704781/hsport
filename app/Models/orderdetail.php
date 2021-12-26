<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    protected $table = 'order_detail';
    public $timestamps = false;

    public function shoesdetail()
    {
        return $this->belongsTo('App\Models\shoesdetail', 'SKU', 'SKU');
    }

    
    public function order()
    {
        return $this->belongsTo('App\Models\order', 'orderID', 'orderID');
    }
    
}
