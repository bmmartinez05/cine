@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-slate-800 p-8 rounded-lg shadow-2xl border border-slate-700">
    <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500">Acceso Clientes</h2>

    {{-- Si hay errores en el controlador, los mostramos aquí --}}
    @if($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-4 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Correo Electrónico:</label>
            <input type="email" name="email" class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-yellow-500 outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Contraseña:</label>
            <input type="password" name="password" class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-yellow-500 outline-none" required>
        </div>

        <button type="submit" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 rounded transition shadow-lg">
            Entrar
        </button>
    </form>

    <div class="mt-6 pt-6 border-t border-slate-700 text-center">
        <p class="text-gray-400 text-sm mb-2">¿Aún no tienes cuenta?</p>
        <a href="{{ url('/registro') }}" class="text-yellow-500 hover:text-yellow-400 font-bold underline">
            Crear una cuenta nueva
        </a>
    </div>
</div>
@endsection