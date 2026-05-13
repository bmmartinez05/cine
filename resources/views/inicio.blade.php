@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    
    <div class="text-center mb-16">
        <div class="inline-block mb-6">
            <img src="{{ asset('carteles/logo.png') }}" alt="Logo Cine" class="h-40 w-auto"> 
        </div>

        <h1 class="text-6xl font-black text-white uppercase tracking-tighter">
            BIENVENIDO A <span class="text-yellow-500">TRIGGER WARNING</span>
        </h1>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center bg-slate-800/50 p-10 rounded-3xl border border-slate-700 shadow-2xl mb-16">
        <div>
            <h2 class="text-3xl font-bold text-white mb-6 uppercase">Sobre Nosotros</h2>
            <p class="text-lg text-gray-300 leading-relaxed mb-6">
                En <strong>Trigger Warning Cine</strong>, nos alejamos de lo convencional. Nuestra sala está diseñada para ofrecer una inmersión total con tecnología de última generación y una selección de películas que desafían los límites del espectador.
            </p>
            <p class="text-lg text-gray-300 leading-relaxed">
                Desde clásicos de culto hasta los estrenos más crudos del cine independiente, cada sesión es un evento único.
            </p>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-8 text-center">
        <div class="p-6 bg-slate-800 rounded-xl border border-slate-700">
            <h3 class="text-white font-bold text-xl mb-2">Sonido Atmos</h3>
            <p class="text-gray-400 text-sm">360 grados de audio para que sientas cada susurro y cada explosión.</p>
        </div>
        <div class="p-6 bg-slate-800 rounded-xl border border-slate-700">
            <h3 class="text-white font-bold text-xl mb-2">Bar Premium</h3>
            <p class="text-gray-400 text-sm">Palomitas gourmet y coctelería de autor disponible en tu butaca.</p>
        </div>
        <div class="p-6 bg-slate-800 rounded-xl border border-slate-700">
            <h3 class="text-white font-bold text-xl mb-2">Butacas VIP</h3>
            <p class="text-gray-400 text-sm">Máximo confort con asientos reclinables de piel en todas nuestras salas.</p>
        </div>
    </div>

</div>
@endsection