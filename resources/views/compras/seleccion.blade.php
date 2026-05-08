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

    {{-- Mensajes de Éxito o Error (Flash Data) para informar al usuario --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Elemento visual de la pantalla --}}
    <div class="pantalla">
        PANTALLA
    </div>

    <div class="mapa-asientos">
        {{-- 4. Bucle estilo C para generar las filas de la sala – Página 28 --}}
        @for ($f = 1; $f <= $sesion->sala->filas; $f++)
            <div class="fila">
                
                {{-- 5. Bucle anidado para las columnas --}}
                @for ($c = 1; $c <= $sesion->sala->columnas; $c++)
                    
                    @php
                        // Buscamos si este asiento específico (fila, columna) ya existe en las entradas
                        $estaOcupado = $ocupados->where('fila', $f)->where('columna', $c)->first();
                    @endphp

                    {{-- 6. Condicional para mostrar butaca libre u ocupada --}}
                    @if($estaOcupado)
                        {{-- Botón deshabilitado si la butaca ya está en la tabla ENTRADAS --}}
                        <button class="btn-butaca btn-ocupada" disabled>
                            X
                        </button>
                    @else
                        {{-- Formulario para enviar la reserva - CONTROL DE CONCURRENCIA --}}
                        <form action="{{ route('entradas.reservar') }}" method="POST" class="form-asiento" style="display: inline-block;">
                            @csrf {{-- Token de seguridad obligatorio según el profesor – Página 15 --}}
                            
                            {{-- Enviamos los datos ocultos para que el controlador sepa qué reservar --}}
                            <input type="hidden" name="id_sesion" value="{{ $sesion->id_sesion }}">
                            <input type="hidden" name="fila" value="{{ $f }}">
                            <input type="hidden" name="columna" value="{{ $c }}">
                            
                            {{-- Botón interactivo con efecto hover y aviso JS --}}
                            <button type="submit" class="btn-butaca btn-libre" onclick="return confirm('¿Quieres reservar el asiento {{ $f }}-{{ $c }}?')">
                                {{ $f }}-{{ $c }}
                            </button>
                        </form>
                    @endif

                @endfor
            </div>
        @endfor
    </div>

    {{-- Leyenda para mejorar la accesibilidad --}}
    <div style="margin-top: 30px; display: flex; justify-content: center; gap: 20px; font-size: 0.9rem;">
        <div><span style="display:inline-block; width:15px; height:15px; background:var(--verde-libre); border-radius:3px;"></span> Libre</div>
        <div><span style="display:inline-block; width:15px; height:15px; background:var(--rojo-ocupado); border-radius:3px;"></span> Ocupado</div>
        <div><span style="display:inline-block; width:15px; height:15px; background:var(--quicksand); border-radius:3px;"></span> Tu selección</div>
    </div>
</div>
@endsection