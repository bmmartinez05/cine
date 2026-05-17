@extends('layouts.app')
@section('content')
<div class="card confirmacion-contenedor">
    
    <div class="confirmacion-icono">✅</div>

    @if(session('success'))
        <h1 class="confirmacion-titulo">{{ session('success') }}</h1>
    @else
        <h1 class="confirmacion-titulo">¡Pago Confirmado!</h1>
    @endif

    <p class="confirmacion-subtitulo">
        Tu entrada para la sesión ha sido reservada correctamente.
    </p>

    <div class="ticket-digital">
        
        <div class="ticket-corte-izq"></div>
        <div class="ticket-corte-der"></div>

        <p class="ticket-etiqueta">Ticket Digital de Entrada</p>

        <p class="ticket-localizador">
            Localizador: #{{ rand(100000, 999999) }}
        </p>
    </div>

    <div class="confirmacion-acciones">
        
        {{-- Enlace para volver a la cartelera principal --}}
        <a href="{{ url('/inicio') }}" class="btn-ticket">
            Volver a Inicio
        </a>
    </div>

    <p class="confirmacion-nota">
        Recuerda presentar este código en la puerta de la sala. ¡Disfruta de la película!
    </p>
</div>
@endsection