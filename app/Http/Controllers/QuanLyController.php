<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use App\Models\CT_TinTuc;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Yajra\Datatables\Datatables;
use URL;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;


class QuanLyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function NguoiDung()
    {
        return view('quanly.quanlynguoidung');
    }

    public function TinTuc()
    {
        
        return view('quanly.quanlytintuc');
    }

    public function ThemNguoiDung()
    {
        return view('quanly.themnguoidung');
    }
    public function post_ThemNguoiDung(DangKyRequest $req)
    {
        $nguoidung=NguoiDung::Where('username',$req->username)->first();
        
        if($nguoidung!=null)
        {
            return redirect()->back()->with('usernameerror','tên người dùng đã tồn tại');
        }
        NguoiDung::create([
            'username'=>$req->username,
            'password'=>Hash::make($req->password),
            'sdt'=>$req->sdt,
            'email'=>$req->email,
            'chucvu'=>$req->chucvu,
        ]);
        return redirect('/admin/quan-ly-nguoi-dung');

    }


    public function CapNhatNguoiDung()
    {
        
        
    }
    public function post_CapNhatNguoiDung()
    {
       
    }
    public function XoaNguoiDung($id)
    {
        
    }

    public function ThemTin()
    {
        $listDanhMuc=DanhMuc::all();
        $listNguoiDung=NguoiDung::all();
        return view('quanly.themtin',['listdanhmuc'=>$listDanhMuc],['listNguoiDung'=>$listNguoiDung]);
    }

    public function post_ThemTin(Request $req )
    {
        $file=$req->anhupload;
        $filename=time().".".$file->extension();
        $file->move(public_path('hinhanh'),$filename);
        $req->merge(['anh'=>$filename]);
        $req->merge(['trang_thai'=>true]);
        //    dd($req->all());
       
        if(CT_TinTuc::create($req->all()))
        {
            return redirect('/admin/quan-ly-tin-tuc');
        }
    }

    public function CapNhatTinTuc($id)
    {
        $tintuc=CT_TinTuc::find($id);
        return view('quanly.capnhattintuc',['tintuc'=>$tintuc]);
    }
    public function post_CapNhatTinTuc(Request $req,$id)
    {
        $tintuc=CT_TinTuc::find($id);
        if($tintuc->update($req->all()))
        {
            return redirect('/admin/quan-ly-tin-tuc');
        }
    }
    public function XoaTinTuc($id)
    {
        $tintuc=CT_TinTuc::find($id);
        $tintuc->delete();
        $tintuc->save();
        return redirect('/admin/quan-ly-tin-tuc');
    }

   

    public function GetNguoiDung()
    {
        $nguoidungs=NguoiDung::all();
        return Datatables::of($nguoidungs)
        // ->addColumn('chucnang',function($nguoidung){
        //     return '<a href="/admin/quan-ly-xoa-nguoi-dung/'.$nguoidung->id.'" class="btn btn-danger">Xóa</a>
        //     ';
        // })
        // ->addIndexColumn()

        ->editColumn('name',function($nguoidung){
            return $nguoidung->username;
        })
        ->editColumn('sdt',function($nguoidung){
            return $nguoidung->sdt;
        })
        ->editColumn('email',function($nguoidung){
            return $nguoidung->email;
        })
        ->editColumn('chucvu',function($nguoidung){
            return $nguoidung->chucvu;
        })
        
        ->make(true);

    }

    public function GetTinTuc()
    {
        $tintucs=CT_TinTuc::all();
        return Datatables::of($tintucs)
        ->addColumn('chucnang',function($tintuc){
            return '<a href="/admin/quan-ly-xoa-tin-tuc/'.$tintuc->id.'" class="btn btn-danger">Xóa</a>
            <a href="/admin/quan-ly-cap-nhat-tin-tuc/'.$tintuc->id.'" class="btn btn-warning">Sửa</a>';
        })
        // ->addIndexColumn()

        ->editColumn('username',function($nguoidung){
            return $nguoidung->username;
        })
        ->editColumn('loaitin',function($nguoidung){
            return $nguoidung->loai_tin;
        })
        ->editColumn('tieude',function($nguoidung){
            return $nguoidung->tieu_de;
        })
        
        
        ->editColumn('danhmuc',function($nguoidung){
            return $nguoidung->danh_muc;
        })
        ->rawColumns(['chucnang','anh'])
        ->make(true);

    }

    public function GetDanhMuc()
    {
        $danhmucs=DanhMuc::all();
        return Datatables::of($danhmucs)
        ->addColumn('chucnang',function($danhmuc){
            return '<a href="/admin/quan-ly-xoa-danh-muc/'.$danhmuc->id.'" class="btn btn-danger">Xóa</a>
            <a href="/admin/quan-ly-cap-nhat-danh-muc/'.$danhmuc->id.'" class="btn btn-warning">Sửa</a>';
        })
        //->addIndexColumn()

        ->editColumn('tendanhmuc',function($danhmuc){
            return $danhmuc->ten_danh_muc;
        })
        
        ->rawColumns(['chucnang'])
        ->make(true);

    }


}
