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
        Schema::create('estado_habitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            // $table->unsignedBigInteger('habitacion_id');
            // $table->foreign('habitacion_id')->references('id')->on('habitaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_habitaciones');
    }
};
