@extends('layouts.app')

@section('title', 'Nueva Sesión')

@section('content')
    <div class="max-w-lg mx-auto bg-slate-800 p-6 rounded-lg shadow-xl">
        <h2 class="text-xl font-bold mb-6 text-yellow-500">Programar Nueva Sesión</h2>

        <form action="{{ url('/sesiones/guardar') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium mb-1">ID Película:</label>
                <input type="number" name="id_pelicula" class="w-full bg-slate-900 border border-slate-700 rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">ID Sala:</label>
                <input type="number" name="id_sala" class="w-full bg-slate-900 border border-slate-700 rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Fecha y Hora:</label>
                <input type="datetime-local" name="hora_inicio" class="w-full bg-slate-900 border border-slate-700 rounded p-2" required>
            </div>

            <div class="flex justify-end space-x-2 mt-6">
                <a href="{{ url('/sesiones') }}" class="bg-gray-600 px-4 py-2 rounded text-sm">Cancelar</a>
                
                <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm font-bold text-white">
                    Guardar Sesión
                </button>
            </div>
        </form>
    </div>
@endsection