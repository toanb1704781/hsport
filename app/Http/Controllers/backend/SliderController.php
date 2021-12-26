<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\employee;
use App\Models\order;

class SliderController extends Controller
{
    private $pathView = 'backend.contents.slider.slider_';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $slider = Slider::all();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView. 'index', [
            'slider' => $slider,
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
        if($request->hasFile('sliderIMG')){
            $filename = $request->file('sliderIMG')->getClientOriginalName();
            $fullname = time(). '_' .$filename;
            $request->file('sliderIMG')->storeAs(
                'public/uploads/slider', $fullname
            );
            $sliderIMG = 'storage/uploads/slider/' .$fullname;
        }

        $slider = new slider;
        $slider->sliderIMG = $sliderIMG;
        $slider->sliderDesc = $request->sliderDesc;
        $slider->sliderSlug = $request->sliderSlug;
        $slider->empID = session()->get('empID');
        $slider->save();
        return redirect()->route('slider.index');
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
    public function edit($sliderID)
    {
        $empSS = employee::where('empID', session()->get('empID'))->first();
        $slider = Slider::where('sliderID', $sliderID)->first();
        $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
        return view($this->pathView. 'edit', [
            'slider' => $slider,
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
    public function update(Request $request, $sliderID)
    {
        if($request->hasFile('sliderIMG')){
            $filename = $request->file('sliderIMG')->getClientOriginalName();
            $fullname = time() .$filename;
            $request->file('sliderIMG')->storeAs(
                'public/uploads/slider', $fullname
            );
            $sliderIMG = 'storage/uploads/slider/' .$fullname;
        }else{
            $slider = Slider::where('sliderID', $sliderID)->first();
            $sliderIMG = $slider->sliderIMG;
        }
        Slider::where('sliderID', $sliderID)
                ->update([
                    'sliderIMG' => $sliderIMG,
                    'sliderDesc' => $request->sliderDesc,
                    'sliderSlug' => $request->sliderSlug,
                ]);
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sliderID)
    {
        $slider = slider::where('sliderID', $sliderID);
        $slider->delete();
        return redirect()->route('slider.index');
    }
}
