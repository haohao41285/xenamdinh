<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cate_vehicle_name');
            $table->string('cate_vehicle_slug');
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by');
            $table->string('cate_vehicle_active');
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
        Schema::dropIfExists('cate_vehicles');
    }
}
