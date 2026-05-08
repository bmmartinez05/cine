@extends('layouts.app')

@section('title', $pelicula->titulo . ' - Detalles')

@section('content')
    <h1 class="text-3xl font-bold mb-4">{{ $pelicula->titulo }}</h1>
    
    <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" width="300" alt="Cartel" class="mb-4 shadow-lg">
    
    <div class="mb-4">
        <p><strong>Duración:</strong> {{ $pelicula->duracion }} minutos</p>
        <p><strong>Sinopsis:</strong> {{ $pelicula->sinopsis }}</p>
    </div>
    
    <p class="font-bold mt-4">Horarios:</p>
    <ul class="mb-6">
        @foreach($pelicula->sesiones as $sesion)
            <li class="mt-2">
                {{ $sesion->hora_inicio }} 
                <a href="/comprar/{{ $sesion->id_sesion }}">
                    <button class="bg-blue-500 text-white px-4 py-1 rounded ml-2 hover:bg-blue-600 cursor-pointer">
                        Comprar entradas
                    </button>
                </a>
            </li>
        @endforeach
    </ul>

    <a href="/cartelera" class="text-blue-500 underline">⬅ Volver a la cartelera</a>
@endsection