<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function check(Request $request)
    {
        $data = [
            'nv_taiKhoan' => $request->nv_taiKhoan,
            'nv_matKhau' => $request->nv_matKhau,
            'level' => 1,
        ];

        if (Auth::attempt($data)) {
            //true
        } else {
            //false
        }
    }
    
}
