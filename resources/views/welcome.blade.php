<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palapa La Casona | Hotel & Restaurante</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 font-sans text-stone-900 antialiased">

    <nav class="fixed top-0 z-50 w-full flex items-center justify-between bg-white/80 backdrop-blur-md px-6 py-4 shadow-sm md:px-12">
        <div class="font-serif text-2xl italic font-bold text-stone-800">La Casona</div>
        
        <div class="hidden space-x-8 font-bold uppercase tracking-widest text-[10px] text-stone-500 md:flex">
            <a href="#inicio" class="hover:text-casona-green transition">Inicio</a>
            <a href="#habitaciones" class="hover:text-casona-green transition">Habitaciones</a>
            <a href="/login" class="bg-stone-800 text-white px-4 py-2 rounded-full hover:bg-casona-green transition">Ingresar</a>
        </div>
    </nav>

    <header id="inicio" class="relative h-screen flex flex-col items-center justify-center text-center px-4 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=2070" 
             class="absolute inset-0 -z-20 h-full w-full object-cover" alt="Hotel Fondo">
        <div class="absolute inset-0 bg-stone-900/40 -z-10"></div>

        <div class="max-w-4xl">
            <h1 class="text-white text-5xl md:text-8xl font-black mb-4 drop-shadow-2xl uppercase tracking-tighter">
                Tu Oasis <br> <span class="text-casona-yellow font-serif italic lowercase font-normal">Privado</span>
            </h1>
            <p class="text-white text-lg md:text-xl font-light opacity-90 mb-12 tracking-wide">Hotel, Restaurante y Alberca en Pochutla, Oaxaca.</p>

            <div class="bg-white/95 backdrop-blur p-6 rounded-[2.5rem] shadow-2xl inline-block w-full max-w-3xl border border-white/20">
                <form class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div class="text-left">
                        <label class="ml-2 text-[9px] font-black uppercase tracking-widest text-stone-400">Llegada</label>
                        <input type="date" class="w-full mt-1 border-none bg-stone-100 p-3 rounded-2xl outline-none focus:ring-2 focus:ring-casona-green text-sm">
                    </div>
                    <div class="text-left">
                        <label class="ml-2 text-[9px] font-black uppercase tracking-widest text-stone-400">Salida</label>
                        <input type="date" class="w-full mt-1 border-none bg-stone-100 p-3 rounded-2xl outline-none focus:ring-2 focus:ring-casona-green text-sm">
                    </div>
                    <div class="text-left">
                        <label class="ml-2 text-[9px] font-black uppercase tracking-widest text-stone-400">Huéspedes</label>
                        <select class="w-full mt-1 border-none bg-stone-100 p-3 rounded-2xl outline-none text-sm font-bold">
                            <option>1 Adulto</option>
                            <option selected>2 Adultos</option>
                            <option>Familia</option>
                        </select>
                    </div>
                    <button type="button" class="bg-casona-green text-white py-4 rounded-2xl font-black uppercase text-[10px] tracking-[0.2em] shadow-lg hover:bg-stone-800 transition-all">
                        Consultar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <section id="habitaciones" class="py-24 px-6">
        <div class="container mx-auto max-w-6xl text-center">
            <h2 class="text-4xl md:text-5xl font-black text-stone-800 mb-4 uppercase tracking-tighter">
                Habitaciones <span class="text-casona-yellow font-serif italic lowercase font-normal">& Suites</span>
            </h2>
            <p class="text-stone-400 text-sm uppercase tracking-widest mb-16 font-bold">Comodidad y elegancia en cada rincón</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @forelse($rooms as $room)
                    <div class="bg-white rounded-[3rem] p-4 shadow-sm border border-stone-100 hover:shadow-2xl transition-all duration-500 group">
                        <div class="w-full h-72 bg-stone-200 rounded-[2.5rem] mb-6 overflow-hidden relative">
                            @if($room->imagen)
                                <img src="{{ asset('storage/' . $room->imagen) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="flex h-full items-center justify-center text-stone-300 italic font-serif">Sin imagen</div>
                            @endif
                            <div class="absolute top-6 right-6 bg-white/90 backdrop-blur px-5 py-2 rounded-full text-[11px] font-black uppercase text-stone-800 shadow-sm">
                                ${{ number_format($room->precio_noche, 2) }} / noche
                            </div>
                        </div>
                        
                        <h3 class="text-2xl font-black text-stone-800 mb-2 uppercase tracking-tight">{{ $room->nombre }}</h3>
                        <p class="text-stone-500 text-sm leading-relaxed mb-8 px-4">{{ Str::limit($room->descripcion, 90) }}</p>
                        
                        <a href="#" class="block w-full bg-stone-100 text-stone-800 font-black py-4 rounded-[1.5rem] hover:bg-casona-yellow hover:text-white transition-all uppercase text-[10px] tracking-widest mb-2">
                            Reservar Ahora
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 py-20 bg-stone-100 rounded-[3rem] border-2 border-dashed border-stone-200">
                        <p class="text-stone-400 italic font-serif text-xl">Nuestras habitaciones estarán disponibles próximamente...</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-stone-900 py-16 text-center text-white">
        <div class="font-serif italic text-4xl mb-6 text-stone-200 tracking-tighter">La Casona</div>
        <div class="h-px w-20 bg-casona-yellow mx-auto mb-8 opacity-50"></div>
        <p class="text-[9px] font-black uppercase tracking-[0.5em] text-stone-500 italic">Pochutla, Oaxaca &bull; México</p>
    </footer>

</body>
</html>