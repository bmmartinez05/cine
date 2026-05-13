@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 500px; margin: 40px auto; border-top: 5px solid var(--royal-blue); box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
    <h2 style="color: var(--royal-blue); text-align: center;">🏦 Pasarela de Pago Segura</h2>
    
    <div style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 25px; border: 1px solid var(--quicksand);">
        <p style="margin: 0; color: #64748b; font-size: 0.9rem;">Resumen de tu entrada:</p>
        <h3 style="margin: 5px 0; color: var(--sapphire);">{{ $datos['titulo'] }}</h3>
        <p style="margin: 0;">Fila: <b>{{ $datos['fila'] }}</b> | Asiento: <b>{{ $datos['columna'] }}</b></p>
        <p style="margin: 10px 0 0 0; font-size: 1.2rem; font-weight: bold; color: var(--royal-blue);">Total: {{ number_format($datos['precio'], 2) }}€</p>
    </div>

    <form action="{{ url('/finalizar-compra') }}" method="POST">
        @csrf
        {{-- Campos ocultos para no perder la info de la butaca --}}
        <input type="hidden" name="id_sesion" value="{{ $datos['id_sesion'] }}">
        <input type="hidden" name="fila" value="{{ $datos['fila'] }}">
        <input type="hidden" name="columna" value="{{ $datos['columna'] }}">

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Número de Tarjeta</label>
            <input type="text" name="numero_tarjeta" placeholder="4548 1234 5678 9101" maxlength="16" required 
                   style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px;">
        </div>

        <div style="display: flex; gap: 15px; margin-bottom: 25px;">
            <div style="flex: 2;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Fecha Expiración</label>
                <input type="text" placeholder="MM/YY" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px;">
            </div>
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">CVV</label>
                <input type="text" name="cvv" placeholder="123" maxlength="3" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px;">
            </div>
        </div>

        <button type="submit" style="background: var(--royal-blue); color: white; width: 100%; padding: 15px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 1.1rem; transition: 0.3s;"
                onmouseover="this.style.background='#1e3a8a'" onmouseout="this.style.background='var(--royal-blue)'">
            🔒 PAGAR AHORA
        </button>
    </form>
    
    <p style="text-align: center; color: #94a3b8; font-size: 0.8rem; margin-top: 20px;">
        Esta es una pasarela de pago simulada para el proyecto académico TW_CINE.
    </p>
</div>
@endsection