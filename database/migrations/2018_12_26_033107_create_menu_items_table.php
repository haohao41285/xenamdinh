<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('page_id')->unsigned()->nullable();
            $table->integer('parent_id')->default(0);
            $table->string('title',255);
            $table->integer('lft');
            $table->integer('rgt');
            $table->integer('depth');
            $table->integer('position')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('set null');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
