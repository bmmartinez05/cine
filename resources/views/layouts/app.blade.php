<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Cine')</title>
    
    {{-- El CSS y Scripts globales van aquí --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="p-4 bg-white shadow">
        <a href="{{ url('/cartelera') }}">Cartelera</a> | 
        <a href="{{ url('/sesiones') }}">Sesiones</a>
    </nav>

    <main class="p-8">
        {{-- Aquí se inyecta el cuadro en el marco --}}
        @yield('content')
    </main>
    
    <footer class="text-center p-4 text-gray-500">
        <p>Cine Trigger warning - 2026</p>
    </footer>
</body>
</html>