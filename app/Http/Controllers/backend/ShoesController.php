<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\shoes;
use App\Models\shoestype;
use App\Models\shoesbrand;
use App\Models\shoescolor;
use App\Models\shoesimg;
use App\Models\supplier;
use App\Models\color;
use App\Models\size;
use App\Models\shoesdetail;
use App\Models\order;

class ShoesController extends Controller
{
    private $pathView = 'backend.contents.shoes.shoes_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $shoes = shoes::orderBy('shoesName')->paginate(10);
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'index', [
            'allshoes' =>$shoes,
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
        $type = shoestype::all();
        $brand = shoesbrand::all();
        $supplier = supplier::all();
        $color = color::all();
        $size = size::all();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'add', [
            'empSS' => $empSS,
            'type' => $type,
            'brand' => $brand,
            'supplier' => $supplier,
            'color' => $color,
            'size' => $size,
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
        $shoes = new shoes;
        $shoes->shoesID = random_int(10000, 99999);
        $shoes->shoesName = $request->shoesName;
        $shoes->typeID = $request->typeID;
        $shoes->brandID = $request->brandID;
        $shoes->save();
        return redirect()->route('giay.show', ['giay' => $shoes->shoesID]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shoesID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $shoes = shoes::where('shoesID', $shoesID)->first();
        $shoescolor = shoescolor::where('shoesID', $shoesID)->get();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'show', [
            'shoes' =>$shoes,
            'i' => 1,
            'empSS' => $empSS,
            'shoescolor' => $shoescolor,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($shoesID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $shoes = shoes::where('shoesID', $shoesID)->first();
        $type = shoestype::all();
        $brand = shoesbrand::all();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'edit', [
            'shoes' => $shoes,
            'empSS' => $empSS,
            'type' => $type,
            'brand' => $brand,
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
    public function update(Request $request, $shoesID)
    {
        shoes::where('shoesID', $shoesID)
            ->update([
                'shoesName' => $request->shoesName,
                'typeID' => $request->typeID,
                'brandID' => $request->brandID,
            ]);
        return redirect()->route('giay.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($shoesID)
    {
        $shoes = shoes::where('shoesID', $shoesID);
        $shoes->delete();
        return redirect()->route('giay.index');
    }
}
