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
        Schema::create('postcats', function (Blueprint $table) {
            $table->unsignedBigInteger('id_post');
            $table->unsignedBigInteger('id_cat');
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('id_cat')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postcats');
    }
};
