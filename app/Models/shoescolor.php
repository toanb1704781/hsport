<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\shoesdetail;
use App\Models\importdetail;

class shoescolor extends Model
{
    protected $table = 'shoes_color';
    public $timestamps = false;
    

    public function color()
    {
        return $this->belongsTo('App\Models\color', 'colorID', 'colorID');
    }

    public function shoesimg()
    {
        return $this->hasMany('App\Models\shoesimg', 'shoescolorID', 'shoescolorID');
    }

    public function shoesdetail()
    {
        return $this->hasMany('App\Models\shoesdetail', 'shoescolorID', 'shoescolorID');
    }

    public function shoes()
    {
        return $this->belongsTo('App\Models\shoes', 'shoesID', 'shoesID');
    }

    public function checkNew($created_at){
        $now = carbon::now('Asia/Ho_Chi_Minh');
        $time = carbon::create($created_at)->addWeek(2)->toDateString();
        if($time > $now){
            return true;
        }else{
            return false;
        }
    }

    public function getShoesCost($shoescolorID){
        $shoesdetail = shoesdetail::where('shoescolorID', $shoescolorID)->first();
        $importdetail = importdetail::where('SKU', $shoesdetail->SKU)->first();
        return $importdetail->shoesCost;
    }

    public function checkSize($shoescolorID){
        $shoescolor = shoescolor::where('shoescolorID', $shoescolorID)->first();
        foreach ($shoescolor->shoesdetail as $shoesdetail) {
            if($shoesdetail->shoesQuan > 0){
                return true;
            }
        }
        return false;
    }
    
    
}
