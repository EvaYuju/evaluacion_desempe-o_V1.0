<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Centros')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!--<a class="navbar-brand" href="{{ url('/') }}">Inicio</a>-->
            <a class="navbar-brand" href="{{ route('centers.index') }}">Centros</a>
            <a class="navbar-brand" href="{{ route('users.index') }}">Usuarios</a>
            <a class="navbar-brand" href="{{ route('surveys.index') }}">Encuestas</a>
            <a class="navbar-brand" href="{{ route('questions.index') }}">Preguntas</a>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>