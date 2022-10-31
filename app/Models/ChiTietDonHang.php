<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    public    $timestamps   = false;

    protected $table        = 'cusc_chitietdonhang';
    protected $fillable     = ['ctdh_soLuong', 'ctdh_donGia'];
    protected $guarded      = ['dh_ma', 'sp_ma', 'm_ma'];

    protected $primaryKey   = ['dh_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;
}
