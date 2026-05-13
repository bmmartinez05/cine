@extends('layouts.app')

@section('title', $pelicula->titulo . ' - Detalles')

@section('content')
<div class="card" style="max-width: 1000px; margin: 20px auto;">
    {{-- Encabezado con el título --}}
    <div style="border-bottom: 2px solid var(--quicksand); margin-bottom: 30px; padding-bottom: 10px;">
        <h1 style="color: var(--royal-blue); margin: 0; text-transform: uppercase; letter-spacing: 1px;">🎬 Detalle de la Película</h1>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 40px; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        
        {{-- Columna Izquierda: El Cartel --}}
        <div>
            <div style="position: sticky; top: 20px;">
                <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" 
                     alt="{{ $pelicula->titulo }}" 
                     style="width: 100%; border-radius: 12px; shadow: 0 10px 25px rgba(0,0,0,0.2); border: 1px solid #e2e8f0;">
                
                <div style="margin-top: 15px; background: #f8fafc; padding: 15px; border-radius: 10px; text-align: center; border: 1px solid #e2e8f0;">
                    <span style="display: block; color: var(--sapphire); font-size: 0.7rem; font-weight: bold; text-transform: uppercase;">Duración</span>
                    <span style="font-size: 1.2rem; font-weight: bold; color: var(--royal-blue);">⏳ {{ $pelicula->duracion }} min</span>
                </div>
            </div>
        </div>

        {{-- Columna Derecha: Info y Sesiones --}}
        <div>
            <h2 style="color: var(--royal-blue); font-size: 2.5rem; margin-top: 0; margin-bottom: 10px; line-height: 1.1;">{{ $pelicula->titulo }}</h2>
            
            <div style="display: flex; gap: 10px; margin-bottom: 20px;">
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="color: var(--sapphire); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; border-bottom: 1px solid #f1f5f9; padding-bottom: 5px;">Sinopsis</h3>
                <p style="color: #475569; line-height: 1.6; font-size: 1.05rem;">{{ $pelicula->sinopsis }}</p>
            </div>

            {{-- Sección de Horarios --}}
            <div style="background: #f8fafc; padding: 25px; border-radius: 15px; border: 1px solid #e2e8f0;">
                <h3 style="color: var(--royal-blue); margin-top: 0; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                    🎟️ Selecciona tu sesión:
                </h3>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @forelse($pelicula->sesiones as $sesion)
                        <div style="display: flex; align-items: center; justify-content: space-between; background: white; padding: 15px; border-radius: 10px; border: 1px solid #e2e8f0; transition: 0.3s;" onmouseover="this.style.borderColor='var(--quicksand)'" onmouseout="this.style.borderColor='#e2e8f0'">
                            <div>
                                <span style="font-size: 1.2rem; font-weight: bold; color: var(--royal-blue);">
                                    {{ \Carbon\Carbon::parse($sesion->hora_inicio)->format('H:i') }}
                                </span>
                            </div>
                            
                            <a href="/comprar/{{ $sesion->id_sesion }}" style="text-decoration: none;">
                                <button style="background: var(--royal-blue); color: white; border: none; padding: 8px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='var(--sapphire)'" onmouseout="this.style.background='var(--royal-blue)'">
                                    COMPRAR
                                </button>
                            </a>
                        </div>
                    @empty
                        <p style="color: #94a3b8; font-style: italic; text-align: center;">No hay sesiones programadas para esta película.</p>
                    @endforelse
                </div>
            </div>

            <div style="margin-top: 30px;">
                <a href="/cartelera" style="color: var(--royal-blue); text-decoration: none; font-weight: bold; font-size: 0.9rem; display: flex; align-items: center; gap: 5px;">
                    ⬅ VOLVER A LA CARTELERA
                </a>
            </div>
        </div>
    </div>
</div>
@endsection