<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class importdetail extends Model
{
    protected $table = 'import_detail';
    public $timestamps = false;

    public function shoesdetail()
    {
        return $this->belongsTo('App\Models\shoesdetail', 'SKU', 'SKU');
    }

    public function importgoods()
    {
        return $this->belongsTo('App\Models\importgoods', 'importID', 'importID');
    }
    
}
