<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Butacas</title>
</head>
<body>
    
    <h1>Selecciona tus butacas</h1>
    
    <p>Estás comprando entradas para la sesión del: <strong>{{ $sesion->hora_inicio }}</strong></p>
    
    <div style="border: 2px solid black; padding: 20px; width: 300px; text-align: center; margin-top: 20px;">
        <h3>PANTALLA</h3>
        <hr>
        <p>💺 💺 💺 💺</p>
        <p>💺 💺 💺 💺</p>
        <p>💺 💺 💺 💺</p>
        <p><em>(Aquí montaremos el sistema de asientos en el siguiente paso)</em></p>
    </div>

    <br><br>
    <!-- Botón para volver atrás por si el usuario se arrepiente -->
    <a href="/pelicula/{{ $sesion->id_pelicula }}">⬅ Volver a la película</a>

</body>
</html>