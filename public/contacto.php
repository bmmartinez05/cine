<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Desarrollador Cine TW</title>
    <style>
        :root {
            --royal-blue: #002366; 
            --quicksand: #bd9b60; 
            --sapphire: #0047ab;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-top: 5px solid var(--royal-blue);
            text-align: center;
            max-width: 400px;
        }
        h1 { color: var(--royal-blue); margin-bottom: 20px; }
        p { color: #555; line-height: 1.6; }
        .highlight { color: var(--sapphire); font-weight: bold; }
        .btn-volver {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background: var(--quicksand);
            color: var(--royal-blue);
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>👨‍💻 Equipo de Desarrollo</h1>
        
        <div class="dev-container">
            <span class="dev-name">Beatriz Martín</span>
            <a href="mailto:bmmartinez@correo.ugr.es" class="dev-email">bmmartinez@correo.ugr.es</a>
        </div>

        <div class="dev-container">
            <span class="dev-name">Francisco Ferro</span>
            <a href="mailto:franferro@correo.ugr.es" class="dev-email">franferro@correo.ugr.es</a>
        </div>

        <div class="dev-container">
            <span class="dev-name">Ana Isabel Pérez</span>
            <a href="mailto:anaiperezmartinez@correo.ugr.es" class="dev-email">anaiperezmartinez@correo.ugr.es</a>
        </div>
        
        <a href="/inicio" class="btn-volver">Volver al Cine</a>
    </div>
</body>
</html>