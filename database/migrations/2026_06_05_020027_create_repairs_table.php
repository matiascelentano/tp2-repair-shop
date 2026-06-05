<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Repair;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('marca_celular');
            $table->string('modelo_celular');
            $table->text('descripcion_falla');
            $table->date('fecha_ingreso');
            $table->enum('estado', Repair::ESTADOS)->default('Ingresado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
