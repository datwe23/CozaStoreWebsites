<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Loai;
use Symfony\Component\HttpFoundation\Session\Session;
use Spatie\FlareClient\Flare;
use Illuminate\Support\Facades\Storage;
use App\HinhAnh;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {

        $ds_sanpham = SanPham::all(); 
        return view('backend.sanpham.index')
            ->with('danhsachsanpham', $ds_sanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create()
    {  
        $ds_loai = Loai::all(); // SELECT * FROM loai

        
        return view('backend.sanpham.create')
            
            ->with('danhsachloai', $ds_loai);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request)
    {
        $validation = $request->validate([
            'sp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            'sp_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;
        if ($request->hasFile('sp_hinh')) {
            $file = $request->sp_hinh;
            $sp->sp_hinh = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('photos', $sp->sp_hinh);
        }
        $sp->save();
        if ($request->hasFile('sp_hinhanhlienquan')) {
            $files = $request->sp_hinhanhlienquan;
            foreach ($request->sp_hinhanhlienquan as $index => $file) {
                $file->storeAs('photos', $file->getClientOriginalName());
                $hinhAnh = new HinhAnh();
                $hinhAnh->sp_ma = $sp->sp_ma;
                $hinhAnh->ha_stt = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }
        return redirect()->route('admin.sanpham.index')
            ->with('success', 'Product create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function edit($id)
    {
        $sp = SanPham::where("sp_ma", $id)->first();
        $ds_loai = Loai::all();
        return view('backend.sanpham.edit')
            ->with('sp', $sp)
            ->with('danhsachloai', $ds_loai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, $id)
    {
        $validation = $request->validate([
            'sp_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'sp_hinhanhlienquan.*' => 'image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        $sp = SanPham::where("sp_ma",  $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;
        if ($request->hasFile('sp_hinh')) {
            Storage::delete('photos/' . $sp->sp_hinh);
            $file = $request->sp_hinh;
            $sp->sp_hinh = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('photos', $sp->sp_hinh);
        }
        if ($request->hasFile('sp_hinhanhlienquan')) {
            foreach ($sp->hinhanhlienquan()->get() as $hinhAnh) {
                Storage::delete('photos/' . $hinhAnh->ha_ten);
                $hinhAnh->delete();
            }
            $files = $request->sp_hinhanhlienquan;
            foreach ($request->sp_hinhanhlienquan as $index => $file) {
                $file->storeAs('photos', $file->getClientOriginalName());
                $hinhAnh = new HinhAnh();
                $hinhAnh->sp_ma = $sp->sp_ma;
                $hinhAnh->ha_stt = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }
        $sp->save();
        return redirect()->route('admin.sanpham.index')
            ->with('successcreate', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        $sp = SanPham::where("sp_ma",  $id)->first();
        if (empty($sp) == false) {
            foreach ($sp->hinhanhlienquan()->get() as $hinhAnh) {
                Storage::delete('photos/' . $hinhAnh->ha_ten);
                $hinhAnh->delete();
            }
            Storage::delete('photos/' . $sp->sp_hinh);
        }
        $sp->delete();
        return redirect()->route('admin.sanpham.index')
            ->with('successdelete', 'Product delete successfully');
    }
}
