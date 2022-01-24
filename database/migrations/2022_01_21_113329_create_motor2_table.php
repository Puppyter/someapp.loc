<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotor2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->dropColumn(['fuel_id', 'body_type_id']);
            $table->foreign('manufacture_id')->references('id')->on('manufactures');
            $table->unsignedBigInteger('manufacture_id')->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->dropForeign(['manufacture_id']);
            $table->dropColumn(['manufacture_id']);
            $table->unsignedBigInteger('fuel_id');
            $table->unsignedBigInteger('body_type_id');
            $table->index(['fuel_id','body_type_id']);
        });
    }
}
