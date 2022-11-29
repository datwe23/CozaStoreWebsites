<?php

use Illuminate\Support\Facades\Route;

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


//Frontend
use App\Http\Controllers\Frontend\FrontendController;

Route::group(['prefix' => 'home'], function () {

    Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

    Route::get('About', [FrontendController::class, 'about'])->name('frontend.about');

    Route::get('Contact', [FrontendController::class, 'contact'])->name('frontend.contact');

    Route::get('Product', [FrontendController::class, 'product'])->name('frontend.product');

    Route::get('Product-detail/{id}', [FrontendController::class, 'productDetail'])->name('frontend.productDetail');

    Route::get('Cart', [FrontendController::class, 'cart'])->name('frontend.cart');

    Route::get('Checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');

    Route::post('Order', [FrontendController::class, 'order'])->name('frontend.order');

    Route::get('Order/checkout', [FrontendController::class, 'orderFinish'])->name('frontend.orderFinish');
});

//Route::delete('/admin/sanpham/delete/{id}', [SanphamController::class , 'destroy'])->name('admin.sanpham.destroy');

use App\Http\Controllers\Backend\BaoCaoController;
// Tạo route Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', [BaoCaoController::class, 'donhang'])->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', [BaoCaoController::class, 'donhangData'])->name('backend.baocao.donhang.data');

Route::get('/lien-he', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/lien-he/goi-loi-nhan', [FrontendController::class, 'sendMailContactForm'])->name('frontend.contact.sendMailContactForm');


use App\Http\Controllers\Backend\SanPhamController;

Route::resource('/admin/sanpham', 'App\Http\Controllers\Backend\SanPhamController', ['as' => 'admin']);
Route::get('admin/sanpham', [SanphamController::class, 'index'])->name('admin.sanpham.index');
Route::get('admin/sanpham/create', [SanphamController::class, 'create'])->name('admin.sanpham.create');
Route::post('admin/sanpham/store', [SanphamController::class, 'store'])->name('admin.sanpham.store');
Route::get('/admin/sanpham/edit/{id}', [SanphamController::class, 'edit'])->name('admin.sanpham.edit');
Route::put('/admin/sanpham/edit/{id}', [SanphamController::class, 'update'])->name('admin.sanpham.update');
Route::get('/admin/sanpham/delete/{id}', [SanphamController::class, 'destroy'])->name('admin.sanpham.destroy');
Route::get('admin/sanpham/demo/{id}', [FrontendController::class, 'productDemo'])->name('admin.sanpham.demo');



use App\Http\Controllers\DonHangController;

Route::get('admin/donhang', [DonHangController::class, 'index'])->name('admin.donhang.index');
Route::get('/admin/donhang/delete/{id}', [DonHangController::class, 'delete'])->name('admin.donhang.delete');
Route::get('/admin/donhang/edit/{id}', [DonHangController::class, 'edit'])->name('admin.donhang.edit');
Route::post('/admin/donhang/editpost/{id}', [DonHangController::class, 'update'])->name('admin.donhang.update');
Route::get('/admin/donhang/show/{id}', [DonHangController::class, 'show'])->name('admin.donhang.show');


use App\Http\Controllers\Auth\AuthController;

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\KhachHangController;

Route::get('admin/customer', [KhachHangController::class, 'index'])->name('customer.index');
Route::get('admin/customer/create', [KhachHangController::class, 'create'])->name('customer.create');
Route::get('admin/customer/delete/{id}', [KhachHangController::class, 'destroy'])->name('customer.destroy');
Route::get('admin/customer/edit/{id}', [KhachHangController::class, 'edit'])->name('customer.edit');
Route::post('admin/customer/update/{id}', [KhachHangController::class, 'update'])->name('customer.update');
Route::get('admin/customer/show/{id}', [KhachHangController::class, 'show'])->name('customer.show');
Route::post('admin/customer/store', [KhachHangController::class, 'store'])->name('customer.store');

use App\Http\Controllers\NhanVienController;

Route::get('admin/nhanvien', [NhanVienController::class, 'index'])->name('nhanvien.index');
Route::get('admin/nhanvien/create', [NhanVienController::class, 'create'])->name('nhanvien.create');
Route::get('admin/nhanvien/delete/{id}', [NhanVienController::class, 'destroy'])->name('nhanvien.destroy');
Route::get('admin/nhanvien/edit/{id}', [NhanVienController::class, 'edit'])->name('nhanvien.edit');
Route::post('admin/nhanvien/update/{id}', [NhanVienController::class, 'update'])->name('nhanvien.update');
Route::get('admin/nhanvien/show/{id}', [NhanVienController::class, 'show'])->name('nhanvien.show');
Route::post('admin/nhanvien/store', [NhanVienController::class, 'store'])->name('nhanvien.store');

use App\Http\Controllers\MauController;

Route::get('admin/color', [MauController::class, 'index'])->name('color.index');
Route::get('admin/color/create', [MauController::class, 'create'])->name('color.create');
Route::get('admin/color/delete/{id}', [MauController::class, 'destroy'])->name('color.destroy');
Route::get('admin/color/edit/{id}', [MauController::class, 'edit'])->name('color.edit');
Route::post('admin/color/update/{id}', [MauController::class, 'update'])->name('color.update');
Route::post('admin/color/store', [MauController::class, 'store'])->name('color.store');


use App\Http\Controllers\Backend\LoaiController;
// route Danh mục Loại Sản phẩm
// Hàm Route::resource() sẽ tạo toàn bộ các route CRUD theo tiêu chuẩn RestFul API
Route::get('admin/index', [LoaiController::class, 'index'])->name('admin.loai.index');
Route::get('admin/loai/create', [LoaiController::class, 'create'])->name('admin.loai.create');
Route::post('admin/loai/store', [LoaiController::class, 'store'])->name('admin.loai.store');
Route::get('/admin/loai/edit/{id}', [LoaiController::class, 'edit'])->name('admin.loai.edit');
Route::post('/admin/loai/edit/{id}', [LoaiController::class, 'update'])->name('admin.loai.update');
Route::get('/admin/loai/delete/{id}', [LoaiController::class, 'destroy'])->name('admin.loai.destroy');
