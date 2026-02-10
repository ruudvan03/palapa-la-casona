<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-stone-900 relative">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=2070" 
                 class="w-full h-full object-cover opacity-40">
        </div>
        <div class="relative z-10 w-full max-w-md bg-white/90 backdrop-blur-md p-10 rounded-[3rem] shadow-2xl">
            <div class="text-center mb-10">
                <h1 class="font-serif text-4xl font-bold italic text-stone-800">La Casona</h1>
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-casona-yellow mt-2">Acceso Administrativo</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <input type="email" name="email" placeholder="Correo" required class="w-full bg-stone-100 border-none rounded-2xl p-4 focus:ring-2 focus:ring-casona-green outline-none">
                <input type="password" name="password" placeholder="Contraseña" required class="w-full bg-stone-100 border-none rounded-2xl p-4 focus:ring-2 focus:ring-casona-green outline-none">
                <button type="submit" class="w-full bg-stone-800 hover:bg-casona-green text-white py-4 rounded-2xl font-bold uppercase text-xs tracking-widest transition-all">Entrar</button>
            </form>
        </div>
    </div>
</x-guest-layout>