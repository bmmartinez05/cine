@extends('layouts.app')

@section('title', 'Nueva Sesión')

@section('content')
<div class="card" style="max-width: 600px; margin: 40px auto;">
    {{-- Encabezado Estilo TW --}}
    <div style="border-bottom: 2px solid var(--quicksand); margin-bottom: 30px; padding-bottom: 10px; text-align: center;">
        <h1 style="color: var(--royal-blue); margin: 0; text-transform: uppercase; letter-spacing: 1px;">📅 Programación</h1>
        <p style="color: var(--sapphire); margin: 5px 0 0 0; font-weight: bold;">Configurar nueva sesión de proyección</p>
    </div>

    {{-- Formulario dentro de tarjeta blanca --}}
    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 1px solid #f1f5f9; padding: 40px;">
        
        <form action="{{ url('/sesiones/guardar') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 25px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 8px;">ID de la Película</label>
                <input type="number" name="id_pelicula" required placeholder="Ej: 5"
                    style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; color: var(--royal-blue); font-weight: 600; outline: none;">
                <small style="color: #94a3b8; font-size: 0.7rem;">Introduce el código numérico de la película.</small>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 8px;">Número de Sala</label>
                <input type="number" name="id_sala" required placeholder="Ej: 1"
                    style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; color: var(--royal-blue); font-weight: 600; outline: none;">
            </div>

            <div style="margin-bottom: 35px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 8px;">Fecha y Hora de Inicio</label>
                <input type="datetime-local" name="hora_inicio" required
                    style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; color: var(--royal-blue); font-weight: 600; font-family: inherit; outline: none;">
            </div>

            {{-- Botonera final --}}
            <div style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
                <button type="submit" 
                    style="background: var(--royal-blue); color: white; padding: 14px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s;">
                    PUBLICAR SESIÓN
                </button>
                
                <a href="{{ url('/sesiones') }}" 
                   style="text-align: center; color: var(--royal-blue); font-size: 0.85rem; font-weight: bold; text-decoration: none; padding: 10px; border: 1px solid #e2e8f0; border-radius: 8px; transition: 0.3s;">
                    CANCELAR
                </a>
            </div>
        </form>
    </div>
</div>
@endsection