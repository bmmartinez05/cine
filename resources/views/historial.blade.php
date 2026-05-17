@extends('layouts.app')

@section('content')
<div class="historial-main-container">
    <div class="card historial-card">
        <div class="historial-header">
            <h2>🗂️ Mis Reservas e Historial</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif

        @if($reservas->isEmpty())
            <div class="historial-vacio">
                <p>Todavía no has realizado ninguna compra.</p>
                <a href="{{ url('/cartelera') }}" class="btn-volver">Ver Cartelera</a>
            </div>
        @else
            <div class="tabla-responsive">
                <table class="tabla-historial">
                    <thead>
                        <tr>
                            <th>Película</th>
                            <th>Ubicación</th>
                            <th>Estado y Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr class="fila-historial">
                                <td class="celda-principal">
                                    <strong class="peli-titulo">{{ $reserva->sesion->pelicula->titulo }}</strong>
                                    <span class="peli-hora">🎥 {{ $reserva->sesion->hora_inicio }}</span>
                                </td>
                                <td class="celda-info">
                                    <span class="sala-tag">Sala: {{ $reserva->sesion->sala->nombre }}</span>
                                    <span class="butaca-tag">Fila {{ $reserva->fila }} - Col {{ $reserva->columna }}</span>
                                </td>
                                <td class="celda-acciones">
                                    @if(\Carbon\Carbon::parse($reserva->sesion->hora_inicio)->isFuture())
                                        <div class="accion-container">
                                            <span class="badge badge-confirmada">Confirmada</span>
                                            <form action="{{ route('entrada.eliminarReserva', $reserva->id_entrada) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-cancelar-mini" onclick="return confirm('¿Seguro que quieres cancelar?')">Cancelar</button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="badge badge-finalizada">Finalizada</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection