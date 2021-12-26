<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\news;
use App\Models\customer;
use App\Models\information;
use App\Models\orderdetail;
use App\Models\order;
use App\Models\shoes;
use App\Models\shoesbrand;
use App\Models\shoestype;
use App\Models\shoescolor;
use App\Models\shoesdetail;
use App\Models\color;
use App\Models\size;
use App\Models\slider;

class HomeController extends Controller
{
    private $pathView = 'frontend.';

    public function index(){
        if(!session()->has('cart')){
            session()->put('cart', random_int(1000000, 9999999));
            $orderID = session()->get('cart');
            $order = new order;
            $order->orderID = $orderID;
            $order->save();
            
            // Xóa giỏ hàng cũ không sử dụng
            // $old_cart = order::where('orderID', '<>', session()->get('cart'))
            //                 ->where('cusID', null)
            //                 ->where('paymentID', null)
            //                 ->get();
            // foreach ($old_cart as $row_old_cart) {
            //     $old_orderdetail = orderdetail::where('orderID', $row_old_cart->orderID);
            //     $old_orderdetail->delete();
            //     $del_old_cart = order::where('orderID', $row_old_cart->orderID);
            //     $del_old_cart->delete();
            // }
        }



        $shoescolor = shoescolor::all();
        $slider = slider::all();
        $news = news::orderBy('created_at', 'desc')->paginate(8);
        $shoesbrand = shoesbrand::orderBy('brandName')->get();
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        return view($this->pathView .'index',[
            'shoescolor' => $shoescolor,
            'news' => $news,
            'shoesbrand' => $shoesbrand,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'slider' => $slider,
        ]);
    }

    public function userProfile(Request $request){
        $cusID = customer::where('cusID', session()->get('cusID'))->first();
        if($request->hasFile('cusAvatar')){
            $filename = $request->file('cusAvatar')->getClientOriginalName();
            $img = $cusID->cusID .'_'. $filename;
            $request->file('cusAvatar')->storeAs('public/uploads/avatar', $img);
            $avatar = 'storage/uploads/avatar/' .$img;
        }else{
            $avatar = $cusID->information->avatar;
        }
        $information = information::where('infoID', $cusID->infoID)
                                ->update([
                                    'name' => $request->cusName,
                                    'avatar' => $avatar,
                                    'address' => $request->cusAddress,
                                    'phone' => $request->cusPhone,
                                    'email' => $request->cusEmail,
                                ]);
        return redirect()->back();
    }

    public function search(Request $request){
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $shoesbrand = shoesbrand::all();
        $shoestype = shoestype::all();
        $size = size::all();
        $color = color::all();
        $search = '%' .$request->tukhoa. '%';
        $shoes = shoes::where('shoesName', 'LIKE', $search)->get();
        return view('frontend.contents.shoes.shoes_' .'search', [
            'shoes' => $shoes,
            'shoesbrand' => $shoesbrand,
            'shoestype' => $shoestype,
            'size' => $size,
            'color' => $color,
            'customer' => $customer,
            'countQuan' => $orderdetail,
            'tukhoa' => $request->tukhoa,
        ]);
    }

    public function getLogin(){
        return view($this->pathView .'login');
    }

    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        $customer = customer::where('username', $username)->first();
        if($customer && Hash::check($password, $customer->password)){
            session()->put('cusID', $customer->cusID);
            return redirect()->route('frontend.index');
        }else{
            return view($this->pathView .'login');
        }
    }

    public function getRegister(){
        return view($this->pathView .'register');
    }

    public function postRegister(Request $request){
        $information = new information;
        $information->infoID =  random_int(1000, 9999);
        $information->name =  $request->name;
        $information->save();

        $customer = new Customer;
        $customer->cusID = random_int(10000, 99999);
        $customer->username = $request->username;
        $customer->password = bcrypt($request->password);
        $customer->infoID =  $information->infoID;
        $customer->save();

        return redirect()->route('frontend.getLogin');
    }

    public function myOrder(){
        $order = order::where('cusID', session()->get('cusID'))->orderBy('created_at', 'desc')->paginate(10);
        $orderdetail = orderdetail::where('orderID', session()->get('cart'))->get();
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        return view($this->pathView .'myOrder', [
            'all_order' => $order,
            'countQuan' => $orderdetail,
            'customer' => $customer,
            'i' => 1,
        ]);
    }

    public function myOrderDetail($orderID){
        $orderdetail = orderdetail::where('orderID', $orderID)->get();
        $countQuan = orderdetail::where('orderID', session()->get('cart'))->get();
        $order = order::where('orderID', $orderID)->first();
        $customer = customer::where('cusID', session()->get('cusID'))->first();
        return view($this->pathView .'myOrderDetail', [
            'order' => $order,
            'countQuan' => $countQuan,
            'customer' => $customer,
            'i' => 1,
            'orderdetail' =>$orderdetail,
            'total' => 0,
            'orderID' => $orderID,
        ]);
    }

    public function myOrderDel($orderID){
        $order = order::where('orderID', $orderID)
                        ->update([
                            'statusID' => 4,
                        ]);
        $orderdetail = orderdetail::where('orderID', $orderID)->get();
        foreach ($orderdetail as $orderdetail) {
            $shoesQuan_update = $orderdetail->shoesdetail->shoesQuan + $orderdetail->quantity;
            $orderdetail->shoesdetail()->update([
                'shoesQuan' => $shoesQuan_update,
            ]);
        }
        return redirect()->route('frontend.order');
    }
    
    public function logout(){
        session()->forget('cusID');
        return redirect()->route('frontend.index');
    }
}
