<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableNhankhau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nhankhau', function(Blueprint $table){
            $table->increments('id');
            $table->string('MaNhanKhau')->unique();
            $table->string('QuanHe');
            $table->string('HoTen');
            $table->string('HoTenKhac')->nullable();
            $table->integer('GioiTinh');
            $table->date('NgaySinh');
            $table->string('DanToc');
            $table->string('QuocTich');
            $table->string('TonGiao')->nullable();
            $table->integer('CMND');
            $table->integer('HoChieu')->nullable();
            $table->string('NgheNghiep');
            $table->string('NoiLamViec');
            $table->date('NgayChuyenDen')->nullable();
            $table->string('ThuongTruTruoc')->nullable();
            $table->integer('LyDoXoa')->nullable();
            $table->integer('idHoKhau')->unsigned();
            $table->foreign('idHoKhau')->references('id')->on('hokhau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('nhankhau');
    }
}
