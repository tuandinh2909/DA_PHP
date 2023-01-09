<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\SinhVienController;
use App\http\Controllers\AdminController;
use App\http\Controllers\QuanLyController;
use App\http\Controllers\DanhMucController;
use App\http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/start',[Controller::class,'index'])->name('start');
Route::get('/start/chi-tiet/{id}',[Controller::class,'show']);
Route::get('/start/nhat-do',[Controller::class,'NhatDo']);
Route::get('/start/tim-do',[Controller::class,'TimDo']);


//Route cho nười dùng
Route::get('/admin/tai-khoan',[AdminController::class,'TaiKhoan'])->middleware('auth');
Route::get('/admin/tin-tuc-nguoi-dung',[AdminController::class,'TinTucNguoiDung'])->middleware('auth');
Route::get('/admin/cap-nhat-nguoi-dung/{id}',[AdminController::class,'CapNhatNguoiDung'])->middleware('auth');
Route::post('/admin/cap-nhat-nguoi-dung/{id}',[AdminController::class,'post_CapNhatNguoiDung'])->name('xu-li-cap-nhat-nguoi-dung')->middleware('auth');

Route::get('/admin/cap-nhat-tin-tuc/{id}',[AdminController::class,'CapNhatTinTuc']);
Route::post('/admin/cap-nhat-tin-tuc/{id}',[AdminController::class,'post_CapNhatTinTuc'])->name('xu-li-cap-nhat-tin-tuc')->middleware('auth');
Route::get('/admin/xoa-tin-tuc/{id}',[AdminController::class,'XoaTinTuc'])->name('xoa-tin-tuc')->middleware('auth');

Route::get('/admin/bai-dang',[AdminController::class,'index'])->middleware('auth');
Route::get('/admin/chi-tiet/{id}',[AdminController::class,'show'])->middleware('auth');

Route::get('/admin/dang-ky',[AdminController::class,'DangKy'])->name('dang-ky');
Route::post('/admin/dang-ky',[AdminController::class,'post_DangKy']);


