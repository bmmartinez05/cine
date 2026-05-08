@extends('layouts.app')

@section('title', 'Añadir Nueva Película')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Añadir nueva película</h1>
    
    <form action="/cartelera/guardar" method="POST">
        
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Título:</label>
            <input type="text" name="titulo" required 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Sinopsis:</label>
            <textarea name="sinopsis" rows="4"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Duración (minutos):</label>
                <input type="number" name="duracion"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nombre del cartel:</label>
                <input type="text" name="foto_cartel" placeholder="ejemplo: matrix.jpg"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="mt-6 flex items-center justify-between">
            <button type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-200 cursor-pointer">
                Guardar Película
            </button>
            
            <a href="/cartelera" class="text-sm text-gray-600 hover:text-blue-500 underline">
                Cancelar y volver
            </a>
        </div>
    </form>
</div>
@endsection