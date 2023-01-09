<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CT_TinTuc extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table="ct_bai_dang";
    protected $fillable=['username','loai_tin','tieu_de','noi_dung','anh','danh_muc','trang_thai'];
}
