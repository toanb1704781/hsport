<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shoesdetail extends Model
{
    protected $table = 'shoes_detail';
    public $timestamps = false;

    public function importdetail()
    {
        return $this->hasMany('App\Models\importdetail', 'SKU', 'SKU');
    }

    public function shoescolor()
    {
        return $this->belongsTo('App\Models\shoescolor', 'shoescolorID', 'shoescolorID');
    }

    public function orderdetail()
    {
        return $this->hasMany('App\Models\orderdetail', 'SKU', 'SKU');
    }
}
