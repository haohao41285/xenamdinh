<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_paths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('source')->unique();
            $table->string('main_path')->nullable();
            $table->string('detail_path')->nullable();
            $table->string('list')->nullable();
            $table->string('content')->nullable();
            $table->string('ava_element')->nullable();
            $table->string('href_element')->nullable();
            $table->string('title_element')->nullable();
            $table->string('description_element')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('news_paths');
    }
}
