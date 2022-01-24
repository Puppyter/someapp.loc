<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuel2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fuels', function (Blueprint $table) {
            $table->string('name')->change();
//            $table->foreign('manufacture_id')->references('id')->on('manufactures');
//            $table->unsignedBigInteger('manufacture_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fuels', function (Blueprint $table) {
            $table->dropForeign('manufacture_id');
            $table->dropColumn(['manufacture_id']);
            $table->string('name')->unique()->change();
        });
    }
}
