<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Validator;

class NhanVienController extends Controller
{
    public function index()
    {
        $nhanviens = NhanVien::latest()->paginate(10);

        return view('backend.nhanvien.index', compact('nhanviens'))
            ->with('i', (request()->input('page, 1') - 1) * 5);           
    }
    public function create(Request $request)
    {
         return view('backend.nhanvien.create');
}
    
    public function store(Request $request)
    {
        if ($request -> isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'nv_taiKhoan' => 'required',
                'nv_matKhau' => 'required',
                'nv_email' => 'required'
                ]);
                if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
                }
            $newNhanVien = new NhanVien();
            $newNhanVien->nv_ma = $request->nv_ma;
            $newNhanVien->nv_taiKhoan = $request->nv_taiKhoan;
            $newNhanVien->nv_matKhau = $request->nv_matKhau;
            $newNhanVien->nv_hoTen = $request->nv_hoTen;
            $newNhanVien->nv_gioiTinh = $request->nv_gioiTinh;
            $newNhanVien->nv_email = $request->nv_email;
            $newNhanVien->nv_ngaySinh = $request->nv_ngaySinh;
            $newNhanVien->nv_diaChi = $request->nv_diaChi;
            $newNhanVien->nv_dienThoai = $request->nv_dienThoai;
            $newNhanVien->nv_trangThai = $request->nv_trangThai;
            $newNhanVien->save();
            return redirect()->route('nhanvien.index')
                ->with('success','Account created successfully !!!');
        }
    }
    public function show($id)
    {
        $nhanviens = NhanVien::find($id);
        return view('backend.nhanvien.show', ['nhanviens' => $nhanviens]);
    }
    public function edit($id)
    {
        $nhanviens = NhanVien::find($id);
        return view('backend.nhanvien.edit', ['nhanviens' => $nhanviens]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nv_hoTen' => 'required' ,
            'nv_taiKhoan' => 'required',
            'nv_matKhau' => 'required',
            'nv_email' => 'required'
            ]);
            if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            }
            $nhanviens = NhanVien::find($id);
            if ($nhanviens != null) {
                $nhanviens->nv_ma = $request->nv_ma;
                $nhanviens->nv_taiKhoan = $request->nv_taiKhoan;
                $nhanviens->nv_matKhau = $request->nv_matKhau;
                $nhanviens->nv_hoTen = $request->nv_hoTen;
                $nhanviens->nv_gioiTinh = $request->nv_gioiTinh;
                $nhanviens->nv_email = $request->nv_email;
                $nhanviens->nv_ngaySinh = $request->nv_ngaySinh;
                $nhanviens->nv_diaChi = $request->nv_diaChi;
                $nhanviens->nv_dienThoai = $request->nv_dienThoai;
                $nhanviens->nv_trangThai = $request->nv_trangThai;
                $nhanviens->save();
                return redirect()->route('nhanvien.index')
                    ->with('success','Account updated successfully !!!');
            }
            else{
                return redirect()->route('nhanvien.index')
                ->with('Error','Account could not be updated.');
            }
        
    }
    public function destroy($id)
    {
        $nhanviens = NhanVien::find($id);
        $nhanviens->delete();
        return redirect()->route('nhanvien.index')->with('success', 'Account deleted successfully');
    }
}
