<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffers3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->index('manufacture_id');
            $table->index('model_id');
            $table->index('fuel_id');
            $table->index('body_type_id');
            $table->index('motor_id');
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
            $table->dropIndex('manufacture_id');
            $table->dropIndex('model_id');
            $table->dropIndex('fuel_id');
            $table->dropIndex('body_type_id');
            $table->dropIndex('motor_id');

        });
    }
}
