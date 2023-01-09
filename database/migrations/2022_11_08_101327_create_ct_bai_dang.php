<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtBaiDang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_bai_dang', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('loai_tin');
            $table->string('tieu_de');
            $table->string('noi_dung');
            $table->string('anh');
            $table->string('danh_muc');
            $table->string('trang_thai');  
            $table->timestamps();
            $table->softDeletes('deleted_at');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_bai_dang');
        
    }
}
