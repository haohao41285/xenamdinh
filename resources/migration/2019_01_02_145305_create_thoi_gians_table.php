<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThoiGiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thoi_gians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_xe')->unsigned();
            $table->foreign('id_xe')->references('id')->on('xe_khachs')->onDelete('cascade');
            $table->string('thoi_gian_di');
            $table->string('thoi_gian_ve');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thoi_gians');
    }
}
