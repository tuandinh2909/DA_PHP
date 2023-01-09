<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class NguoiDung extends Authenticatable
{
    use HasFactory;
    use softDeletes;
    protected $table="nguoi_dungs";
    protected $fillable=['username','password','sdt','email','chucvu'];
}
