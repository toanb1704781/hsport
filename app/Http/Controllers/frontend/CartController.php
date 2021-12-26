<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\shoesdetail;
use App\Models\customer;
use App\Models\payment;
use App\Models\discount;
use App\Models\information;
use Carbon\Carbon;

class CartController extends Controller
{
    private $pathView = 'frontend.contents.cart.cart_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $shoesdetail = shoesdetail::all();
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $order = order::where('orderID', session()->get('cart'))->first();
        return view($this->pathView .'index',[
            'order' => $order,
            'orderdetail' => $orderdetail,
            'cart' => $orderdetail,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'total' => 0,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $shoescolorID, $size = null)
    {
        $shoesdetail = shoesdetail::where('shoescolorID', $shoescolorID)
                                ->where('size', $request->size ?? $size)
                                ->first();
        $orderID = session()->get('cart');
        $SKU = $shoesdetail->SKU;
        $old_orderdetail = orderdetail::where('SKU', $SKU)
                                    ->where('orderID', $orderID)
                                    ->first();
        if($old_orderdetail){
            if($old_orderdetail->quantity < $shoesdetail->shoesQuan){
                $upd_quantity = $old_orderdetail->quantity + 1;
                orderdetail::where('SKU', $SKU)
                            ->where('orderID', $orderID)
                            ->update([
                                'quantity' => $upd_quantity,
                            ]);
            }
            return redirect()->route('cart.index');
        }else{
            $orderdetail = new orderdetail;
            $orderdetail->orderID = $orderID;
            $orderdetail->SKU = $SKU;
            $orderdetail->quantity = 1;
            $orderdetail->save();
            return redirect()->route('cart.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orderID, $SKU)
    {
        orderdetail::where('orderID', $orderID)
                    ->where('SKU', $SKU)
                    ->update([
                        'quantity' => $request->quantity,
                    ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderID, $SKU)
    {
        $orderdetail = orderdetail::where('orderID', $orderID)
                                    ->where('SKU', $SKU);
        $orderdetail->delete();
        return redirect()->route('cart.index');
    }

    public function addDiscount(Request $request){
        $disID = $request->disID;
        $total = $request->total_order;
        $discount = discount::where('disID', $disID)->first();
        if ($discount) {
            if($discount->disQuan > 0 && $discount->checkDisCondition($disID, $total) && $discount->checkDateDiscount($disID)){
                order::where('orderID', session()->get('cart'))
                    ->update([
                        'disID' => $disID,
                    ]);
                return redirect()->back();
            }else{
                return "Mã ưu đãi đã hết hoặc không áp dụng cho đơn hàng của bạn";
            }
        }else{
            return 'Mã khuyến mãi không tồn tại';
        }
    }

    public function getCheckout(){
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $payment = payment::all();
        $order = order::where('orderID', session()->get('cart'))->first();
        return view('frontend.contents.checkout.checkout', [
            'order' => $order,
            'orderdetail' => $orderdetail,
            'customer' => $customer,
            'countQuan'=> $orderdetail,
            'payment' => $payment,
            'i' => 1,
            'total' => 0,
        ]);
    }

    public function putCheckout($total){
        order::where('orderID', session()->get('cart'))
                ->update([
                    'total' => $total,
                ]);
        return redirect()->route('thanhtoan.checkout');
    }

    public function checkout(Request $request){
        $paymentID = $request->paymentID;
        $now = new carbon;
        $now = $now->addHour(7);
        order::where('orderID', session()->get('cart'))
                ->update([
                    'cusID' => session()->get('cusID'),
                    'statusID' => 1,
                    'note' => $request->note,
                    'paymentID' => $paymentID,
                    'created_at' => $now,
                ]);
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        information::where('infoID', $customer->infoID)
                    ->update([
                        'name' => $request->name,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'email' => $request->email,
                    ]);
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        foreach ($orderdetail as $orderdetail) {
            $shoesQuan = $orderdetail->shoesdetail->shoesQuan - $orderdetail->quantity;
            shoesdetail::where('SKU', $orderdetail->SKU)
                        ->update([
                            'shoesQuan' => $shoesQuan,
                        ]);
        }
        $order = order::where('orderID', session()->get('cart'))->first();
        if($order->disID != null){
            $disQuan = $order->discount->disQuan - 1;
            discount::where('disID', $order->disID)
                    ->update([
                        'disQuan' => $disQuan,
                    ]);
        }
        session()->forget('cart');
        session()->put('cart', random_int(1000000, 9999999));
        $order = new order;
        $order->orderID = session()->get('cart');
        $order->save();
        return redirect()->route('frontend.order');
    }
}
