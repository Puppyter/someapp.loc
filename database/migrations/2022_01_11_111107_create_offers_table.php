<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('manufacture');
            $table->unsignedBigInteger('model');
            $table->unsignedBigInteger('motor');
            $table->unsignedInteger('count_owners');
            $table->string('color');
            $table->unsignedBigInteger('mileage');
            $table->unsignedInteger('year');
            $table->text('description');
            $table->boolean('accident')->default(false)->index();
            $table->boolean('insurance')->index();
            $table->unsignedInteger('body_type');
            $table->string('city');
            $table->string('region');
            $table->string('technical_condition');
            $table->boolean('repainted');
            $table->timestamps();
            $table->index(['manufacture','model']);
            $table->index(['city','region']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
