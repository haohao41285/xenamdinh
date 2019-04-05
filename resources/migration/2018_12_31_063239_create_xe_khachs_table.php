<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXeKhachsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xe_khachs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ava');
            $table->string('ten_xe');
            $table->integer('so_cho');
            $table->string('tai_trong');
            $table->string('dia_chi');
            $table->string('lien_he');
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
        Schema::dropIfExists('xe_khachs');
    }
}
