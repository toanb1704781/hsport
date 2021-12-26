<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\color;
use App\Models\shoes;
use App\Models\shoescolor;
use App\Models\shoesimg;
use App\Models\shoesdetail;
use App\Models\size;
use App\Models\supplier;
use App\Models\importgoods;
use App\Models\importdetail;
use App\Models\order;

class ShoesColorController extends Controller
{
    private $pathView = 'backend.contents.shoescolor.shoescolor_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shoesID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $shoes = shoes::where('shoesID', $shoesID)->first();
        $color = color::all();
        $size = size::all();
        $supplier = supplier::all();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'add',[
            'empSS' => $empSS,
            'shoes' => $shoes,
            'color' => $color,
            'size' => $size,
            'supplier' => $supplier,
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
        $shoescolorID = random_int(1000000, 9999999);
        if($request->hasFile('shoesAvatar')){
            $filename = $request->file('shoesAvatar')->getClientOriginalName();
            $fullname = $shoescolorID .'/'. $filename;
            $request->file('shoesAvatar')->storeAs(
                'public/uploads/shoes', $fullname 
            );
            $shoesAvatar = 'storage/uploads/shoes/' .$fullname;
        }

        $shoescolor = new shoescolor;
        $shoescolor->shoescolorID = $shoescolorID;
        $shoescolor->shoesID = $request->shoesID;
        $shoescolor->colorID = $request->colorID;
        $shoescolor->shoesAvatar = $shoesAvatar;
        $shoescolor->shoesPrice = $request->shoesPrice;
        $shoescolor->salePrice = $request->salePrice;
        $shoescolor->shoesDesc = $request->shoesDesc;
        $shoescolor->save();

        if($request->hasFile('img')){
            foreach ($request->file('img') as $image) {
                $filesname = $image->getClientOriginalName();
                $fullIMG = $shoescolorID .'/'. $filesname;
                $image->storeAs('public/uploads/shoes', $fullIMG );
                $img = 'storage/uploads/shoes/' .$fullIMG;
                $shoesimg = new shoesimg;
                $shoesimg->shoescolorID = $shoescolorID;
                $shoesimg->img = $img;
                $shoesimg->save();
            }
        }
        
        $importgoods = new importgoods;
        $importgoods->importID = random_int(10000, 99999);
        $importgoods->supID = $request->supID;
        $importgoods->empID = session()->get('empID');
        $importgoods->save();

        $size = size::all();
        foreach ($size as $size) {
            $s = 'check'. $size->size;
            $quantity = 'shoesQuan'. $size->size;
            if($request->$s){
                $shoesdetail = new shoesdetail;
                $shoesdetail->SKU =  $request->colorID .$request->shoesID .$size->size;
                $shoesdetail->shoescolorID = $shoescolor->shoescolorID;
                $shoesdetail->size = $size->size;
                $shoesdetail->shoesQuan = $request->$quantity;
                $shoesdetail->save();

                $importdetail = new importdetail;
                $importdetail->importID =  $importgoods->importID;
                $importdetail->SKU =   $shoesdetail->SKU;
                $importdetail->importQuan =  $shoesdetail->shoesQuan;
                $importdetail->shoesCost =   $request->shoesCost;
                $importdetail->save();
            }
        }



        return redirect()->route('giay.show',['giay' => $request->shoesID]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shoescolorID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $shoesimg = shoesimg::where('shoescolorID', $shoescolorID)
                            ->get();
        $shoesdetail = shoesdetail::where('shoescolorID', $shoescolorID)
                                ->get();
        $shoescolor = shoescolor::where('shoescolorID', $shoescolorID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'show', [
            'empSS' => $empSS,
            'shoesimg' => $shoesimg,
            'shoesdetail' => $shoesdetail,
            'shoescolor' => $shoescolor,
            'i' => 1,
            'countNewOrder' => $countNewOrder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($shoescolorID)
    {
        $color = color::all();
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $shoescolor = shoescolor::where('shoescolorID', $shoescolorID)
                                ->first();
        $shoesimg = shoesimg::where('shoescolorID', $shoescolorID)
                                ->get();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'edit', [
            'empSS' => $empSS,
            'shoescolor' => $shoescolor,
            'color' => $color,
            'shoesimg' => $shoesimg,
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
    public function update(Request $request, $shoescolorID)
    {
        $shoescolor = shoescolor::where('shoescolorID', $shoescolorID)->first();
        if($request->hasFile('shoesAvatar')){
            $filename = $request->file('shoesAvatar')->getClientOriginalName();
            $fullname = $request->shoesID .'/'. $filename;
            $request->file('shoesAvatar')->storeAs(
                'public/uploads/shoes', $fullname 
            );
            $shoesAvatar = 'storage/uploads/shoes/' .$fullname;
        }else{
            $shoescolor = shoescolor::where('shoescolorID', $shoescolorID)
                                    ->first();
            $shoesAvatar = $shoescolor->shoesAvatar;
        }

        if($request->hasFile('img')){
            $shoesimg = shoesimg::where('shoescolorID', $shoescolorID);
            $shoesimg->delete();
            foreach ($request->file('img') as $image) {
                $filesname = $image->getClientOriginalName();
                $fullIMG = $shoescolor->shoesID .'/'. $filesname;
                $image->storeAs('public/uploads/shoes', $fullIMG );
                $img = 'storage/uploads/shoes/' .$fullIMG;
                $shoesimg = new shoesimg;
                $shoesimg->shoescolorID = $shoescolorID;
                $shoesimg->img = $img;
                $shoesimg->save();
            }
        }
        Shoescolor::where('shoescolorID', $shoescolorID)
                ->update([
                    'shoesPrice' => $request->shoesPrice,
                    'salePrice' => $request->salePrice,
                    'shoesAvatar' => $shoesAvatar,
                    'shoesDesc' => $request->shoesDesc,
                ]);
        return redirect()->route('giay.show',['giay' => $shoescolor->shoesID]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($shoescolorID)
    {
        $shoes = shoescolor::where('shoescolorID', $shoescolorID)->first();
        $shoescolor = shoescolor::where('shoescolorID', $shoescolorID);
        $shoescolor->delete();
        return redirect()->route('giay.show',['giay' => $shoes->shoesID]);
    }
}
