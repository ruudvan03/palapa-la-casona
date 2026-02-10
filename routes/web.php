<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

// 1. RUTA PÚBLICA (Landing Page)
Route::get('/', [RoomController::class, 'landing'])->name('welcome');

// 2. RUTAS PRIVADAS (Requieren Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Redirección del Dashboard a la gestión de habitaciones
    Route::get('/dashboard', function () {
        return redirect()->route('rooms.index');
    })->name('dashboard');

    // CRUD completo de habitaciones
    Route::resource('rooms', RoomController::class)->except(['show']);
});

require __DIR__.'/auth.php';