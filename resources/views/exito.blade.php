{{-- 1. Heredamos del esquema general (Layout) – Página 37 del PDF --}}
@extends('layouts.app')

{{-- 2. Definimos la sección de contenido --}}
@section('content')
<div class="card" style="text-align: center; max-width: 600px; margin: 50px auto; padding: 40px; border-bottom: 5px solid var(--quicksand);">
    
    {{-- Icono visual de éxito --}}
    <div style="font-size: 5rem; margin-bottom: 20px;">✅</div>

    {{-- 3. Acceso a mensajes de confirmación (Flash Data) – Página 21 --}}
    @if(session('success'))
        <h1 style="color: var(--royal-blue); margin-bottom: 10px;">{{ session('success') }}</h1>
    @else
        <h1 style="color: var(--royal-blue); margin-bottom: 10px;">¡Pago Confirmado!</h1>
    @endif

    <p style="font-size: 1.2rem; color: var(--sapphire); margin-bottom: 30px;">
        Tu entrada para la sesión ha sido reservada correctamente.
    </p>

    {{-- Diseño de entrada de cine simulada --}}
    <div style="background: #ffffff; border: 2px dashed #cbd5e1; padding: 30px; margin: 20px 0; border-radius: 15px; position: relative; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        
        {{-- "Cortes" laterales para efecto de ticket --}}
        <div style="position: absolute; left: -12px; top: 50%; width: 24px; height: 24px; background: #f4f4f9; border-radius: 50%; border-right: 2px dashed #cbd5e1; transform: translateY(-50%);"></div>
        <div style="position: absolute; right: -12px; top: 50%; width: 24px; height: 24px; background: #f4f4f9; border-radius: 50%; border-left: 2px dashed #cbd5e1; transform: translateY(-50%);"></div>

        <p style="text-transform: uppercase; letter-spacing: 2px; color: #94a3b8; font-size: 0.8rem; margin-bottom: 10px;">Ticket Digital de Entrada</p>

        <p style="font-family: 'Courier New', Courier, monospace; font-weight: bold; font-size: 1.1rem; color: #334155;">
            Localizador: #{{ rand(100000, 999999) }}
        </p>
    </div>

    <div style="margin-top: 30px; display: flex; justify-content: center; gap: 15px;">
        {{-- Enlace para volver a la cartelera principal --}}
        <a href="{{ url('/inicio') }}" style="background: var(--quicksand); color: var(--royal-blue); padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold; transition: 0.3s;">
            Volver a Inicio
        </a>
    </div>

    <p style="color: #94a3b8; font-size: 0.8rem; margin-top: 25px;">
        Recuerda presentar este código en la puerta de la sala. ¡Disfruta de la película!
    </p>
</div>
@endsection