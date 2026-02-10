<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Campos que el administrador puede llenar desde el formulario
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_noche',
        'imagen',
        'activa'
    ];

    // Esto asegura que el precio siempre se trate como un número decimal
    protected $casts = [
        'precio_noche' => 'decimal:2',
        'activa' => 'boolean',
    ];
}