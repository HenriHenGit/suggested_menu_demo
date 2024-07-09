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
        Schema::create('ingredient_details', function (Blueprint $table) {
            $table->bigInteger('ingredient_id')->unsigned();
            $table->string('nutri_id');
            $table->float('amount');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
            $table->foreign('nutri_id')->references('id')->on('nutris')->onDelete('cascade');


            $table->primary(['ingredient_id', 'nutri_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_details');
    }
};
