<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffers1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn(['manufacture','model','motor','body_type']);
            $table->foreign('model_id')->references('id')->on('models');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('manufacture_id');
            $table->unsignedBigInteger('motor_id');
            $table->unsignedBigInteger('body_type_id');
            $table->unsignedBigInteger('fuel_id');
            $table->boolean('technical_condition')->change();
            $table->unsignedBigInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign('model_id');
            $table->dropColumn(['manufacture_id','model_id','motor_id','body_type_id', 'fuel_id' ,'price']);
            $table->unsignedBigInteger('manufacture');
            $table->unsignedBigInteger('model');
            $table->unsignedBigInteger('motor');
            $table->unsignedInteger('body_type');
            $table->string('technical_condition')->change();
        });
    }
}
