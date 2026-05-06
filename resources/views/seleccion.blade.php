{{-- Heredamos del layout principal[cite: 1] --}}
@extends('layouts.app')

@section('content')
    <h1>Selección de Butacas</h1>
    <p>Película: {{ $sesion->pelicula->titulo }}</p>

    <div class="pantalla" style="text-align: center; margin-bottom: 20px;">
        --- PANTALLA ---
    </div>

    <div class="mapa-sala" style="display: flex; flex-direction: column; gap: 10px; align-items: center;">
        {{-- Bucles for estilo C para dibujar la sala[cite: 1] --}}
        @for ($f = 1; $f <= $sesion->sala->filas; $f++)
            <div class="fila" style="display: flex; gap: 10px;">
                @for ($c = 1; $c <= $sesion->sala->columnas; $c++)
                    @php
                        // Comprobamos si el asiento está ocupado en el diccionario[ 1]
                        $estaOcupada = $ocupados->where('fila', $f)->where('columna', $c)->first();
                    @endphp

                    @if($estaOcupada)
                        <button style="background: red; color: white;" disabled>X</button>
                    @else
                        <button style="background: green; color: white;">
                            {{ $f }}-{{ $c }}
                        </button>
                    @endif
                @endfor
            </div>
        @endfor
    </div>
@endsection