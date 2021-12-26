<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\shoesbrand;
use App\Models\order;

class BrandController extends Controller
{
    private $pathView = 'backend.contents.brand.brand_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $brand = shoesbrand::orderBy('brandName')->get();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'index', [
            'empSS' => $empSS,
            'brand' => $brand,
            'i' => 1,
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
        return view($this->pathView .'add', [
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
        if($request->hasFile('brandAvatar')){
            $filename = $request->file('brandAvatar')->getClientOriginalName();
            $fullname = time(). '_' .$filename;
            $request->file('brandAvatar')->storeAs(
                'public/uploads/brands', $fullname
            );
            $brandAvatar = 'storage/uploads/brands/' .$fullname;
        }
        $brand = new shoesbrand;
        $brand->brandID = random_int(100, 999);
        $brand->brandAvatar = $brandAvatar;
        $brand->brandName = $request->brandName;
        $brand->save();
        return redirect()->route('thuong-hieu.index');
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
    public function edit($brandID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $brand = shoesbrand::where('brandID', $brandID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'edit', [
            'empSS' => $empSS,
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
    public function update(Request $request, $brandID)
    {
        if($request->hasFile('brandAvatar')){
            $filename = $request->file('brandAvatar')->getClientOriginalName();
            $fullname = time() .'_'. $filename;
            $request->file('brandAvatar')->storeAs(
                'public/uploads/brands', $fullname
            );
            $brandAvatar = 'storage/uploads/brands/' .$fullname;
        }else{
            $brand = shoesbrand::where('brandID', $brandID)->first();
            $brandAvatar = $brand->brandAvatar;
        }
        shoesbrand::where('brandID', $brandID)
                ->update([
                    'brandAvatar' => $brandAvatar,
                    'brandName' => $request->brandName,
                ]);
        return redirect()->route('thuong-hieu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brandID)
    {
        $brand = shoesbrand::where('brandID', $brandID);
        $brand->delete();
        return redirect()->route('thuong-hieu.index');
    }
}
