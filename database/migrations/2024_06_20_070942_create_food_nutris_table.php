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
        Schema::create('food_nutris', function (Blueprint $table) {
            $table->bigInteger('food_id')->unsigned();
            $table->string('nutri_id');
            $table->float('amount');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('nutri_id')->references('id')->on('nutris')->onDelete('cascade');


            $table->primary(['food_id', 'nutri_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_nutris');
    }
};
