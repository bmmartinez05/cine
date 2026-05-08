{{-- 1. Heredamos del esquema general (Layout) – Página 37 del PDF --}}
@extends('layouts.app')

{{-- 2. Definimos la sección de contenido --}}
@section('content')
<div class="container">
    {{-- 3. Acceso a variables del diccionario enviado por el controlador – Página 21 --}}
    <h1>Sesión: {{ $sesion->pelicula->titulo }}</h1>
    <p>Hora: {{ $sesion->hora_inicio }} | Sala: {{ $sesion->sala->nombre }}</p>

    {{-- Mensajes de Éxito o Error (Flash Data) para informar al usuario --}}
    @if(session('success'))
        <div class="alert alert-success" style="color: green; background: #d4edda; padding: 10px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" style="color: red; background: #f8d7da; padding: 10px; border-radius: 5px;">
            {{ session('error') }}
        </div>
    @endif

    <div class="pantalla" style="background: #ccc; text-align: center; margin: 20px 0; padding: 10px;">
        PANTALLA
    </div>

    <div class="mapa-asientos">
        {{-- 4. Bucle estilo C para generar las filas de la sala – Página 28 --}}
        @for ($f = 1; $f <= $sesion->sala->filas; $f++)
            <div class="fila" style="display: flex; justify-content: center; gap: 5px; margin-bottom: 5px;">
                
                {{-- 5. Bucle anidado para las columnas --}}
                @for ($c = 1; $c <= $sesion->sala->columnas; $c++)
                    
                    @php
                        // Buscamos si este asiento específico (fila, columna) ya existe en las entradas
                        $estaOcupado = $ocupados->where('fila', $f)->where('columna', $c)->first();
                    @endphp

                    {{-- 6. Condicional para mostrar butaca libre u ocupada --}}
                    @if($estaOcupado)
                        {{-- Botón deshabilitado si la butaca ya está en la tabla ENTRADAS --}}
                        <button class="btn btn-danger" disabled style="background: red; color: white; width: 45px; height: 45px;">
                            X
                        </button>
                    @else
                        {{-- Formulario para enviar la reserva - CONTROL DE CONCURRENCIA --}}
                        <form action="{{ route('entradas.reservar') }}" method="POST" style="display:inline;">
                            @csrf {{-- Token de seguridad obligatorio según el profesor – Página 15 --}}
                            
                            {{-- Enviamos los datos ocultos para que el controlador sepa qué reservar --}}
                            <input type="hidden" name="id_sesion" value="{{ $sesion->id_sesion }}">
                            <input type="hidden" name="fila" value="{{ $f }}">
                            <input type="hidden" name="columna" value="{{ $c }}">
                            
                            <button type="submit" class="btn btn-success" style="background: green; color: white; width: 45px; height: 45px; cursor: pointer;">
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