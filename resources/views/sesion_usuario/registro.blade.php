@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-slate-800 p-8 rounded-lg shadow-2xl border border-slate-700">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-500">Nueva Cuenta</h2>

    <form action="{{ url('/registro') }}" method="POST" class="space-y-4">
        @csrf
        
        {{-- Campo DNI --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">DNI:</label>
            <input type="text" name="dni" maxlength="9" placeholder="12345678Z" class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-blue-500 outline-none" required>
        </div>

        {{-- Campo USERNAME --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Nombre de Usuario:</label>
            <input type="text" name="username" maxlength="10" placeholder="Máx. 10 caracteres" class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-blue-500 outline-none" required>
        </div>

        {{-- Campo EMAIL --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Correo Electrónico:</label>
            <input type="email" name="email" class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-blue-500 outline-none" required>
        </div>

        {{-- Campo PASSWORD --}}
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Contraseña:</label>
            <input type="password" name="password" maxlength="25" class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-blue-500 outline-none" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded transition shadow-lg mt-4">
            Registrarse y Entrar
        </button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ url('/login') }}" class="text-gray-400 text-xs hover:underline">
            Volver al inicio de sesión
        </a>
    </div>
</div>
@endsection