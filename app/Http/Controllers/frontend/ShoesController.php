<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\shoes;
use App\Models\customer;
use App\Models\shoesbrand;
use App\Models\shoestype;
use App\Models\shoescolor;
use App\Models\shoesdetail;
use App\Models\shoesimg;
use App\Models\color;
use App\Models\size;
use App\Models\orderdetail;

class ShoesController extends Controller
{
    private $pathView = 'frontend.contents.shoes.shoes_';

    public function index(Request $request){
        if ($request->sapxep) {
            $filter = $request->sapxep;
            // Lọc kết quả
            if($filter == 'gia-thap-toi-cao'){
                $filter_shoescolor = shoescolor::orderBy('shoesPrice')->paginate(9);
            }else{
                if($filter == 'gia-cao-toi-thap'){
                    $filter_shoescolor = shoescolor::orderBy('shoesPrice', 'desc')->paginate(9);
                }
            }
            $filter_shoescolor->withPath('?sapxep=' .$filter);
        }
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $shoescolor = shoescolor::orderBy('created_at', 'desc')->paginate(9);
        $size = size::all();
        $color = color::all();
        return view($this->pathView .'index',[
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'shoescolor' => $filter_shoescolor ?? $shoescolor,
            'size' => $size,
            'color' => $color,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'value' => $request->sapxep,
            'breadcrumb' => '',
        ]);
    }

    public function shoestype(Request $request, $typeName){
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $size = size::all();
        $color = color::all();
        $type = shoestype::where('typeName', $typeName)->first();
        $shoes = $type->shoes;
        return view($this->pathView .'show',[
            'shoes' => $shoes,
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'size' => $size,
            'color' => $color,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'breadcrumb' => $typeName,
        ]);
    }

    public function shoesbrand($brandName){
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $size = size::all();
        $color = color::all();
        $brand = shoesbrand::where('brandName', $brandName)->first();
        $shoes = $brand->shoes;
        return view($this->pathView .'show',[
            'shoes' => $shoes,
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'size' => $size,
            'color' => $color,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'breadcrumb' => $brandName,
        ]);
    }

    public function shoesprice(Request $request, $from, $to){
        $form_string =  number_format($from,0, "", ".").'₫';
        $to_string =  number_format($to,0, "", ".").'₫';
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $size = size::all();
        $color = color::all();
        $shoescolor = shoescolor::where('shoesPrice', '>=', $from)
                                ->where('shoesPrice', '<', $to)
                                ->paginate(9);
        return view($this->pathView .'index',[
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'size' => $size,
            'color' => $color,
            'shoescolor' => $shoescolor,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'value' => $request->sapxep,
            'breadcrumb' => 'Từ ' .$form_string .' - ' .$to_string,
        ]);
    }

    public function shoescolor(Request $request, $colorName){
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $size = size::all();
        $color = color::all();
        $colorname = color::where('colorName', $colorName)->first();
        $shoescolor = $colorname->shoescolor()->paginate(9);
        return view($this->pathView .'index',[
            'shoescolor' => $shoescolor,
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'size' => $size,
            'color' => $color,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'value' => $request->sapxep,
            'breadcrumb' => $colorName,
        ]);
    }

    public function shoesdetail($shoescolorID){
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $size = size::all();
        $color = color::all();
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoescolor = shoescolor::where('shoescolorID', $shoescolorID)
                                ->first();
        $shoes_type = shoes::where('typeID', $shoescolor->shoes->typeID)->get();
        $relatedShoes = shoescolor::where('colorID', $shoescolor->colorID)->paginate(6);
        $shoesdetail = shoesdetail::where('shoescolorID', $shoescolorID)
                                    ->where('shoesQuan', '>', 0)
                                    ->get();
        $shoes = shoes::where('shoesID', $shoescolor->shoesID)->first();
        $shoesimg = shoesimg::where('shoescolorID', $shoescolorID)->get();
        $shoesName_string = $shoescolor->shoes->shoesName .' - Màu '.$shoescolor->color->colorName; 
        return view($this->pathView .'detail',[
            'shoescolor' => $shoescolor,
            'shoesdetail' => $shoesdetail,
            'relatedShoesall' =>   $relatedShoes,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'shoes' => $shoes,
            'shoesimg' => $shoesimg,
            'breadcrumb' => $shoesName_string,
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'size' => $size,
            'color' => $color,
            'shoes_type' => $shoes_type,
        ]);
    }
}
