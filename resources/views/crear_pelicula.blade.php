@extends('layouts.app')

@section('title', 'Añadir Nueva Película')

@section('content')
<div class="card" style="max-width: 700px; margin: 40px auto;">
    {{-- Encabezado Estilo TW --}}
    <div style="border-bottom: 2px solid var(--quicksand); margin-bottom: 30px; padding-bottom: 10px; text-align: center;">
        <h1 style="color: var(--royal-blue); margin: 0; text-transform: uppercase; letter-spacing: 1px;">🎥 Panel de Control</h1>
        <p style="color: var(--sapphire); margin: 5px 0 0 0; font-weight: bold;">Añadir nueva pieza a la cartelera</p>
    </div>

    {{-- Formulario dentro de tarjeta blanca --}}
    <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 1px solid #f1f5f9; padding: 40px;">
        
        <form action="/cartelera/guardar" method="POST">
            @csrf
            
            <div style="margin-bottom: 25px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 8px;">Título de la Obra</label>
                <input type="text" name="titulo" required placeholder="Ej: Pulp Fiction"
                    style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; color: var(--royal-blue); font-weight: 600; outline: none; focus: border-color: var(--royal-blue);">
            </div>
            
            <div style="margin-bottom: 25px;">
                <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 8px;">Sinopsis / Argumento</label>
                <textarea name="sinopsis" rows="4" placeholder="Escribe aquí de qué trata la película..."
                    style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; color: var(--royal-blue); outline: none; font-family: inherit; resize: none;"></textarea>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 8px;">Duración (min)</label>
                    <input type="number" name="duracion" placeholder="120"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; color: var(--royal-blue); font-weight: 600;">
                </div>
                
                <div>
                    <label style="color: var(--sapphire); font-size: 0.75rem; font-weight: bold; text-transform: uppercase; display: block; margin-bottom: 8px;">Archivo Cartel</label>
                    <input type="text" name="foto_cartel" placeholder="ej: matrix.jpg"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; color: var(--royal-blue); font-weight: 600;">
                    <small style="color: #94a3b8; font-size: 0.7rem;">Debe estar en /public/carteles/</small>
                </div>
            </div>
            
            {{-- Botonera final --}}
            <div style="display: flex; flex-direction: column; gap: 15px; margin-top: 40px;">
                <button type="submit"
    style="background: var(--royal-blue); color: white; padding: 14px; border: none; border-radius: 8px;">
    💾 GUARDAR EN BASE DE DATOS
</button>
                
               <a href="/cartelera"
    style="text-align: center; color: var(--royal-blue); font-size: 0.85rem; font-weight: bold;">
    ❌ CANCELAR Y VOLVER
</a>
            </div>
        </form>
    </div>
</div>
@endsection