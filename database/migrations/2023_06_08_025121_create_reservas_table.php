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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carnet');
            $table->string('nombre');
            $table->unsignedBigInteger('telefono');
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_llegada')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('habitacion_id');
            $table->string('estado');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
