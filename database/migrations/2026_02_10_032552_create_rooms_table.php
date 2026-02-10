<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Ej: Individual, Doble, Suite
            $table->text('descripcion')->nullable(); // Detalles de la habitación
            $table->decimal('precio_noche', 10, 2); // Ej: 600.00
            $table->string('imagen')->nullable(); // Ruta de la foto en storage
            $table->boolean('activa')->default(true); // Para ocultar habitaciones si están en mantenimiento
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};