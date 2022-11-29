<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\ThanhToan;
use App\Models\VanChuyen;

class DonHangController extends Controller
{
    public function index()
    {
        $DonHang = DonHang::latest()->paginate(5);
        return view('backend.donhang.index', compact('DonHang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function edit($id)
    {
        $Vanchuyen = Vanchuyen::all();
        $Thanhtoan = Thanhtoan::all();
        $DonHang = DonHang::find($id);
        return view('backend.donhang.edit', ['Vanchuyen' => $Vanchuyen, 'Thanhtoan' => $Thanhtoan, 'DonHang' => $DonHang]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {

            $DonHang = DonHang::make($request->all(), [

                'dh_ma' => 'required',
                'dh_nguoiNhan' => 'required',
                'dh_dienThoai' => 'required',
                'dh_nguoiGui' => 'required',
                'dh_loiChuc' => 'required',
                'dh_diaChi' => 'required',
                'dh_ngayXuly' => 'required',
                'dh_ngayXuly' => 'required',

            ]);

            $DonHang = DonHang::find($id);
            if ($DonHang  != null) {
                $DonHang->dh_ma = $request->dh_ma;
                $Donhang->kh_ma = $request->kh_ma;
                $DonHang->dh_nguoiNhan = $request->dh_nguoiNhan;
                $DonHang->dh_diaChi = $request->dh_diaChi;
                $DonHang->dh_dienThoai = $request->dh_dienThoai;
                $DonHang->dh_nguoiGui = $request->dh_nguoiGui;
                $DonHang->dh_loiChuc = $request->dh_loiChuc;
                $DonHang->dh_daThanhToan = $request->dh_daThanhToan;
                $DonHang->dh_ngayXuly = $request->dh_ngayXuly;
                $DonHang->tt_ma = $request->tt_ma;
            }
            $DonHang->save();
            return redirect()->route('admin.donhang.index')
                ->with('success', 'Order updated successfully');
        } else {
            return redirect()->route('admin.donhang.index')
                ->with('Error', 'Order not update');
        }
    }
    public function delete($id)
    {
        $donhang = DonHang::find($id);
        $donhang->delete();
        return redirect()->route('admin.donhang.index')
            ->with('successdelete', 'Product delete successfully');
    }
}
