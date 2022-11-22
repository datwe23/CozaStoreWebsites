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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Frontend
use App\Http\Controllers\Frontend\FrontendController;
    
Route::group(['prefix' => 'home'], function () {
    
    Route::get('/', [FrontendController::class , 'index'])->name('frontend.home');
    
    Route::get('About', [FrontendController::class , 'about'])->name('frontend.about');
    
    Route::get('Contact', [FrontendController::class , 'contact'])->name('frontend.contact');
    
    Route::get('Product', [FrontendController::class , 'product'])->name('frontend.product');
    
    Route::get('Product-detail/{id}', [FrontendController::class , 'productDetail'])->name('frontend.productDetail');

    Route::get('Cart', [FrontendController::class , 'cart'])->name('frontend.cart');
    
    Route::get('Checkout', [FrontendController::class , 'checkout'])->name('frontend.checkout');

    Route::post('Order', [FrontendController::class ,'order'] )->name('frontend.order');

    Route::get('Order/checkout', [FrontendController::class,'orderFinish'])->name('frontend.orderFinish');
});

Route::delete('/admin/sanpham/delete/{id}', [SanphamController::class , 'destroy'])->name('admin.sanpham.destroy');

use App\Http\Controllers\Backend\BaoCaoController;
// Tạo route Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', [BaoCaoController::class,'donhang'])->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', [BaoCaoController::class,'donhangData'])->name('backend.baocao.donhang.data');

Route::get('/lien-he', [FrontendController::class,'contact'])->name('frontend.contact');
Route::get('/lien-he/goi-loi-nhan', [FrontendController::class ,'sendMailContactForm'])->name('frontend.contact.sendMailContactForm');


use App\Http\Controllers\Backend\SanPhamController;
Route::resource('/admin/sanpham', 'App\Http\Controllers\Backend\SanPhamController', ['as' => 'admin']);
Route::get('admin/sanpham', [SanphamController::class , 'index'])->name('admin.sanpham.index');
Route::get('admin/sanpham/create', [SanphamController::class , 'create'])->name('admin.sanpham.create');
Route::post('admin/sanpham/store', [SanphamController::class , 'store'])->name('admin.sanpham.store');
Route::get('/admin/sanpham/edit/{id}', [SanphamController::class , 'edit'])->name('admin.sanpham.edit');
Route::put('/admin/sanpham/edit/{id}', [SanphamController::class , 'update'])->name('admin.sanpham.update');
Route::get('/admin/sanpham/delete/{id}', [SanphamController::class , 'destroy'])->name('admin.sanpham.destroy');
Route::get('admin/sanpham/demo/{id}', [FrontendController::class , 'productDemo'])->name('admin.sanpham.demo');


use App\Http\Controllers\Backend\LoaiController;
use App\Http\Controllers\LoaifController;
Route::get('admins',[LoaifController::class , 'index'] )->name('admin.loai.index');

// route Danh mục Loại Sản phẩm
// Hàm Route::resource() sẽ tạo toàn bộ các route CRUD theo tiêu chuẩn RestFul API
Route::get('admin/index',[LoaiController::class , 'index'] )->name('admin.loai.index');
Route::get('admin/loai/create', [LoaiController::class , 'create'])->name('admin.loai.create');
Route::post('admin/loai/store', [LoaiController::class , 'store'])->name('admin.loai.store');
Route::get('/admin/loai/edit/{id}', [LoaiController::class , 'edit'])->name('admin.loai.edit');
Route::put('/admin/loai/edit/{id}', [LoaiController::class , 'update'])->name('admin.loai.update');
Route::delete('/admin/loai/delete/{id}', [LoaiController::class , 'destroy'])->name('admin.loai.destroy');
