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
        Schema::create('product_has_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProduct');
            $table->unsignedBigInteger('idCategory');
            $table->timestamps();
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_has_categories');
    }
};
