@extends('layouts.app')

@section('content')
<div class="card"> 
    
    <h1 class="compra-titulo">Sesión: {{ $sesion->pelicula->titulo }}</h1>
    <p class="compra-info">
        Hora: {{ $sesion->hora_inicio }} | Sala: {{ $sesion->sala->nombre }}
    </p>

    {{-- Mensajes de Éxito o Error --}}
    @if(session('success'))
        <div class="alerta-exito">{{ session('success') }}</div>
    @endif

    <div class="pantalla">PANTALLA</div>

    <div class="mapa-asientos">
        @for ($f = 1; $f <= $sesion->sala->filas; $f++)
            <div class="fila">
                @for ($c = 1; $c <= $sesion->sala->columnas; $c++)
                    
                    @php
                        $estaOcupado = $ocupados->where('fila', $f)->where('columna', $c)->first();
                    @endphp

                    @if($estaOcupado)
                        <button class="btn-butaca btn-ocupada" disabled>X</button>
                    @else
                        <form action="{{ url('/ir-al-pago') }}" method="POST" class="form-asiento">
                            @csrf
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