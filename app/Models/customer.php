<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\customer;
use App\Models\order;
use Carbon\carbon;

class customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;

    public function information()
    {
        return $this->belongsTo('App\Models\information', 'infoID', 'infoID');
    }

    public function order()
    {
        return $this->hasMany('App\Models\order', 'cusID', 'cusID');
    }

    public function countOrderMonth($cusID, $month){
        $startMonth = Carbon::create($month)->startOfMonth()->toDateString();
        $endMonth = Carbon::create($month)->endOfMonth()->toDateString();
        $countOrderMonth = order::wheredate('created_at', '>=', $startMonth)
                                ->wheredate('created_at', '<=',  $endMonth)
                                ->where('cusID', $cusID)
                                ->count();
        return $countOrderMonth;
    }
    
    
}
