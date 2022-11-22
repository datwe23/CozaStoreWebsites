<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;

class DonHangController extends Controller
{
    public function index(){
        $donhang = DonHang::all();
        return view('backend.donhang.index' , compact('donhang'));
    }
}
