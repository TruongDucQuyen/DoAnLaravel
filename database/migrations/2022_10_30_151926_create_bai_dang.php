<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiDang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_dang', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->Integer('loai_tin');
            $table->string('noi_dung');
            $table->string('noi_mat');
            $table->string('thong_tin_lien_he');
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
        Schema::dropIfExists('bai_dang');
        $table->dropColumn('deleted_at');
    }
}
