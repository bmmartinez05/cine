@extends('layouts.app')

@section('title', 'Cartelera de Cine')

@section('content')
<div class="card">
    {{-- Encabezado --}}
    <div class="cartelera-encabezado">
        <h1>🎬 Cartelera Actual</h1>
        <p>Disfruta de las mejores películas en nuestras salas.</p>
    </div>

    <div class="cartelera-grid">
        @foreach($peliculas as $pelicula)
            <div class="pelicula-card">
                
                <a href="/pelicula/{{ $pelicula->id_pelicula }}" class="pelicula-enlace">
                    <div class="pelicula-cartel-wrapper">
                         <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" 
                              alt="{{ $pelicula->titulo }}" 
                              class="pelicula-cartel-img">
                    </div>
                </a>

                <div class="pelicula-cuerpo">
                    <h3 class="pelicula-titulo">{{ $pelicula->titulo }}</h3>

                    {{-- Botón de Ver Detalles --}}
                    <div class="pelicula-boton-wrapper">
                        <a href="/pelicula/{{ $pelicula->id_pelicula }}" class="btn-cartelera">
                            VER DETALLES Y COMPRAR
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection