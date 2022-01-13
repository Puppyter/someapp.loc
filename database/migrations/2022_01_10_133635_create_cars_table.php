<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacture');
            $table->unsignedBigInteger('model');
            $table->unsignedInteger('motor');
            $table->unsignedInteger('fuel_type');
            $table->unsignedInteger('year');
            $table->unsignedInteger('body_type');
            $table->timestamps();
            $table->index(['manufacture','model']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
