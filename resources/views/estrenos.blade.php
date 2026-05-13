@extends('layouts.app')

@section('content')
<div class="card">
    <div style="border-bottom: 2px solid var(--quicksand); margin-bottom: 30px; padding-bottom: 10px;">
        <h1 style="color: var(--royal-blue); margin: 0;">✨ Próximos Estrenos</h1>
        <p style="color: var(--sapphire); margin: 5px 0 0 0;">Las novedades más esperadas de nuestra cartelera.</p>
    </div>

    {{-- Contenedor de rejilla adaptable --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
        @forelse($estrenos as $pelicula)
            <div class="pelicula-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                
                {{-- Contenedor de imagen con altura fija --}}
                <div style="height: 400px; overflow: hidden;">
                     <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" 
                         alt="{{ $pelicula->titulo }}" 
                         style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;"
                         onmouseover="this.style.transform='scale(1.1)'" 
                         onmouseout="this.style.transform='scale(1)'">
                </div>

                <div style="padding: 20px;">
                    <h3 style="color: var(--royal-blue); margin-top: 0; font-size: 1.3rem;">{{ $pelicula->titulo }}</h3>
                    
                    {{-- Etiqueta de Género --}}
                    <span style="font-size: 0.8rem; background: #f1f5f9; color: var(--sapphire); padding: 4px 8px; border-radius: 4px; font-weight: bold;">
                        {{ $pelicula->genero ?? 'General' }}
                    </span>

                    <p style="color: #64748b; font-size: 0.9rem; line-height: 1.5; margin: 15px 0;">
                        {{ Str::limit($pelicula->sinopsis, 120, '...') }}
                    </p>

                    <div style="background: var(--quicksand); color: var(--royal-blue); text-align: center; padding: 8px; border-radius: 6px; font-weight: bold; font-size: 0.85rem; letter-spacing: 1px;">
                        ESTRENO MUY PRONTO
                    </div>
                </div>
            </div>
        @empty
            {{-- Mensaje si no hay películas marcadas como estreno --}}
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px;">
                <div style="font-size: 4rem;">🎬</div>
                <h2 style="color: #cbd5e1;">No hay estrenos programados todavía</h2>
                <p style="color: #94a3b8;">Vuelve a revisar la cartelera más tarde.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection