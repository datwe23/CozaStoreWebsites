<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauSanPham extends Model
{
    use HasFactory;
    public    $timestamps   = false;

    protected $table        = 'cusc_mausanpham';
    protected $fillable     = ['msp_soluong'];
    protected $guarded      = ['sp_ma', 'm_ma'];

    protected $primaryKey   = ['sp_ma', 'm_ma'];
    public    $incrementing = false;
}
