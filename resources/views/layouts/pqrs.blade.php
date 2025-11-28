<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ISP Connect - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50">

    {{-- Navbar --}}
    <x-nav sticky full-width class="bg-slate-900 text-slate-100 shadow-lg">
        <x-slot:brand>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold">
                <img src="{{ asset('images/logo.png') }}" alt="ISP Connect Logo" class="h-8 w-auto" />
                <span>Intalnet</span>
            </a>
        </x-slot:brand>

        <x-slot:actions>
            <div class="hidden lg:flex gap-6 mr-6">
                <a href="{{ route('home') }}" class="hover:text-primary transition {{ request()->routeIs('home') ? 'text-primary font-bold' : '' }}">Inicio</a>
                <a href="{{ route('pqrs.create') }}" class="hover:text-primary transition {{ request()->routeIs('pqrs.create') ? 'text-primary font-bold' : '' }}">Registrar PQRS</a>
                <a href="{{ route('pqrs.consult') }}" class="hover:text-primary transition {{ request()->routeIs('pqrs.consult') ? 'text-primary font-bold' : '' }}">Consultar PQRS</a>
            </div>
            <x-button label="Acceso Administrativo" link="/admin" icon="o-user" class="btn-primary btn-sm" responsive />
        </x-slot:actions>
    </x-nav>

    {{-- Main Content --}}
    <x-main full-width>
        <x-slot:content>
            @yield('content')
        </x-slot:content>
    </x-main>

    {{-- Footer --}}
    <footer class="footer p-10 bg-neutral text-neutral-content mt-10">
        <nav>
            <header class="footer-title">Normatividad</header> 
            <a class="link link-hover">Acuerdo 001 CNTV</a>
            <a class="link link-hover">Acuerdo 10 CNTV</a>
            <a class="link link-hover">Acuerdo 10 Anexo CNTV</a>
        </nav> 
        <nav>
            <header class="footer-title">Protección al Usuario</header> 
            <a class="link link-hover">Políticas de servicio</a>
            <a class="link link-hover">Circular única - SIC PQR</a>
            <a class="link link-hover">Manejo de Quejas y Reclamos</a>
            <a class="link link-hover">Política de tratamiento de datos</a>
        </nav> 
        <nav>
            <header class="footer-title">Información de Interés</header> 
            <a class="link link-hover">Decreto 1524 de 2002</a>
            <a class="link link-hover">Ley 679 de 2001</a>
            <a class="link link-hover">www.teprotejo.org</a>
            <a class="link link-hover">En TIC Confío</a>
        </nav>
        <nav>
            <header class="footer-title">Contratos</header> 
            <a class="link link-hover">Contrato TV</a>
            <a class="link link-hover">Contrato Internet</a>
            <a class="link link-hover">Anexo Cláusula de Permanencia</a>
        </nav>
    </footer>
    <footer class="footer px-10 py-4 border-t bg-neutral text-neutral-content border-base-300">
        <aside class="items-center grid-flow-col">
            <p>Intalnet © {{ date('Y') }}. Todos los derechos reservados.</p>
        </aside> 
        <nav class="md:place-self-center md:justify-self-end">
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
            </div>
        </nav>
    </footer>

    {{-- Toast --}}
    <x-toast />
</body>
</html>
