<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loai;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Sử dụng Eloquent Model để truy vấn dữ liệu
    $danhsachsanpham = Loai::all(); // SELECT * FROM loaisanpham

    return  view('backend.loai.index', compact("danhsachsanpham"));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.loai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'l_ma' => 'required',
                'l_ten' => 'required'
            ]);
        if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        $category = new loai;
        $category ->l_ma =$request ->l_ma;
        $category ->l_ten =$request ->l_ten;
        $category ->save();
        return redirect() ->route('admin.loai.index') -> with ('success','Product category successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Loai::find($id);
        return view('backend.loai.edit' ,['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Loai::find($id);
        $category ->l_ma =$request ->l_ma;
        $category ->l_ten =$request ->l_ten;
        $category ->save();
        return redirect() ->route('admin.loai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Loai::find($id);
        $category ->delete();
        return redirect() ->route('admin.loai.index');
    }
}
