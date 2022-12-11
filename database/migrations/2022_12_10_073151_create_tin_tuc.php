<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tuc', function (Blueprint $table) {
            $table->id();
            $table->String('tieu_de')->nullable();
            $table->longText('noi_dung')->nullable();
            $table->String('hinh_anh')->nullable();
            $table->string('path');
            $table->dateTime('thoi_gian');
            $table->String('ten_nguoi_dang')->nullable();
            $table->integer('nguoidang_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tin_tuc');
        $table->dropColumn('deleted_at');
    }
}
