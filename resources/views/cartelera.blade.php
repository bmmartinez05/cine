@extends('layouts.app')

@section('title', 'Cartelera de Cine')

@section('content')
<div class="card">
    {{-- Encabezado igual al de estrenos --}}
    <div style="border-bottom: 2px solid var(--quicksand); margin-bottom: 30px; padding-bottom: 10px;">
        <h1 style="color: var(--royal-blue); margin: 0;">🎬 Cartelera Actual</h1>
        <p style="color: var(--sapphire); margin: 5px 0 0 0;">Disfruta de las mejores películas en nuestras salas.</p>
    </div>

    {{-- Contenedor de rejilla adaptable --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
        @foreach($peliculas as $pelicula)
            <div class="pelicula-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                
                {{-- Imagen con enlace al detalle --}}
                <a href="/pelicula/{{ $pelicula->id_pelicula }}" style="text-decoration: none;">
                    <div style="height: 400px; overflow: hidden; position: relative;">
                         <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" 
                             alt="{{ $pelicula->titulo }}" 
                             style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;"
                             onmouseover="this.style.transform='scale(1.1)'" 
                             onmouseout="this.style.transform='scale(1)'">
                    </div>
                </a>

                <div style="padding: 20px;">
                    <h3 style="color: var(--royal-blue); margin-top: 0; font-size: 1.3rem;">{{ $pelicula->titulo }}</h3>

                    {{-- Botón de Ver Detalles --}}
                    <div style="margin-top: 20px;">
                        <a href="/pelicula/{{ $pelicula->id_pelicula }}" 
                           style="display: block; background: var(--quicksand); color: var(--royal-blue); text-align: center; padding: 10px; border-radius: 6px; font-weight: bold; font-size: 0.85rem; text-decoration: none; transition: 0.3s;"
                           onmouseover="this.style.opacity='0.8'" 
                           onmouseout="this.style.opacity='1'">
                            VER DETALLES Y COMPRAR
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection