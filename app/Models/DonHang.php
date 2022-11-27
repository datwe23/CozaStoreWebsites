<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    const     CREATED_AT    = 'dh_taoMoi';
    const     UPDATED_AT    = 'dh_capNhat';

    protected $table        = 'cusc_donhang';
    protected $fillable     = ['kh_ma', 'dh_thoiGianDatHang', 'dh_thoiGianNhanHang', 'dh_nguoiNhan', 'dh_diaChi', 'dh_dienThoai', 'dh_nguoiGui', 'dh_loiChuc', 'dh_daThanhToan', 'nv_xuLy', 'dh_ngayXuLy', 'nv_giaoHang', 'dh_ngayLapPhieuGiao', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat', 'dh_trangThai', 'vc_ma', 'tt_ma'];
    protected $guarded      = ['dh_ma'];

    protected $primaryKey   = 'dh_ma';

    protected $dates        = ['dh_thoiGianDatHang', 'dh_thoiGianNhanHang', 'dh_ngayXuLy', 'dh_ngayLapPhieuGiao', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
    public function KhachHang ()
    {
        return $this->belongsto('App\Models\KhachHang','kh_ma');
    }
    public function  Vanchuyen ()
    {
        return $this->belongsto('App\Models\Vanchuyen','vc_ma');
    }
    public function ThanhToan ()
    {
        return $this->belongsto('App\Models\ThanhToan','tt_ma');
    }
}
