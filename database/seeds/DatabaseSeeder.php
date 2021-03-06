<?php

use Illuminate\Database\Seeder;
use App\Models\employee;
use App\Models\information;
use App\Models\role;
use App\Models\size;
use App\Models\payment;
use App\Models\orderstatus;
use App\Models\color;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = array('Chủ cửa hàng', 'Quản lý', 'Nhân viên');
        foreach ($role as $value) {
            $role = new Role;
            $role->role = $value;
            $role->save();
        }

        $info = new Information;
        $info->infoID = 1;
        $info->save();

        $emp = new Employee;
        $emp->empID = 1;
        $emp->username = 'admin';
        $emp->password = bcrypt('123');
        $emp->infoID = 1;
        $emp->roleID = 1;
        $emp->save();

        $sizes = array(38, 39, 40, 41, 42, 43);
        foreach ($sizes as $value) {
            $size = new Size;
            $size->size = $value;
            $size->save();
        }

        $payment = array('Thanh toán trực tiếp', 'Thanh toán bằng paypal');
        foreach ($payment as $value) {
            $payment = new payment;
            $payment->payment = $value;
            $payment->save();
        }

        $orderstatus = array('Đang chờ xử lý', 'Đang giao hàng', 'Đã giao xong', 'Hủy đơn');
        foreach ($orderstatus as $value) {
            $orderstatus = new orderstatus;
            $orderstatus->status = $value;
            $orderstatus->save();
        }

        $colorArray = array(
            "Đỏ"=>"#ff0000", 
            "Trắng"=>"#ffffff", 
            "Đen"=>"#000000", 
            "Vàng"=> "#f2ff42", 
            "Xanh dương" => "#001eff", 
        );
        foreach ($colorArray as $key => $value) {
            $color = new color;
            $color->colorName = $key;
            $color->colorCode = $value;
            $color->save();
        }
    }
}
