@extends('layouts.app')

@section('content')
<div class="card">
    
    <div class="estrenos-encabezado">
        <h1>✨ Próximos Estrenos</h1>
        <p>Las novedades más esperadas de nuestra cartelera.</p>
    </div>

    <div class="estrenos-grid">
        @forelse($estrenos as $pelicula)
            <div class="pelicula-card">
                
                <div class="pelicula-cartel-wrapper">
                     <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" 
                          alt="{{ $pelicula->titulo }}" 
                          class="pelicula-cartel-img estrenos-img-efecto">
                </div>

                <div class="pelicula-cuerpo">
                    <h3 class="pelicula-titulo">{{ $pelicula->titulo }}</h3>

                    <p class="estrenos-sinopsis">
                        {{ Str::limit($pelicula->sinopsis, 120, '...') }}
                    </p>

                    <div class="estrenos-etiqueta">
                        ESTRENO MUY PRONTO
                    </div>
                </div>
            </div>
        @empty
            {{-- Mensaje si no hay películas marcadas como estreno --}}
            <div class="estrenos-vacio">
                <div class="icono-gigante">🎬</div>
                <h2>No hay estrenos programados todavía</h2>
                <p>Vuelve a revisar la cartelera más tarde.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection