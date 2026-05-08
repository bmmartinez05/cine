@extends('layouts.app')

@section('title', 'Cartelera de Cine')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Nuestra Cartelera</h1>

    @foreach($peliculas as $pelicula)
        <div style="margin-bottom: 20px;">
            <a href="/pelicula/{{ $pelicula->id_pelicula }}" style="text-decoration: none; color: black;">
                <h3 class="text-xl">{{ $pelicula->titulo }}</h3>
                <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" width="150" alt="Cartel" class="mt-2 mb-2">
            </a>
            
            <p><strong>Horarios disponibles:</strong></p>
            <ul>
                @foreach($pelicula->sesiones as $sesion)
                    <li>{{ $sesion->hora_inicio }}</li>
                @endforeach
            </ul>
        </div>
        <hr class="my-4">
    @endforeach
@endsection