<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTuyenDung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyen_dungs', function (Blueprint $table) {
           $table->increments('id');
           $table->string('cong_ty');
           $table->string('ava');
           $table->text('mo_ta');
           $table->integer('customer_id')->unsigned();
           $table->timestamps();

           $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tuyen_dungs', function (Blueprint $table) {
            //
        });
    }
}
