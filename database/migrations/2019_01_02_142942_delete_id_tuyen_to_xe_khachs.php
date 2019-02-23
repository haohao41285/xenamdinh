<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteIdTuyenToXeKhachs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xe_khachs', function (Blueprint $table) {
            $table->dropColumn('id_tuyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xe_khachs', function (Blueprint $table) {
            $table->smallInteger('id_tuyen');
        });
    }
}
