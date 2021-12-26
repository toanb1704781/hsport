<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\supplier;
use App\Models\importgoods;
use App\Models\color;
use App\Models\order;
use Carbon\carbon;

class SupplierController extends Controller
{
    private $pathView = 'backend.contents.supplier.supplier_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $supplier = supplier::orderBy('supName')->get();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'index',[
            'empSS' => $empSS,
            'i' => 1,
            'supplier' => $supplier,
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
        return view($this->pathView .'add',[
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
        $supplier = new supplier;
        $supplier->supID = random_int(1000, 9999);
        $supplier->supName = $request->supName;
        $supplier->supAddress = $request->supAddress;
        $supplier->supPhone = $request->supPhone;
        $supplier->supEmail = $request->supEmail;
        $supplier->save();
        return redirect()->route('nha-cung-cap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $supID)
    {
        $ngay_nhap_hang =  $request->ngay_nhap_hang  ?? null;
        $colors = color::all();
        $supplier = supplier::where('supID', $supID)->first();
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return  view($this->pathView .'show',[
            'empSS' => $empSS,
            'colors' => $colors,
            'countNewOrder' => $countNewOrder,
            'supplier' => $supplier,
        ]);
    }

    public function getShowDate(Request $request, $supID){
        $supplier = supplier::where('supID', $supID)->first();
        $ngay_nhap_hang =  $request->ngay_nhap_hang  ?? null;
        $date_string = carbon::create($request->ngay_nhap_hang)->toDateString();
        $colors = color::all();
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $importgoods = importgoods::where('supID', $supID)
                                    ->wheredate('created_at', $ngay_nhap_hang)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $total_import = 0;
        foreach ($importgoods as $row) {
            foreach ($row->importdetail as $importdetail) {
                $total_import += $importdetail->importQuan * $importdetail->shoesCost;
            }
        }
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return  view($this->pathView .'getShowDate',[
            'empSS' => $empSS,
            'importgoods' => $importgoods,
            'colors' => $colors,
            'countNewOrder' => $countNewOrder,
            'supplier' => $supplier,
            'date_value' => $request->ngay_nhap_hang,
            'date_string' => $date_string,
            'total_import' => $total_import,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($supID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $supplier = supplier::where('supID', $supID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'edit',[
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
    public function update(Request $request, $supID)
    {
        supplier::where('supID', $supID)
                ->update([
                    'supName' => $request->supName,
                    'supAddress' => $request->supAddress,
                    'supPhone' => $request->supPhone,
                    'supEmail' => $request->supEmail,
                ]);
        return redirect()->route('nha-cung-cap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($supID)
    {
        $supplier = supplier::where('supID', $supID);
        $supplier->delete();
        return redirect()->route('nha-cung-cap.index');
    }
}
