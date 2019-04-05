<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_name');
            $table->string('vehicle_image');
            $table->string('vehicle_character');
            $table->integer('vehicle_route_id')->unsigned();
            $table->string('vehicle_way');
            $table->string('vehicle_phone');
            $table->string('vehicle_phone_add')->nullable();
            $table->string('vehicle_note')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->foreign('vehicle_route_id')->references('id')->on('routes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
