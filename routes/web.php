<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\models\shoescolor;
use App\models\news;
use App\models\importdetail;
use App\models\order;
use App\models\role;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ============ Backend =================================================================
Route::group(['prefix' => 'admin', 'namespace' => 'backend'], function() {
    $HomeController = 'HomeController@';

    // Trang chủ quản trị
    Route::get('/',$HomeController.'index')->name('backend.index'); 
    
    // Đăng nhập
    Route::get('/dang-nhap-quan-tri', $HomeController.'getLogin')->name('backend.getLogin')->middleware('checkLoginUserbackend');
    Route::post('/dang-nhap-quan-tri', $HomeController.'postLogin')->name('backend.postLogin');

    // Đăng xuất
    Route::get('/dang-xuat', $HomeController.'logout')->name('backend.logout');

    // Đổi mật khẩu
    Route::get('doi-mat-khau', $HomeController.'getChangepass')->name('backend.getchangepass');
    Route::put('doi-mat-khau', $HomeController.'putChangepass')->name('backend.putchangepass');
   
    // Đơn hàng
    Route::get('quan-ly-don-hang', 'OrderController@index')->name('don-hang.index')->middleware('checkLoginbackend');
    Route::get('chi-tiet-don-hang-{orderID}', 'OrderController@show')->name('don-hang.show')->middleware('checkLoginbackend');
    Route::put('chi-tiet-don-hang-{orderID}', 'OrderController@update')->name('don-hang.update');
    
    
    // Sản phẩm giày
    Route::resource('giay', 'ShoesController')->middleware('checkLoginbackend');

        // Màu sắc
        Route::get('giay/them-mau-sac-giay/{shoesID}/create', 'ShoesColorController@create')->middleware('checkLoginbackend')->name('shoescolor.create');
        Route::post('giay/them-mau-sac-giay/', 'ShoesColorController@store')->middleware('checkLoginbackend')->name('shoescolor.store');
        Route::get('chitiet/mau-giay-{shoescolorID}', 'ShoesColorController@show')->middleware('checkLoginbackend')->name('shoescolor.show');
        Route::get('chitiet/mau-giay-{shoescolorID}/edit', 'ShoesColorController@edit')->middleware('checkLoginbackend')->name('shoescolor.edit');
        Route::put('chitiet/mau-giay-{shoescolorID}', 'ShoesColorController@update')->middleware('checkLoginbackend')->name('shoescolor.update');
        Route::delete('chitiet/mau-giay-{shoescolorID}', 'ShoesColorController@destroy')->middleware('checkLoginbackend')->name('shoescolor.destroy');;
        
    // Thuộc tính của giày
    Route::resource('thuoc-tinh', 'AttributeController')->except(['show'])->middleware('checkLoginbackend');

    // Loại giày
    Route::resource('loai-giay', 'TypeController')->middleware('checkLoginbackend');
    
    // Thương hiệu giày
    Route::resource('thuong-hieu', 'BrandController')->middleware('checkLoginbackend');

    // Nhà cung cấp
    Route::resource('nha-cung-cap', 'SupplierController')->middleware('checkLoginbackend');
    Route::get('nha-cung-cap/{nha_cung_cap}/chitiet', 'SupplierController@getShowDate')->name('nha-cung-cap.getShowDate')->middleware('checkLoginbackend');
     
    // Khách hàng
    Route::get('/khach-hang', 'CustomerController@index')->name('khach-hang.index')->middleware('checkLoginbackend');

    // Nhân viên
    Route::resource('/nhan-vien', 'EmployeeController')->middleware('checkLoginbackend');

    // Khuyến mãi
    Route::resource('/khuyen-mai', 'DiscountController')->except(['show'])->middleware('checkLoginbackend');
    
    // Slider
    Route::resource('/slider', 'SliderController')->middleware('checkLoginbackend');

    // Tin tức
    Route::resource('tin-tuc', 'NewsController')->middleware('checkLoginbackend')->except('show');
});

// ====================== FRONTEND ====================================================================

Route::group(['prefix' => '/', 'namespace' => 'frontend'], function() {
    $HomeController = 'HomeController@';

    // Trang chủ
    Route::get('/', $HomeController .'index')->name('frontend.index');

    // Thông tin cá nhân
    Route::put('/thongtin', $HomeController .'userProfile')->name('frontend.userProfile');
    

    // Đăng nhập
    Route::get('dang-nhap', $HomeController .'getLogin')->name('frontend.getLogin');
    Route::post('dang-nhap', $HomeController .'postLogin')->name('frontend.postLogin');

    // Đăng ký
    Route::get('dang-ky', $HomeController .'getRegister')->name('frontend.getRegister');
    Route::post('dang-ky', $HomeController .'postRegister')->name('frontend.postRegister');

    // Đơn hàng
    Route::get('xem-don-hang', 'HomeController@myOrder')->name('frontend.order')->middleware('checkLoginFrontend');
    Route::get('chi-tiet-don-hang/{orderID}', 'HomeController@myOrderDetail')->name('frontend.myOrderDetail')->middleware('checkLoginFrontend');
    Route::delete('huy-don-hang/{orderID}', 'HomeController@myOrderDel')->name('frontend.myOrderDel');
    
    // Đăng xuất
    Route::get('dang-xuat', $HomeController.'logout')->name('frontend.logout')->middleware('checkLoginFrontend');

    // Tìm kiếm
    Route::get('tim-kiem/', $HomeController.'search')->name('search');
    
    // Giỏ hàng
    Route::get('giohang', 'CartController@index')->name('cart.index');
    Route::PUT('giohang/{orderID}/{SKU}', 'CartController@update')->name('cart.update');
    Route::delete('giohang/{orderID}/{SKU}', 'CartController@destroy')->name('cart.destroy');
    Route::get('giohang/them/{giohang}', 'CartController@addCart')->name('giohang.addCart');
    Route::post('giohang/{shoescolorID}', 'CartController@store')->name('cart.store');
    Route::get('giohang/{shoescolorID}/{size}', 'CartController@store');
    
    Route::put('them-khuyen-mai', 'CartController@addDiscount')->name('cart.discount');  

    // Sản phẩm
    Route::get('san-pham-giay', 'ShoesController@index')->name('shoes.index');
    Route::get('san-pham-giay/loai-giay-{typeName}', 'ShoesController@shoestype')->name('shoestype');
    Route::get('san-pham-giay/thuong-hieu-{brandName}', 'ShoesController@shoesbrand')->name('shoesbrand');
    Route::get('san-pham-giay/gia-tu-{from?}-den-{to?}', 'ShoesController@shoesprice')->name('shoesprice');
    Route::get('san-pham-giay/mau-{colorName}', 'ShoesController@shoescolor')->name('shoescolor');
    Route::get('san-pham-giay/{shoescolorID}', 'ShoesController@shoesdetail')->name('shoesdetail');

    // Tin tức
    Route::get('tintuc', 'NewsController@index')->name('tintuc.index');
    Route::get('tintuc/xem-chi-tiet/{newsID}', 'NewsController@show')->name('tintuc.show');

    // Thanh toán 
    Route::get('thanhtoan', 'CartController@getCheckout')->name('thanhtoan.checkout')->middleware('checkLoginFrontend');
    Route::put('thanhtoan/{total}', 'CartController@putCheckout')->name('thanhtoan.putCheckout');
    Route::put('checkout', 'CartController@checkout')->name('checkout');
    
});


Route::get('forget/', function() {
    session()->forget('cart');
});

// Clear cache
Route::get('/clear-cache', function(){
    $exitCode = Artisan::call('cache:clear');
}); 









