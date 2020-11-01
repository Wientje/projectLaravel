<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarMainItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_main_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carItem_id');
            $table->string('title');
            $table->text('description');
            $table->string('odometer');
            $table->timestamps();

            $table->foreign('carItem_id')
                -> references('id')
                -> on('car_items')
                -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_main_items');
    }
}
