@extends('layouts.app')

@section('title', 'Listado de Sesiones')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Listado de Sesiones</h1>
        
        {{-- Botón que redirige a la vista de crear --}}
        <a href="{{ url('/sesiones/crear') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Nueva Sesión
        </a>
    </div>
    
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-slate-700 text-yellow-500">
                <th class="p-2 border border-slate-600">ID</th>
                <th class="p-2 border border-slate-600">Película</th>
                <th class="p-2 border border-slate-600">Sala</th>
                <th class="p-2 border border-slate-600">Horario</th>
            </tr>
        </thead>
        <tbody>
       @forelse ($sesiones as $sesion)
                <tr class="text-center border-b border-slate-700">
                    <td class="p-2">{{ $sesion->id_sesion }}</td>
                    <td class="p-2">{{ $sesion->id_pelicula }}</td>
                    <td class="p-2">{{ $sesion->id_sala }}</td>
                    <td class="p-2">{{ $sesion->hora_inicio }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 italic">No hay sesiones disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection