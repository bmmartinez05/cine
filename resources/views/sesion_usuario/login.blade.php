@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="auth-contenedor">
    <div class="card auth-card">
        <div class="auth-cabecera">
            <h2>🔐 Acceso Clientes</h2>
            <p>Introduce tus credenciales para continuar</p>
        </div>

        @if($errors->any() || session('error'))
            <div class="alerta-error">
                {{ session('error') ?? $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="auth-formulario">
            @csrf
            
            <div class="form-grupo">
                <label>Correo Electrónico</label>
                <input type="email" name="email" required placeholder="tuemail@ejemplo.com" class="form-input">
            </div>

            <div class="form-grupo">
                <label>Contraseña</label>
                <input type="password" name="password" required placeholder="••••••••" class="form-input">
            </div>

            <button type="submit" class="btn-principal">Entrar al Cine</button>
        </form>

        <div class="auth-pie">
            <p>¿Aún no tienes cuenta?</p>
            <a href="{{ url('/registro') }}">Crear una cuenta nueva</a>
        </div>
    </div>
</div>
@endsection