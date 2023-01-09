<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDanhMuc=DanhMuc::all();
        return view('quanly.quanlydanhmuc',['listDanhMuc'=>$listDanhMuc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quanly.themdanhmuc');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $danhmuc=DanhMuc::Where('ten_danh_muc',$req->ten_danh_muc)->first();
        
        if($danhmuc!=null)
        {
            return redirect()->back()->with('loidanhmuc','danh muc da ton tai');
        }
        DanhMuc::create([
            'ten_danh_muc'=>$req->ten_danh_muc,
        ]);
        return redirect('/admin/quan-ly-danh-muc');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc=DanhMuc::find($id);
        return view('quanly.capnhatdanhmuc',['danhmuc'=>$danhmuc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $danhmuc=DanhMuc::find($id);
        if($danhmuc->update($req->all()))
        {
            return redirect('/admin/quan-ly-danh-muc');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhmuc=DanhMuc::find($id);
        $danhmuc->delete();
        $danhmuc->save();
        return redirect('/admin/quan-ly-danh-muc');
    }
}
