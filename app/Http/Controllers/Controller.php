<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Respone;
use App\Models\CT_TinTuc;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Start()
    {
        return view('start');
    }
    public function index()
    {
        $listTinTuc=CT_TinTuc::orderBy('created_at','desc')->get();
        return view('start.danhsachtin',['listTinTuc'=>$listTinTuc]);
    }
    public function show($id)
    {
        $tintuc=CT_TinTuc::find($id);
        return view('start.chitiet',['tintuc'=>$tintuc]);
    }


    public function NhatDo()
    {
        $listTinTuc=CT_TinTuc::where(
            'loai_tin', 'Tin nhặt',
        )->get();
        return view('start.nhatdo',['listTinTuc'=>$listTinTuc]);      
    }
    public function TimDo()
    {
        $listTinTuc=CT_TinTuc::where(
            'loai_tin', 'Tin tìm',
        )->get();
        return view('start.nhatdo',['listTinTuc'=>$listTinTuc]);      
    }

    
}
