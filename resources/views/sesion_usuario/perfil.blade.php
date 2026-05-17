@extends('layouts.app')

@section('content')
<div class="perfil-contenedor card">
    
    {{-- Encabezado --}}
    <div class="perfil-encabezado">
        <h1>👤 Mi Perfil</h1>
        <p>Gestiona tus datos personales y cuenta.</p>
    </div>

    {{-- Tarjeta de Perfil --}}
    <div class="perfil-tarjeta">
        
        <div class="perfil-avatar-fondo">
            <h2>{{ $usuario->username }}</h2>
        </div>

        <div class="perfil-cuerpo">
            <div class="perfil-dato-grupo">
                <label>Identificación Oficial (DNI)</label>
                <div class="perfil-dato-valor">
                    {{ $usuario->dni }}
                </div>
            </div>

            <div class="perfil-dato-grupo">
                <label>Correo Electrónico</label>
                <div class="perfil-dato-valor">
                    {{ $usuario->email }}
                </div>
            </div>

            <div class="perfil-dato-grupo">
                <label>Nombre de Usuario</label>
                <div class="perfil-dato-valor">
                    {{ $usuario->username }}
                </div>
            </div>

            <div class="perfil-acciones">
                <a href="{{ url('/cartelera') }}" class="btn-perfil-primario">
                    🚀 Volver a la Cartelera
                </a>
                
                <a href="{{ url('/logout-manual') }}" class="btn-perfil-peligro">
                    Cerrar Sesión
                </a>
            </div>
        </div>
        
    </div>
</div>
@endsection