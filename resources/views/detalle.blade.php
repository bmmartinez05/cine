<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $pelicula->titulo }} - Detalles</title>
</head>
<body>
    
    <h1>{{ $pelicula->titulo }}</h1>
    
    <!-- Aquí la foto puede ser más grande, por ejemplo width="300" -->
    <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" width="300" alt="Cartel">
    
    <!-- AQUÍ SÍ PONEMOS LOS DETALLES -->
    <p><strong>Duración:</strong> {{ $pelicula->duracion }} minutos</p>
    <p><strong>Sinopsis:</strong> {{ $pelicula->sinopsis }}</p>
    
    <p><strong>Horarios:</strong></p>
    <ul>
        @foreach($pelicula->sesiones as $sesion)
            <!-- Dejo el botón de Comprar preparado para tu siguiente paso del proyecto -->
            <li>{{ $sesion->hora_inicio }} <button>Comprar entradas</button></li>
        @endforeach
    </ul>

    <br><br>
    <a href="/cartelera">⬅ Volver a la cartelera</a>

</body>
</html>