<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Http\Respone;
use App\Models\NguoiDung;
use App\Models\CT_TinTuc;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Yajra\Datatables\Datatables;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTinTuc=CT_TinTuc::orderBy('created_at','desc')->get();
        return view('adminwebtimdo.trangchu',['listTinTuc'=>$listTinTuc]);
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
        $tintuc=CT_TinTuc::find($id);
        return view('adminwebtimdo.chitiet',['tintuc'=>$tintuc]);
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
    
    public function TimTin()
    {
        return view('adminwebtimdo.dangnhap');
    }

    public function TrangChu()
    {
        return view('adminwebtimdo.trangchu');
    }
    public function NhatDo()
    {
        $listTinTuc=CT_TinTuc::where(
            'loai_tin', 'Tin nhặt',
        )->get();
        return view('adminwebtimdo.nhatdo',['listTinTuc'=>$listTinTuc]);      
    }
    public function TimDo()
    {
        $listTinTuc=CT_TinTuc::where(
            'loai_tin', 'Tin tìm',
        )->get();
        return view('adminwebtimdo.nhatdo',['listTinTuc'=>$listTinTuc]);      
    }

    
    public function BoLoc()
    {

        return view('adminwebtimdo.boloc');
    }
    public function DangKy()
    {
        return view('adminwebtimdo.dangky');
    }

    public function post_DangKy(DangKyRequest $req)
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
            'chucvu'=>'user'
        ]);
        return redirect()->route('dang-nhap');

        
    }
    public function DangNhap()
    {
        return view('adminwebtimdo.dangnhap');
    }
    public function post_DangNhap(DangNhapRequest $req)
    {
        
               
        $admin=$req->only('username','password');
        //dd($admin);     
            if(Auth::attempt($admin))
            {
                $account=NguoiDung::where('username',$req->username)->first();
                Session::put('username',$account->username);
                return redirect()->route('trang-chu');
            }
        return  redirect()->back()->with("error","Dang nhap khong thanh cong");

    }

    public function DangXuat(){
        Auth::logout();
        return redirect()->route('start');
    }
    
    public function ThemTin()
    {
        $listDanhMuc=DanhMuc::all();
        return view('adminwebtimdo.themtin',['listdanhmuc'=>$listDanhMuc]);
    }
    public function post_ThemTin(Request $req)
    {
              
        $file=$req->anhupload;
        $filename=time().".".$file->extension();
        $file->move(public_path('hinhanh'),$filename);
        $req->merge(['anh'=>$filename]);
        $req->merge(['trang_thai'=>true]);
        $req->merge(['username'=>Session::get('username')]);
       
        if(CT_TinTuc::create($req->all()))
        {
            return redirect()->route('trang-chu');
            
        }
               
    }  
    
    public function TaiKhoan()
    {
        $account=NguoiDung::where('username',Session::get('username'))->first();
        
        return view('adminwebtimdo.taikhoan',['account'=>$account]);
    }


    public function CapNhatNguoiDung($id)
    {
        $NguoiDung=NguoiDung::find($id);
        return view('adminwebtimdo.capnhatnguoidung',['NguoiDung'=>$NguoiDung]);
    }

    public function post_CapNhatNguoiDung(Request $req, $id)
    {
        $NguoiDung=NguoiDung::find($id);
        if($NguoiDung->update($req->all()))
        {
            return redirect('/admin/tai-khoan');
        }
    }
    


    public function TinTucNguoiDung()
    {   
        
        $listTinTuc=CT_TinTuc::where('username',Session::get('username'))->get();
        return view('adminwebtimdo.tintucnguoidung',['listTinTuc'=>$listTinTuc]);
    }



    public function CapNhatTinTuc($id)
    {   $listLoaiTin=['Tin nhặt','Tin tìm'];
        $listDanhMuc=['Ví','Giấy tờ','Điện thoại'];
        $tintuc=CT_TinTuc::find($id);
        return view('adminwebtimdo.capnhattintuc',['tintuc'=>$tintuc,'listDanhMuc'=>$listDanhMuc,'listLoaiTin'=>$listLoaiTin]);
    }
    public function post_CapNhatTinTuc(Request $req, $id)
    {
       
        $tintuc=CT_TinTuc::find($id);
        if($req->has('anhupload'))
        {
            $file=$req->anhupload;
            $filename=time().".".$file->extension();
            $file->move(public_path('hinhanh'),$filename);
            $req->merge(['anh'=>$filename]);
        }
        
        $req->merge(['trang_thai'=>true]);

        if($tintuc->update($req->all()))
        {
            return redirect('/admin/tin-tuc-nguoi-dung');
        }
    }

    public function XoaTinTuc($id)
    {
        $tintuc=CT_TinTuc::find($id);
        $tintuc->delete();
        $tintuc->save();
        return redirect('/admin/tin-tuc-nguoi-dung');
        
    }

    
    

    

    public function GetDanhMuc()
    {
        $nguoidungs=NguoiDung::all();
        return Datatables::of($nguoidungs)
        ->addColumn('chucnang',function($nguoidung){
            return '<a href="/admin/quan-ly-xoa-nguoi-dung/'.$nguoidung->id.'" class="btn btn-danger">Xóa</a>
            <a href="/admin/quan-ly-cap-nhat-nguoi-dung/'.$nguoidung->id.'" class="btn btn-warning">Sửa</a>';
        })
        ->addIndexColumn()

        ->editColumn('name',function($nguoidung){
            return $nguoidung->username;
        })
        ->editColumn('sdt',function($nguoidung){
            return $nguoidung->sdt;
        })
        ->editColumn('email',function($nguoidung){
            return $nguoidung->email;
        })
        ->rawColumns(['chucnang'])
        ->make(true);

    }
}


