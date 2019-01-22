<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFoodStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_store', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('store_id');
            // $table->unsignedInteger('food_id');
            $table->integer('status');
            $table->integer('quanity');
            $table->timestamps();
            $table->integer('store_id')->unsigned();
            $table->integer('food_id')->unsigned();
            $table->foreign('store_id')
                ->references('id')
                ->on('stores')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('food_id')
                ->references('id')
                ->on('foods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_store');
    }
}
