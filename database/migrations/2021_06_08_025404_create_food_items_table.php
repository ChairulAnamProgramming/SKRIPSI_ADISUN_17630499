<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('barn_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->integer('stock')->default(0);
            $table->text('description')->nullable();
            $table->string('price')->default('0');
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_items');
    }
}
