<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;

class discount extends Model
{
    protected $table = 'discount';
    public $timestamps = false;

    public function order()
    {
        return $this->hasMany('App\Models\order', 'disID', 'disID');
    }

    // Kiểm tra thời hạn khuyến mãi
    public function checkDateDiscount($disID){
        $discount = discount::where('disID', $disID)->first();
        $now = carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $startDate = $discount->startDate;
        $endDate = $discount->endDate;
        if($now >= $startDate && $now <= $endDate){
            return true;
        }else{
            return false;
        }
    }

    // Kiểm tra điều kiện khuyến mãi
    public function checkDisCondition($disID, $value){
        $discount = discount::where('disID', $disID)->first();
        if($value >= $discount->disCondition){
            return true;
        }else{
            return false;
        }
    }
}
