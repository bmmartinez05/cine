<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Premium</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v={{ time() }}">
</head>
<body>
<header>
    <div class="logo">
        <h2 style="color: white; margin: 0;">CINE <span style="color:var(--quicksand)">TW</span></h2>
    </div>

    <nav class="nav-top">
        <div class="user-info" style="margin-left: 20px; display: inline-block;">
            
            {{-- Comprobamos si hay sesión iniciada manualmente --}}
            @if(Session::has('usuario_dni'))
                <span style="color: white; font-weight: normal;">Hola, </span>
                <span style="color: var(--quicksand); font-weight: bold; margin-right: 8px;">{{ Session::get('usuario_nombre') }}</span>
                
                {{-- Círculo azul con la inicial del usuario (Hecho con CSS normal, sin Tailwind) --}}
                <span style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; background-color: #2563eb; color: white; border-radius: 50%; font-weight: bold; font-size: 14px; vertical-align: middle; margin-right: 8px;">
                    {{ substr(Session::get('usuario_nombre'), 0, 1) }}
                </span>

                <a href="{{ url('/logout-manual') }}" style="font-size: 0.85rem; color: #ff9f9f; text-decoration: underline;">Salir</a>
            
            {{-- Si NO hay sesión, mostramos Iniciar Sesión --}}
            @else
                <a href="{{ url('/login') }}">Iniciar Sesión</a>
            @endif
            
        </div>
    </nav>
</header>

    <div class="wrapper">
        <aside class="sidebar">
            <a href="{{ url('/inicio') }}">🏠 Inicio</a>
            <a href="{{ url('/sesiones') }}">📅 Sesiones</a>
            <a href="{{ url('/cartelera') }}">🎬 Cartelera</a>
            <a href="{{ url('/estrenos') }}">❗ Estrenos</a>
            <a href="{{ url('/reservas') }}">🎟️ Mis Reservas</a>
            <a href="{{ url('/perfil') }}">👤 Perfil</a>
            @if(Session::get('usuario_dni') === '12345678Z')
            <a href="{{ url('/cartelera/crear') }}" class="btn-admin-header">➕ Nueva Película</a>
            <a href="{{ url('/sesiones/crear') }}" class="btn-admin-header">➕ Nueva Sesión</a>
            @endif
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <p>Cine Trigger Warning &copy; 2026</p>
        <a href="contacto.php">Contacto</a> | 
        <a href="como_se_hizo.pdf">Informe PDF</a>
    </footer>

    <script>
        function seleccionarButaca(elemento) {
            document.querySelectorAll('.btn-butaca').forEach(b => b.classList.remove('btn-seleccionada'));
            elemento.classList.add('btn-seleccionada');
            alert("Has seleccionado la butaca " + elemento.innerText);
        }
    </script>
</body>
</html>