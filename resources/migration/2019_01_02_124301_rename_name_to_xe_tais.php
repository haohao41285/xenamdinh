<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameNameToXeTais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xe_tais', function (Blueprint $table) {
            $table->renameColumn('name','ten_xe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xe_tais', function (Blueprint $table) {
            $table->renameColumn('ten_xe','name');
        });
    }
}
