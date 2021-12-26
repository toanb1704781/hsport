<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class news extends Model
{
    protected $table = 'news';
    public $timestamps = false;
    
    public function employee()
    {
        return $this->belongsTo('App\Models\employee', 'empID', 'empID');
    }
    
    // public function created_at($time){
    //     Carbon::setLocale('vi');
    //     $now = new carbon;
    //     $now->timezone('Asia/Ho_Chi_Minh');
    //     $dt = Carbon::create($time);
    //     return $dt->diffForHumans($now);
    // }
}
