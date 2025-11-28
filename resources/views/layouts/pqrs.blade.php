<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISP Connect - @yield('title')</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; color: #333; }
        .navbar { background-color: #003366; color: white; padding: 1rem; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: white; text-decoration: none; margin-left: 1rem; font-weight: bold; }
        .container { max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 2rem; }
        .form-group { margin-bottom: 1rem; }
        .form-label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        .form-control { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { display: inline-block; padding: 0.5rem 1rem; background-color: #003366; color: white; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; }
        .btn:hover { background-color: #002244; }
        .error { color: red; font-size: 0.875rem; margin-top: 0.25rem; }
        .alert { padding: 1rem; border-radius: 4px; margin-bottom: 1rem; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .footer { text-align: center; padding: 2rem; background-color: #eee; margin-top: 2rem; }
    </style>
    @livewireStyles
</head>
<body>

    <nav class="navbar">
        <div style="display: flex; align-items: center;">
            <span style="font-size: 1.5rem; font-weight: bold;">Intalnet</span>
        </div>
        <div>
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('pqrs.create') }}">Radicar PQRS</a>
            <a href="{{ route('pqrs.consult') }}">Consultar PQRS</a>
            <a href="/admin" style="background-color: rgba(255,255,255,0.1); padding: 0.5rem; border-radius: 4px;">Admin</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Intalnet. Todos los derechos reservados.</p>
    </footer>

    @livewireScripts
</body>
</html>
