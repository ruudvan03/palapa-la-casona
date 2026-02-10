<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Muestra la Landing Page (Pública)
     */
    public function landing()
    {
        $rooms = Room::where('activa', true)->get();
        return view('welcome', compact('rooms'));
    }

    /**
     * Lista de habitaciones en el Panel (Privada)
     */
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Muestra el formulario para crear
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Guarda la habitación en la Base de Datos
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio_noche' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            // Guarda la imagen en storage/app/public/rooms
            $data['imagen'] = $request->file('imagen')->store('rooms', 'public');
        }

        Room::create($data);

        return redirect()->route('rooms.index')->with('success', '¡Habitación creada con éxito!');
    }

    /**
     * Muestra el formulario para editar
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Actualiza los datos de la habitación
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_noche' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            // Borra la imagen vieja si existe
            if ($room->imagen) {
                Storage::disk('public')->delete($room->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('rooms', 'public');
        }

        $room->update($data);

        return redirect()->route('rooms.index')->with('success', 'Habitación actualizada correctamente.');
    }

    /**
     * Elimina la habitación
     */
    public function destroy(Room $room)
    {
        if ($room->imagen) {
            Storage::disk('public')->delete($room->imagen);
        }
        
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Habitación eliminada del sistema.');
    }
}