<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\discount;
use App\Models\employee;
use App\Models\order;

class DiscountController extends Controller
{

    private $pathView = 'backend.contents.discount.discount_';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $discount = discount::orderBy('endDate', 'desc')->get();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView.'index', [
            'discount' =>$discount,
            'i' => 1,
            'empSS' => $empSS,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView.'add', [
            'empSS' => $empSS,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount = new Discount;
        $discount->disID = random_int(10000, 99999);
        $discount->disDesc = $request->disDesc;
        $discount->disCondition = $request->disCondition;
        $discount->disQuan = $request->disQuan;
        $discount->discount = $request->discount;
        $discount->startDate = $request->startDate;
        $discount->endDate = $request->endDate;
        $discount->save();
        return redirect()->route('khuyen-mai.index');
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
    public function edit($disID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $discount = Discount::where('disID', $disID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView. 'edit', [
            'discount' => $discount,
            'empSS' => $empSS,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disID)
    {
        Discount::where('disID', $disID)
                ->update([
                    'disID' => $request->disID,
                    'disDesc' => $request->disDesc,
                    'disCondition' => $request->disCondition,
                    'disQuan' => $request->disQuan,
                    'discount' => $request->discount,
                    'startDate' => $request->startDate,
                    'endDate' => $request->endDate,
                    ]);
        return redirect()->route('khuyen-mai.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disID)
    {
        $discount = Discount::where('disID', $disID);
        $discount->delete();
        return redirect()->route('khuyen-mai.index');
    }
}
