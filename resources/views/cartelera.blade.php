<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cartelera de Cine</title>
</head>
<body>
    <h1>Nuestra Cartelera</h1>
    
@foreach($peliculas as $pelicula)
        <div style="margin-bottom: 20px;">
            <h3>{{ $pelicula->titulo }}</h3>
            
            <!-- Aquí usamos la función asset() de Laravel para buscar en la carpeta public -->
            <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" width="150" alt="Cartel">
            
            <p><strong>Duración:</strong> {{ $pelicula->duracion }} minutos</p>
            <p><strong>Sinopsis:</strong> {{ $pelicula->sinopsis }}</p>
        </div>
        <hr>
    @endforeach

</body>
</html>