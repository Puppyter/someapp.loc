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
            $table->string('manufacture');
            $table->string('model');
            $table->string('motor');
            $table->integer('count_owners');
            $table->string('color');
            $table->unsignedBigInteger('mileage');
            $table->integer('year');
            $table->text('description');
            $table->boolean('accident')->default(false)->index();
            $table->boolean('insurance')->index();
            $table->string('body_type');
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
