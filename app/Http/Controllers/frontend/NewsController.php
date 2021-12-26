<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\shoesbrand;
use App\Models\shoestype;
use App\Models\shoesimg;
use App\Models\color;
use App\Models\orderdetail;
use App\Models\news;

class NewsController extends Controller
{
    private $pathView = 'frontend.contents.news.news_';

    public function index(){
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $news = news::orderBy('created_at', 'desc')->paginate(9);
        $color = color::all();
        return view($this->pathView .'index',[
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'color' => $color,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'news' => $news,
        ]);
    }

    public function show($newsID){
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $news = news::where('newsID', $newsID)->first();
        $all_news = news::orderBy('created_at', 'desc')->paginate(8);
        $color = color::all();
        return view($this->pathView .'show',[
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'color' => $color,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'news' => $news,
            'all_news' => $all_news,
        ]);
    }
}
