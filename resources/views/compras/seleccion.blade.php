{{-- 1. Heredamos del esquema general (Layout) – Página 37 del PDF --}}
@extends('layouts.app')

{{-- 2. Definimos la sección de contenido --}}
@section('content')
<div class="card"> {{-- Usamos la clase card para el fondo blanco y sombras --}}
    
    {{-- 3. Acceso a variables del diccionario enviado por el controlador – Página 21 --}}
    <h1>Sesión: {{ $sesion->pelicula->titulo }}</h1>
    <p style="text-align: center; color: var(--sapphire); font-weight: bold;">
        Hora: {{ $sesion->hora_inicio }} | Sala: {{ $sesion->sala->nombre }}
    </p>

    {{-- Mensajes de Éxito o Error (Flash Data) --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="pantalla">PANTALLA</div>

    <div class="mapa-asientos">
        {{-- 4. Bucle estilo C para generar las filas de la sala – Página 28 --}}
        @for ($f = 1; $f <= $sesion->sala->filas; $f++)
            <div class="fila">
                @for ($c = 1; $c <= $sesion->sala->columnas; $c++)
                    
                    @php
                        // CONTROL DE CONCURRENCIA: Buscamos si el asiento ya existe
                        $estaOcupado = $ocupados->where('fila', $f)->where('columna', $c)->first();
                    @endphp

                    @if($estaOcupado)
                        <button class="btn-butaca btn-ocupada" disabled>X</button>
                    @else
                        {{-- MODIFICACIÓN MÍNIMA: Cambiamos la ruta al banco y pasamos datos de la peli --}}
                        <form action="{{ url('/ir-al-pago') }}" method="POST" class="form-asiento" style="display: inline-block;">
                            @csrf {{-- Token de seguridad obligatorio – Página 15 --}}
                            <input type="hidden" name="id_sesion" value="{{ $sesion->id_sesion }}">
                            <input type="hidden" name="titulo_peli" value="{{ $sesion->pelicula->titulo }}">
                            <input type="hidden" name="fila" value="{{ $f }}">
                            <input type="hidden" name="columna" value="{{ $c }}">
                            
                            <button type="submit" class="btn-butaca btn-libre">
                                {{ $f }}-{{ $c }}
                            </button>
                        </form>
                    @endif
                @endfor
            </div>
        @endfor
    </div>
</div>
@endsection