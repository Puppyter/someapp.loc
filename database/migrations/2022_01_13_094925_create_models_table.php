<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->foreign('manufacture_id')->references('id')->on('manufactures');
            $table->unsignedBigInteger('manufacture_id');
            $table->unsignedBigInteger('body_type_id');
            $table->string('name');
            $table->timestamps();
            $table->index(['manufacture_id', 'body_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
