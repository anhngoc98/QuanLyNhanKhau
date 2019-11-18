<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableHokhau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hokhau', function(Blueprint $table){
            $table->increments('id');
            $table->string('MaHoKhau')->unique();
            $table->string('TenChuHo');
            $table->integer('idThonXom')->unsigned();
            $table->foreign('idThonXom')->references('id')->on('thonxom');
            $table->date('NgayCap');
            $table->integer('HoSoHK')->nullable();
            $table->integer('SoDKTT')->nullable();
            $table->integer('ToSo')->nullable();
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
        Schema::dropIfExists('hokhau');
    }
}
