<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idNhanKhau')->unsigned();
            $table->foreign('idNhanKhau')->references('id')->on('nhankhau');
            $table->string('TenDangNhap');
            $table->string('password');
            $table->string('SoDienThoai');
            $table->integer('idRole')->unsigned();
            $table->foreign('idRole')->references('id')->on('role');
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
        Schema::dropIfExists('users');
    }
}
