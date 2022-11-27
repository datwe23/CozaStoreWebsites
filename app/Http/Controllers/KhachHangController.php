<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Support\Facades\Validator; 
use Database\Seeders\KhachHangTableSeeder;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {
        $customers = KhachHang::latest()->paginate(10);

        return view('backend.customer.index', compact('customers'))
            ->with('i', (request()->input('page, 1') - 1) * 5);           
    }
    public function create(Request $request)
    {
         return view('backend.customer.create');
}
    
    public function store(Request $request)
    {
        if ($request -> isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'kh_hoTen' => 'required',
                'kh_taiKhoan' => 'required',
                'kh_matKhau' => 'required',
                'kh_email' => 'required'
                ]);
                if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
                }
            $newCustomer = new KhachHang();
            $newCustomer->kh_ma = $request->kh_ma;
            $newCustomer->kh_taiKhoan = $request->kh_taiKhoan;
            $newCustomer->kh_matKhau = $request->kh_matKhau;
            $newCustomer->kh_hoTen = $request->kh_hoTen;
            $newCustomer->kh_gioiTinh = $request->kh_gioiTinh;
            $newCustomer->kh_email = $request->kh_email;
            $newCustomer->kh_ngaySinh = $request->kh_ngaySinh;
            $newCustomer->kh_diaChi = $request->kh_diaChi;
            $newCustomer->kh_dienThoai = $request->kh_dienThoai;
            $newCustomer->kh_trangThai = $request->kh_trangThai;
            $newCustomer->save();
            return redirect()->route('customer.index')
                ->with('success', 'Product create successfully');
        }
    }
    public function show($id)
    {
        $customers = KhachHang::find($id);
        return view('backend.customer.show', ['customers' => $customers]);
    }
    public function edit($id)
    {
        $customers = KhachHang::find($id);
        return view('backend.customer.edit', ['customers' => $customers]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kh_hoTen' => 'required',
            'kh_taiKhoan' => 'required',
            'kh_matKhau' => 'required',
            'kh_email' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            }
            $customers = KhachHang::find($id);
            if ($customers != null) {
                $customers->kh_ma = $request->kh_ma;
                $customers->kh_taiKhoan = $request->kh_taiKhoan;
                $customers->kh_matKhau = $request->kh_matKhau;
                $customers->kh_hoTen = $request->kh_hoTen;
                $customers->kh_gioiTinh = $request->kh_gioiTinh;
                $customers->kh_email = $request->kh_email;
                $customers->kh_ngaySinh = $request->kh_ngaySinh;
                $customers->kh_diaChi = $request->kh_diaChi;
                $customers->kh_dienThoai = $request->kh_dienThoai;
                $customers->kh_trangThai = $request->kh_trangThai;
                $customers->save();
                return redirect()->route('customer.index')
                ->with( 'successcreate', 'Product updated successfully');

            }
            else{
                return redirect()->route('customer.index')
                ->with('Error','Account could not be updated.');
            }
        
    }
    public function destroy($id)
    {
        $customers = KhachHang::find($id);
        $customers->delete();
        return redirect()->route('customer.index')
        ->with( 'successdelete', 'Product delete successfully');

    }
}
