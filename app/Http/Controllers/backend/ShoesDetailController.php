<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\color;
use App\Models\shoes;
use App\Models\size;
use App\Models\shoesdetail;
use App\Models\supplier;
use App\Models\importgoods;
use App\Models\importdetail;
use App\Models\order;

class ShoesDetailController extends Controller
{

    private $pathView='backend.contents.shoesdetail.shoesdetail_';

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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $shoesdetail = new shoesdetail;
        // $shoesdetail->SKU = $colorID .$shoesID .$request->size;
        // $shoesdetail->shoesID = $shoesID;
        // $shoesdetail->colorID = $colorID;
        // $shoesdetail->size = $request->size;
        // $shoesdetail->shoesQuan = 0;
        // $shoesdetail->save();

        // // $import = new importgoods;
        // // $import->importID = random_int(1000, 9999);
        // // $import->supID = $request->supID;
        // // $import->empID = session()->get('empID');
        // // $import->save();

        // // $importdetail = new importdetail;
        // // $importdetail->importID = $import->importID;
        // // $importdetail->SKU = $shoesdetail->SKU;
        // // $importdetail->importID = $import->importID;

        // return redirect()->route('them-mau.show',['shoesID' => $shoesID, 'colorID' => $colorID]);
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
    public function edit($SKU)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $supplier = supplier::all();
        $shoesdetail = shoesdetail::where('SKU', $SKU)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'add', [
            'shoesdetail' => $shoesdetail,
            'empSS' => $empSS,
            'supplier' => $supplier,
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
    public function update(Request $request, $SKU)
    {
        $shoesdetail = shoesdetail::where('SKU', $SKU)->first();
        $importdetail = importdetail::where('SKU', $SKU)->first();
        return $importdetail->importgoods->supplier->supName;
        $shoesQuan = $shoesdetail->shoesQuan + $request->shoesQuan;
        shoesdetail::where('SKU', $SKU)
                    ->update([
                        'shoesQuan' => $shoesQuan,
                    ]);
    
        $importgoods = new importgoods;
        $importgoods->importID = random_int(1000000, 9999999);
        $importgoods->supID = $request->supID;
        $importgoods->empID = session()->get('empID');
        $importgoods->save();

        $importdetail = new importdetail;
        $importdetail->importID =  $importgoods->importID;
        $importdetail->SKU =   $SKU;
        $importdetail->importQuan =  $request->shoesQuan;
        $importdetail->shoesCost =   $request->shoesCost;
        $importdetail->save();
        return redirect()->route('shoescolor.show', ['shoescolorID' => $shoesdetail->shoescolor->shoescolorID]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
