@extends('layouts.app')

@section('title', 'Listado de Sesiones')

@section('content')
<div class="admin-contenedor">
    <div class="card admin-card">
        
        <div class="admin-cabecera">
            <h1>📅 Gestión de Sesiones</h1>
        </div>

        <div class="tabla-contenedor">
            <table class="tabla-cine">
                <thead>
                    <tr>
                        <th>Poster</th>
                        <th>ID</th>
                        <th>Película (ID)</th>
                        <th>Sala</th>
                        <th>Horario</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sesiones as $sesion)
                        @php
                            $foto_cartel = \Illuminate\Support\Facades\DB::table('peliculas')
                                ->where('id_pelicula', $sesion->id_pelicula)
                                ->value('foto_cartel');
                        @endphp
                        <tr>
                            <td>
                                <div class="poster-miniatura">
                                    @if($foto_cartel)
                                        <img src="{{ asset('carteles/' . $foto_cartel) }}" alt="Cartel">
                                    @else
                                        <div class="poster-placeholder">🎞️</div>
                                    @endif
                                </div>
                            </td>
                            <td class="texto-destacado-gris">#{{ $sesion->id_sesion }}</td>
                            <td class="texto-destacado-azul">{{ $sesion->id_pelicula }}</td>
                            <td><span class="etiqueta-sala">Sala {{ $sesion->id_sala }}</span></td>
                            <td>
                                <div class="fecha-hora">
                                    <span class="fecha">{{ \Carbon\Carbon::parse($sesion->hora_inicio)->format('d/m/Y') }}</span>
                                    <span class="hora">🕒 {{ \Carbon\Carbon::parse($sesion->hora_inicio)->format('H:i') }}</span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="tabla-vacia">
                                <div class="icono-vacio">🎞️</div>
                                No hay sesiones programadas en la base de datos.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
