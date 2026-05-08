<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Premium</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
<header>
    <div class="logo">
        <h2 style="color: white; margin: 0;">CINE <span style="color:var(--quicksand)">TW</span></h2>
    </div>

    <nav class="nav-top">
        {{-- Enlaces comunes para todos los usuarios --}}
        <a href="{{ url('/sesiones') }}">📅 Sesiones</a>
        <a href="{{ url('/cartelera') }}">🎬 Cartelera</a>

        {{-- Lógica de Administración: Solo se muestra si el usuario es Admin --}}
        @auth
            @if(Auth::user()->role === 'admin') {{-- Ajusta 'role' según tu base de datos --}}
                <a href="{{ url('/peliculas/crear') }}" class="btn-admin-header">➕ Nueva Película</a>
                <a href="{{ url('/sesiones/crear') }}" class="btn-admin-header">➕ Nueva Sesión</a>
            @endif
        @endauth

        {{-- Información del Usuario --}}
        <div class="user-info" style="margin-left: 20px; display: inline-block;">
            @auth
                <span style="color: white; font-weight: normal;">Hola, </span>
                <span style="color: var(--quicksand); font-weight: bold;">{{ Auth::user()->name }}</span>
                <a href="{{ url('/logout') }}" style="font-size: 0.8rem; color: #ff9f9f; margin-left: 10px;">(Salir)</a>
            @else
                <a href="{{ url('/login') }}">Iniciar Sesión</a>
            @endauth
        </div>
    </nav>
</header>

    <div class="wrapper">
        <aside class="sidebar">
            <a href="{{ url('/') }}">🏠 Inicio</a>
            <a href="#">🎬 Estrenos</a>
            <a href="#">🎟️ Mis Reservas</a>
            <a href="#">👤 Perfil</a>
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