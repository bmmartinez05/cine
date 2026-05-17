@extends('layouts.app')

@section('content')
<div class="card pago-contenedor">
    <h2 class="pago-titulo">🏦 Pasarela de Pago Segura</h2>
    
    <div class="pago-resumen">
        <p class="resumen-etiqueta">Resumen de tu entrada:</p>
        <h3 class="resumen-pelicula">{{ $datos['titulo'] }}</h3>
        <p class="resumen-asiento">Fila: <b>{{ $datos['fila'] }}</b> | Asiento: <b>{{ $datos['columna'] }}</b></p>
        <p class="resumen-total">Total: {{ number_format($datos['precio'], 2) }}€</p>
    </div>

    <form action="{{ url('/finalizar-compra') }}" method="POST">
        @csrf
        <input type="hidden" name="id_sesion" value="{{ $datos['id_sesion'] }}">
        <input type="hidden" name="fila" value="{{ $datos['fila'] }}">
        <input type="hidden" name="columna" value="{{ $datos['columna'] }}">

        <div class="form-grupo form-espaciado">
            <label>Número de Tarjeta</label>
            <input type="text" name="numero_tarjeta" placeholder="4548 1234 5678 9101" maxlength="16" required class="form-input input-premium">
        </div>

        <div class="pago-fila-doble">
            <div class="form-grupo flex-2">
                <label>Fecha Expiración</label>
                <input type="text" placeholder="MM/YY" required class="form-input input-premium">
            </div>
            <div class="form-grupo flex-1">
                <label>CVV</label>
                <input type="text" name="cvv" placeholder="123" maxlength="3" required class="form-input input-premium">
            </div>
        </div>

        <button type="submit" class="btn-pago">
            🔒 PAGAR AHORA
        </button>
    </form>
</div>
@endsection