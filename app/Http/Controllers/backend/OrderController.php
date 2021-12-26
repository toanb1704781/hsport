<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\employee;
use App\Models\orderstatus;

class OrderController extends Controller
{
    private $pathView = 'backend.contents.order.order_';

    public function index(){
        $order = order::where('cusID', '<>', null)
                        ->where('paymentID', '<>', null)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'index', [
            'orders' => $order,
            'i' => 1,
            'empSS' => $empSS,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    public function show($orderID){
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $order = order::where('orderID', $orderID)->first();
        $orderstatus = orderstatus::all();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'show', [
            'empSS' => $empSS,
            'order' => $order,
            'totalQuan' => 0,
            'totalPrice' => 0,
            'sale' => 0,
            'orderstatus' => $orderstatus,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    public function update(Request $request, $orderID){
        Order::where('orderID', $orderID)
            ->update([
                'statusID' => $request->statusID,
            ]);
        return redirect()->route('don-hang.index');
    }
}
