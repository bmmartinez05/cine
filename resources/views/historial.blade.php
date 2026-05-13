{{-- 1. Heredamos del layout principal – Página 37 del PDF --}}
@extends('layouts.app')

@section('content')
<div class="card" style="padding: 30px; max-width: 1000px; margin: 20px auto;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--quicksand); padding-bottom: 15px; margin-bottom: 20px;">
        <h2 style="color: var(--royal-blue); margin: 0;">🗂️ Mis Reservas e Historial</h2>
    </div>

    {{-- 2. Verificamos si hay reservas para mostrar --}}
    @if($reservas->isEmpty())
        <div style="text-align: center; padding: 50px;">
            <p style="color: #64748b; font-size: 1.2rem;">Todavía no has realizado ninguna compra.</p>
            <a href="{{ url('/estrenos') }}" class="btn-butaca btn-libre" style="display: inline-block; padding: 10px 20px; text-decoration: none;">Ver Cartelera</a>
        </div>
    @else
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: var(--sapphire); color: white; text-align: left;">
                    <th style="padding: 15px; border-radius: 8px 0 0 0;">Película</th>
                    <th style="padding: 15px;">Sala / Butaca</th>
                    <th style="padding: 15px; border-radius: 0 8px 0 0;">Estado</th>
                </tr>
            </thead>
            <tbody>
                {{-- 3. Bucle foreach para recorrer las reservas enviadas desde el controlador – Página 28 --}}
                @foreach($reservas as $reserva)
                    <tr style="border-bottom: 1px solid #e2e8f0; transition: background 0.3s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                        <td style="padding: 15px;">
                            <strong style="color: var(--royal-blue); font-size: 1.1rem;">
                                {{ $reserva->sesion->pelicula->titulo }}
                            </strong>
                            <br>
                            <small style="color: #64748b;">🎥 {{ $reserva->sesion->hora_inicio }}</small>
                        </td>
                        <td style="padding: 15px;">
                            <span>Sala: {{ $reserva->sesion->sala->nombre }}</span>
                            <br>
                            <span style="background: #e0f2fe; color: #0369a1; padding: 2px 6px; border-radius: 4px; font-size: 0.8rem;">
                                Fila {{ $reserva->fila }} - Col {{ $reserva->columna }}
                            </span>
                        </td>

                        <td style="padding: 15px;">
                            {{-- Lógica para diferenciar reservas actuales de pasadas --}}
                            @if(\Carbon\Carbon::parse($reserva->sesion->hora_inicio)->isFuture())
                                <span style="background: #dcfce7; color: #166534; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold;">
                                    Confirmada
                                </span>
                            @else
                                <span style="background: #f1f5f9; color: #64748b; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold;">
                                    Finalizada
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection