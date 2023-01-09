<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNguoiDungs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nguoi_dungs', function (Blueprint $table) {
            $table->string('avatar');
            $table->string('chucvu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nguoi_dungs', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('chucvu');
        });
    }
}
