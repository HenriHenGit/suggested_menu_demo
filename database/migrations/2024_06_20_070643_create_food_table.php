<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
            $table->integer('number_eat')->nullable();
            $table->string('category_food_id');
            $table->string('status')->default('added ingredient');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_food_id')->references('id')->on('category_foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
