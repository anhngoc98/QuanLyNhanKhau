<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableYeucau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('yeucau', function(Blueprint $table){
            $table->increments('id');
            $table->string('TieuDe');
            $table->string('NoiDung');
            $table->date('NgayGui');
            $table->integer('TrangThai')->default(0);
            $table->integer('DoiTuong');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');
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
        Schema::dropIfExists('yeucau');
    }
}
