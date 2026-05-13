@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 40px auto;">
    <div style="border-bottom: 2px solid var(--quicksand); margin-bottom: 30px; padding-bottom: 10px; text-align: center;">
        <h1 style="color: var(--royal-blue); margin: 0;">👤 Mi Perfil</h1>
        <p style="color: var(--sapphire); margin: 5px 0 0 0;">Gestiona tus datos personales y cuenta.</p>
    </div>

    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 1px solid #f1f5f9;">
        
        <div style="background: var(--royal-blue); padding: 40px 20px; text-align: center;">
            <h2 style="color: white; margin-top: 15px; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px;">{{ $usuario->username }}</h2>
        </div>

        <div style="padding: 30px;">
            <div style="margin-bottom: 25px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 5px;">Identificación Oficial (DNI)</label>
                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; color: var(--royal-blue); font-weight: 600; border: 1px solid #e2e8f0;">
                    {{ $usuario->dni }}
                </div>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 5px;">Correo Electrónico</label>
                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; color: var(--royal-blue); font-weight: 600; border: 1px solid #e2e8f0;">
                    {{ $usuario->email }}
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 5px;">Nombre de Usuario</label>
                <div style="background: #f8fafc; padding: 12px; border-radius: 8px; color: var(--royal-blue); font-weight: 600; border: 1px solid #e2e8f0;">
                    {{ $usuario->username }}
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 12px;">
                <a href="{{ url('/cartelera') }}" 
                   style="display: block; background: var(--quicksand); color: var(--royal-blue); text-align: center; padding: 12px; border-radius: 8px; font-weight: bold; text-decoration: none; transition: 0.3s; border: none;">
                    🚀 VOLVER A LA CARTELERA
                </a>
                
                <a href="{{ url('/logout-manual') }}" 
                   style="display: block; text-align: center; padding: 10px; color: #ef4444; font-size: 0.85rem; font-weight: bold; text-decoration: none; border: 1px solid #fee2e2; border-radius: 8px; transition: 0.3s;">
                    CERRAR SESIÓN
                </a>
            </div>
        </div>
    </div>
</div>
@endsection