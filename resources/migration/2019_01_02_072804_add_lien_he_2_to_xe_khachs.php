<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLienHe2ToXeKhachs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xe_khachs', function (Blueprint $table) {
            $table->string('lien_he_2')->nullable();
            $table->string('lien_he_1');
            $table->dropColumn('lien_he');
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
            //
        });
    }
}
