<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategoryFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_food', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('category_id');
            // $table->unsignedInteger('food_id');
            $table->timestamps();
            $table->integer('food_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('food_id')
                ->references('id')
                ->on('foods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('category_food');
    }
}
