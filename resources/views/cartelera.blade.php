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
            
            <!-- NUEVO: Envolvemos el título y la imagen en un enlace ('a href') -->
            <a href="/pelicula/{{ $pelicula->id_pelicula }}" style="text-decoration: none; color: black;">
                <h3>{{ $pelicula->titulo }}</h3>
                <img src="{{ asset('carteles/' . $pelicula->foto_cartel) }}" width="150" alt="Cartel">
            </a>
            
            <p><strong>Horarios disponibles:</strong></p>
            <ul>
                @foreach($pelicula->sesiones as $sesion)
                    <li>{{ $sesion->hora_inicio }}</li>
                @endforeach
            </ul>

        </div>
        <hr>
    @endforeach

</body>
</html>