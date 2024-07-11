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
        Schema::create('order_nutris', function (Blueprint $table) {
            $table->id();
            $table->integer('age')->nullable(false);
            $table->boolean('gender')->nullable(false);
            $table->integer('level')->nullable(false);
            $table->string('level_detail')->nullable();
            $table->float('amount')->nullable(false);
            $table->string('nutri_id')->nullable(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();

            // Khóa ngoại
            $table->foreign('nutri_id')->references('id')->on('nutris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_nutris');
    }
};
