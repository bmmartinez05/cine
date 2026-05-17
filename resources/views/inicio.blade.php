@extends('layouts.app')
@section('content')
<div class="inicio-contenedor">
    
    {{-- Cabecera --}}
    <div class="inicio-hero">
        <img src="{{ asset('carteles/logo.png') }}" alt="Logo Cine" class="logo-principal"> 
        <h1>BIENVENIDO A <span class="texto-corporativo">TRIGGER WARNING</span></h1>
    </div>

    {{-- Sobre Nosotros --}}
    <div class="card seccion-nosotros">
        <h2>Sobre Nosotros</h2>
        <p>En <strong>Trigger Warning Cine</strong>, nos alejamos de lo convencional. Nuestra sala está diseñada para ofrecer una inmersión total con tecnología de última generación y una selección de películas que desafían los límites del espectador.</p>
        <p>Desde clásicos de culto hasta los estrenos más crudos del cine independiente, cada sesión es un evento único.</p>
    </div>

    {{-- Servicios --}}
    <div class="inicio-servicios">
        <div class="card servicio-item">
            <h3>Sonido Atmos</h3>
            <p>360 grados de audio para que sientas cada susurro y cada explosión.</p>
        </div>
        <div class="card servicio-item">
            <h3>Bar Premium</h3>
            <p><strong>Trigger Warning Cine</strong> tenemos Palomitas gourmet y coctelería de autor disponible en tu butaca.</p>
        </div>
        <div class="card servicio-item">
            <h3>Butacas VIP</h3>
            <p>Máximo confort con asientos reclinables de piel en todas nuestras salas.</p>
        </div>
    </div>

</div>
@endsection