Route::get('/admin/dang-nhap',[AdminController::class,'DangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/admin/dang-nhap',[AdminController::class,'post_DangNhap'])->middleware('guest');
Route::get('/admin/dang-xuat',[AdminController::class,'DangXuat'])->name('dang-xuat')->middleware('auth');


Route::get('/admin/them-tin',[AdminController::class,'ThemTin'])->name('them-tin')->middleware('auth');
Route::post('/admin/them-tin',[AdminController::class,'post_ThemTin'])->name('xu-li-them-tin')->middleware('auth');


Route::get('/admin/trang-chu',[AdminController::class,'index'])->name('trang-chu')->middleware('auth');
Route::get('/admin/nhat-do',[AdminController::class,'NhatDo'])->middleware('auth');
Route::get('/admin/tim-do',[AdminController::class,'TimDo'])->middleware('auth');
Route::get('/admin/bo-loc',[AdminController::class,'Boloc'])->middleware('auth');
//Route cho nười dùng







//Route cho quản lý(admin)

Route::get('/admin/tai-khoan/du-lieu',[QuanLyController::class,'GetNguoiDung'])->name('nguoidung.lay-du-lieu');
Route::get('/admin/tai-khoan/tin-tuc',[QuanLyController::class,'GetTinTuc'])->name('tintuc.lay-du-lieu');
Route::get('/admin/tai-khoan/danh-muc',[QuanLyController::class,'GetDanhMuc'])->name('danhmuc.lay-du-lieu');

Route::get('/admin/quan-ly',[QuanLyController::class,'NguoiDung']);
Route::get('/admin/quan-ly-nguoi-dung',[QuanLyController::class,'NguoiDung']);
Route::get('/admin/quan-ly-tin-tuc',[QuanLyController::class,'TinTuc']);
Route::get('/admin/quan-ly-danh-muc',[DanhMucController::class,'index']);


Route::get('/admin/quan-ly-them-tin',[QuanLyController::class,'ThemTin']);
Route::post('/admin/quan-ly-them-tin',[QuanLyController::class,'post_ThemTin'])->name('admin-quan-ly-xu-li-them-tin');

Route::get('/admin/quan-ly-them-nguoi-dung',[QuanLyController::class,'ThemNguoiDung']);
Route::post('/admin/quan-ly-them-nguoi-dung',[QuanLyController::class,'post_ThemNguoiDung'])->name('admin-quan-xu-li-them-nguoi-dung');

Route::get('/admin/quan-ly-them-danh-muc',[DanhMucController::class,'create']);
Route::post('/admin/quan-ly-them-danh-muc',[DanhMucController::class,'store'])->name('admin-xu-li-them-danh-muc');


Route::get('/admin/quan-ly-cap-nhat-nguoi-dung/{id}',[QuanLyController::class,'CapNhatNguoiDungi']);
Route::post('/admin/quan-ly-cap-nhat-nguoi-dung/{id}',[QuanLyController::class,'post_CapNhatNguoiDung'])->name('admin-xu-li-cap-nhat-nguoi-dung');
Route::get('/admin/quan-ly-xoa-nguoi-dung/{id}',[QuanLyController::class,'XoaNguoiDung'])->name('admin-xoa-nguoi-dung');

Route::get('/admin/quan-ly-cap-nhat-tin-tuc/{id}',[QuanLyController::class,'CapNhatTinTuc']);
Route::post('/admin/quan-ly-cap-nhat-tin-tuc/{id}',[QuanLyController::class,'post_CapNhatTinTuc'])->name('admin-xu-li-cap-nhat-tin-tuc');
Route::get('/admin/quan-ly-xoa-tin-tuc/{id}',[QuanLyController::class,'XoaTinTuc'])->name('admin-xoa-tin-tuc');

Route::get('/admin/quan-ly-cap-nhat-danh-muc/{id}',[DanhMucController::class,'edit']);
Route::post('/admin/quan-ly-cap-nhat-danh-muc/{id}',[DanhMucController::class,'update'])->name('admin-xu-li-cap-nhat-danh-muc');
Route::get('/admin/quan-ly-xoa-danh-muc/{id}',[DanhMucController::class,'destroy'])->name('admin-xoa-danh-muc');
//Route cho quản lý(admin)


















Route::get('/lop-hoc/danh-sach',[LopHocController::class,'index']);
Route::get('/lop-hoc/chi-tiet/{id}',[LopHocController::class,'show']);
Route::get('/lop-hoc/them',[LopHocController::class,'create']);
Route::post('/lop-hoc/them',[LopHocController::class,'store'])->name('xu-li-them-moi-lop-hoc');
Route::get('/lop-hoc/cap-nhat/{id}',[LopHocController::class,'edit']);
Route::post('/lop-hoc/cap-nhat/{id}',[LopHocController::class,'update'])->name('xu-li-cap-nhat-lop-hoc');
Route::get('/lop-hoc/xoa/{id}',[LopHocController::class,'destroy'])->name('xoa-lop-hoc');


Route::get('/sinh-vien/danh-sach',[SinhVienController::class,'index'] );
Route::get('/sinh-vien/chi-tiet/{id}',[SinhVienController::class,'show']);
Route::get('/sinh-vien/them',[SinhVienController::class,'create']);
Route::post('/sinh-vien/them',[SinhVienController::class,'store'])->name('xu-li-them-moi-sinh-vien');
Route::get('/sinh-vien/cap-nhat/{id}',[SinhVienController::class,'edit']);
Route::post('/sinh-vien/cap-nhat/{id}',[SinhVienController::class,'update'])->name('xu-li-cap-nhat-sinh-vien');
Route::get('/sinh-vien/xoa/{id}',[SinhVienController::class,'destroy']);


