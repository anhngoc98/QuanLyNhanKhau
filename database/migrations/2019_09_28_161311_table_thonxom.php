<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableThonxom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('thonxom', function(Blueprint $table){
            $table->increments('id');
            $table->string('TenThonXom');
            $table->integer('idXaPhuong')->unsigned();
            $table->foreign('idXaPhuong')->references('id')->on('xaphuong');
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
        Schema::dropIfExists('thonxom');
    }
}
