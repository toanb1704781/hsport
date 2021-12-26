<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\color;
use App\Models\size;
use App\Models\order;

class AttributeController extends Controller
{
    private $pathView = 'backend.contents.attribute.attribute_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $color = color::orderBy('colorName')->get();
        $size = size::all();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'index',[
            'empSS' => $empSS,
            'i' => 1,
            'j' => 1,
            'color' => $color,
            'size' => $size,
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
        $color = new color;
        $color->colorName = $request->colorName;
        $color->colorCode = $request->colorCode;
        $color->save();
        return redirect()->route('thuoc-tinh.index');
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
    public function edit($colorID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $color = color::where('colorID', $colorID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'edit',[
            'color' => $color,
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
    public function update(Request $request, $colorID)
    {
        color::where('colorID', $colorID)
            ->update([
                'colorName' => $request->colorName,
                'colorCode' => $request->colorCode,
            ]);
        return redirect()->route('thuoc-tinh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($colorID)
    {
        $color = color::where('colorID', $colorID);
        $color->delete();
        return redirect()->route('thuoc-tinh.index');
    }
}
