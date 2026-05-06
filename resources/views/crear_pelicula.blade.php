<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Película</title>
</head>
<body>
    <h1>Añadir nueva película</h1>
    
    <!-- El formulario envía los datos por POST a la ruta que creamos -->
    <form action="/cartelera/guardar" method="POST">
        
        <!-- ¡SÚPER IMPORTANTE! Esto es un escudo de seguridad de Laravel. Si no pones @csrf, dará error -->
        @csrf
        
        <label>Título:</label><br>
        <input type="text" name="titulo" required><br><br>
        
        <label>Sinopsis:</label><br>
        <textarea name="sinopsis"></textarea><br><br>
        
        <label>Duración (en minutos):</label><br>
        <input type="number" name="duracion"><br><br>
        
        <label>Nombre del cartel (ejemplo: matrix.jpg):</label><br>
        <input type="text" name="foto_cartel"><br><br>
        
        <button type="submit">Guardar Película</button>
    </form>
</body>
</html>