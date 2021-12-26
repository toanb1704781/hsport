<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\employee;
use App\Models\order;
use Carbon\carbon;

class CustomerController extends Controller
{
    private $pathView = 'backend.contents.customer.customer_';

    public function index(Request $request){
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        $customer = customer::all();
        $month_now = Carbon::now()->isoFormat('Y-MM');
        return view($this->pathView .'index', [
            'customer' => $customer,
             'i' => 1,
             'empSS' => $empSS,
             'countNewOrder' => $countNewOrder,
             'month' => $request->thang ?? $month_now,
        ]);
    }
}
