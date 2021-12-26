<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shoesimg extends Model
{
    protected $table = 'shoes_img';
    public $timestamps = false;

    public function shoescolor()
    {
        return $this->belongsTo('App\model\shoescolor', 'shoescolorID', 'shoescolorID');
    }
    
}
