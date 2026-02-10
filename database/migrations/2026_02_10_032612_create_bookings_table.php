<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // Relación con la habitación (si borras una habitación, se guardan las reservas)
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            
            // Datos del cliente
            $table->string('cliente_nombre');
            $table->string('cliente_email');
            $table->string('cliente_telefono');
            
            // Datos de la estancia
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->decimal('total_pago', 10, 2);
            
            // Estado de la reserva
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};