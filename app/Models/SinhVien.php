<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\LopHoc;

class SinhVien extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table='sinh_vien';
    protected $fillable=['mssv','ho_ten','lop_hoc_id','email','diem_tb'];
    public function lopHoc(){
        return $this->belongsTo(LopHoc::class,'lop_hoc_id','id');
    }
}
