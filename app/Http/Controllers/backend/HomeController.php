<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\shoesdetail;
use App\Models\order;
use App\Models\customer;
use App\Models\importdetail;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;

class HomeController extends Controller
{
    private $pathView = 'backend.';

    public function index(Request $request){
        if(session()->has('empID')){

            $empSS = employee::where('empID', session()->get('empID'))->first();
            $countEmp = employee::get()->count();
            $shoesdetail = shoesdetail::all();
            $countShoesdetail = 0;
            foreach ($shoesdetail as $shoesdetail) {
                $countShoesdetail += $shoesdetail->shoesQuan;
            }

            // Count
            $countOrder = Order::where('cusID', '<>', null)
                                ->where('statusID', 3)
                                ->get()
                                ->count();
            $countNewOrder = Order::where('cusID', '<>', null)
                            ->where('statusID', 1)
                            ->get()
                            ->count();
            $countCus = customer::get()->count();

            // Tiền lãi tuần hiện tại
            $startWeek = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek()->isoFormat('D/M/Y');
            $endWeek = Carbon::now('Asia/Ho_Chi_Minh')->endOfWeek()->isoFormat('D/M/Y');
            $day_string = $startWeek. ' - ' .$endWeek;
            for($i=0; $i<7; $i++){
                $startWeek = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek();
                $startWeek->addDay($i)->toDateTimeString();
                $order = order::whereDate('created_at', $startWeek)->get();
                $tong = 0;
                foreach ($order as $order) {
                    if($order->statusID == 3){
                        foreach ($order->orderdetail as $orderdetail) {
                            $importdetail = importdetail::where('SKU', $orderdetail->SKU)->first();
                            $tiengoc = $importdetail->shoesCost * $orderdetail->quantity;
                            $tienban = ($orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice) * $orderdetail->quantity;
                            $loi = $tienban - $tiengoc;
                            $tong += $loi;
                        }
                    }
                    if ($order->disID) {
                        $tong -= $order->discount->discount;
                    }
                }
                $datas[] = $tong;
            }
            $total_week = array_sum($datas);

            // Tiền lãi tuần trước
            $startWeekOld = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek()->subWeek(1)->isoFormat('D/M/Y');
            $endWeekOld = Carbon::now('Asia/Ho_Chi_Minh')->endOfWeek()->subWeek(1)->isoFormat('D/M/Y');
            $day_string_old = $startWeekOld. ' - ' .$endWeekOld;
            for($i=0; $i<7; $i++){
                $startWeekOld = Carbon::now('Asia/Ho_Chi_Minh')->subWeek(1)->startOfWeek();
                $startWeekOld->addDay($i)->toDateTimeString();
                $order = order::whereDate('created_at', $startWeekOld)->get();
                $tong_cu = 0;
                foreach ($order as $order) {
                    if($order->statusID == 3){
                        foreach ($order->orderdetail as $orderdetail) {
                            $importdetail = importdetail::where('SKU', $orderdetail->SKU)->first();
                            $tiengoc = $importdetail->shoesCost * $orderdetail->quantity;
                            $tienban = ($orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice) * $orderdetail->quantity;
                            $loi = $tienban - $tiengoc;
                            $tong_cu += $loi;
                        } 
                    }
                    if ($order->disID) {
                        $tong_cu -= $order->discount->discount;
                    }
                }
                $datas_old[] = $tong_cu;
            }
            $total_week_old = array_sum($datas_old);

            // Thống kê đơn hàng hôm nay
            $orderOfDayNow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $orderOfDayNow_string = Carbon::now('Asia/Ho_Chi_Minh')->isoFormat('DD/MM/Y');
            $dang_xu_ly_day = order::wheredate('created_at', $orderOfDayNow)->where('statusID', 1)->count();
            $dang_giao_day = order::wheredate('created_at', $orderOfDayNow)->where('statusID', 2)->count();
            $da_giao_hang_day = order::wheredate('created_at', $orderOfDayNow)->where('statusID', 3)->count();
            $huy_day = order::wheredate('created_at', $orderOfDayNow)->where('statusID', 4)->count();
            $orderDayDatas = array($dang_xu_ly_day, $dang_giao_day, $da_giao_hang_day, $huy_day);

            // ============== BÁO CÁO THÁNG =============================
            if($request->thang == null){
                $orderOfMonth = Carbon::now('Asia/Ho_Chi_Minh')->isoFormat('MM');
                $saleOfMonth = Carbon::now('Asia/Ho_Chi_Minh')->isoFormat('Y-M');
                $month_string = Carbon::now('Asia/Ho_Chi_Minh')->isoFormat('Y-MM');
            }else{
                $orderOfMonth = Carbon::create($request->thang)->isoFormat('MM');
                $saleOfMonth = $request->thang;
                $month_string = Carbon::create($request->thang)->isoFormat('Y-MM');
            }

                // Đơn hàng theo tháng
                $dang_xu_ly_month = order::whereMonth('created_at', $orderOfMonth)->where('statusID', 1)->count();
                $dang_giao_month = order::whereMonth('created_at', $orderOfMonth)->where('statusID', 2)->count();
                $da_giao_hang_month = order::whereMonth('created_at', $orderOfMonth)->where('statusID', 3)->count();
                $huy_month = order::whereMonth('created_at', $orderOfMonth)->where('statusID', 4)->count();
                $orderMonthDatas = array($dang_xu_ly_month, $dang_giao_month, $da_giao_hang_month, $huy_month);


                // Doanh thu theo tháng
                $month_string = Carbon::create($saleOfMonth)->isoFormat('M/Y');
                $month_value = Carbon::create($saleOfMonth)->isoFormat('Y-MM');
                $countDaysOfMonth = Carbon::create($saleOfMonth)->endOfMonth()->day;
                for($i=0; $i<=($countDaysOfMonth - 1); $i++){
                    $startMonth = Carbon::create($saleOfMonth);
                    $day = $startMonth->addDay($i)->toDateString();
                    $order = order::whereDate('created_at', $day)->get();
                    $total_sales_month = 0;
                    foreach ($order as $order) {
                        if ($order->statusID == 3) {
                            foreach ($order->orderdetail as $orderdetail) {
                                $importdetail = importdetail::where('SKU', $orderdetail->SKU)->first();
                                $cost = $importdetail->shoesCost * $orderdetail->quantity;
                                $price = ($orderdetail->shoesdetail->shoescolor->salePrice ?? $orderdetail->shoesdetail->shoescolor->shoesPrice) * $orderdetail->quantity;
                                $sales_month = $price - $cost;
                                $total_sales_month += $sales_month;
                            }
                        }
                        if ($order->disID) {
                            $total_sales_month -= $order->discount->discount;
                        }
                    }
                    $datas_month[$day] = $total_sales_month;
                }
                $total_month = array_sum($datas_month);

            return view($this->pathView .'index', [
                'empSS' => $empSS,
                'countEmp' => $countEmp,
                'countShoes' => $countShoesdetail,
                'countOrder' => $countOrder,
                'countCus' => $countCus,
                'countNewOrder' => $countNewOrder,
                'datas' => $datas, 
                'day_string' => $day_string,
                'total_week' => $total_week,
                'datas_old' => $datas_old,
                'total_week_old' => $total_week_old,
                'day_string_old' => $day_string_old,
                'datas_month' => $datas_month,
                'total_month'=> $total_month,
                'month_string' => $month_string,
                'month' => $month_value,
                'orderDayDatas' => $orderDayDatas,
                'orderOfDayNow_string' => $orderOfDayNow_string,
                'orderMonthDatas' => $orderMonthDatas,
                ]);
        }else{
            return redirect()->route($this->pathView .'getLogin');
        }
    }

    public function getLogin(){
        return view($this->pathView .'login');
    }

    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        $employee = employee::where('username', $username)->first();
        $empID = $employee->empID;
        if($employee && Hash::check($password, $employee->password)){
            session()->put('empID', $empID);
            return redirect()->route($this->pathView .'index');
        }else{
            return view($this->pathView .'login');
        }
    }

    public function getChangepass(){
        return view($this->pathView .'changepass');
    }

    public function putChangepass(Request $request){
        $newpass = $request->newpass;
        $passBcrypt = bcrypt($newpass);
        $employee = Employee::where('username', $request->username)->first();
        if($employee && Hash::check($request->password, $employee->password)){
            Employee::where('username', $employee->username)
                    ->update([
                        'password' => $passBcrypt,
                    ]);
            return redirect()->route($this->pathView .'getLogin');
        }else{
            return redirect()->route($this->pathView .'getchangepass');
        }
    }

    public function logout(){
        session()->flush();
        return redirect()->route($this->pathView .'getLogin');
    }
}
