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
        Schema::create('salenotes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->float('total');
            $table->unsignedBigInteger('idPayHasProduct');
            $table->foreign('idPayHasProduct')->references('id')->on('pay_has_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salenotes');
    }
};
