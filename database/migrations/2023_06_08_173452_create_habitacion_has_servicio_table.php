<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionHasServicioTable extends Migration
{
    public function up()
    {
        Schema::create('habitacion_has_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habitacion_id');
            $table->unsignedBigInteger('servicio_id');
            $table->timestamps();
            $table->foreign('habitacion_id')->references('id')->on('habitaciones')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('habitacion_has_servicio');
    }
}
