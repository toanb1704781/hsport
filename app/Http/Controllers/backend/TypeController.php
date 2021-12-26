<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shoestype;
use App\Models\employee;
use App\Models\order;

class TypeController extends Controller
{
    private $pathView = 'backend.contents.shoestype.shoestype_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $type = shoestype::all();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'index', [
            'empSS' => $empSS,
            'type' => $type,
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
        $type = new shoestype;
        $type->typeID = random_int(100, 999);
        $type->typeName = $request->typeName;
        $type->save();
        return redirect()->route('loai-giay.index');
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
    public function edit($typeID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $type = shoestype::where('typeID', $typeID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView .'edit', [
            'empSS' => $empSS,
            'type' => $type,
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
    public function update(Request $request, $typeID)
    {
        shoestype::where('typeID', $typeID)
                ->update([
                    'typeName' => $request->typeName,
                ]);
        return redirect()->route('loai-giay.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeID)
    {
        $type = shoestype::where('typeID', $typeID);
        $type->delete();
        return redirect()->route('loai-giay.index');
    }
}
