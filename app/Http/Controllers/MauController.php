<?php

namespace App\Http\Controllers;

use App\Models\Mau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class MauController extends Controller
{
    public function index()
    {
        $colors = Mau::latest()->paginate(10);

        return view('backend.color.index', compact('colors'))
            ->with('i', (request()->input('page, 1') - 1) * 5);           
    }
    public function create(Request $request)
    {
         return view('backend.color.create');
}
    
    public function store(Request $request)
    {
        if ($request -> isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'm_ma' => 'required',
                'm_ten' => 'required',
                ]);
                if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
                }
            $newColor = new Mau();
            $newColor->m_ma = $request->m_ma;
            $newColor->m_ten = $request->m_ten;
            $newColor->m_trangThai = $request->m_trangThai;
            $newColor->save();
            return redirect()->route('color.index')
                ->with('success','Color created successfully !!!');
        }
    }
    public function edit($id)
    {
        $colors = Mau::find($id);
        return view('backend.color.edit', ['colors' => $colors]);
    }
    public function update(Request $request, $id)
    {
            $validator = Validator::make($request->all(), [
            'm_ma' => 'required',
            'm_ten' => 'required',
            ]);
            if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            }
            $colors = Mau::find($id);
            if ($colors != null) {
                $colors->m_ma = $request->m_ma;
                $colors->m_ten = $request->m_ten;
                $colors->m_trangThai = $request->m_trangThai;
                $colors->save();
                return redirect()->route('color.index')
                    ->with('success','Color updated successfully !!!');
            }
            else{
                return redirect()->route('color.index')
                ->with('Error','Color could not be updated.');
            }
        
    }
    public function destroy($id)
    {
        $colors = Mau::find($id);
        $colors->delete();
        return redirect()->route('color.index')->with('success', 'color deleted successfully');
    }
}