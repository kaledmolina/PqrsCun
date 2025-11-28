<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISP Connect - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/pqrs.css', 'resources/js/app.js'])
    @filamentStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-900">
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="ISP Connect Logo" class="h-10 w-auto">
                    </a>
                    <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors">
                            Inicio
                        </a>
                        <a href="{{ route('pqrs.create') }}" class="{{ request()->routeIs('pqrs.create') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors">
                            Registrar PQRS
                        </a>
                        <a href="{{ route('pqrs.consult') }}" class="{{ request()->routeIs('pqrs.consult') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors">
                            Consultar PQRS
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="/admin" class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors">
                        Acceso Administrativo &rarr;
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-slate-300 border-t border-slate-800 mt-20">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                
                <!-- Normatividad -->
                <div>
                    <h4 class="text-white text-lg font-bold mb-6 border-b border-slate-700 pb-2">Normatividad</h4>
                    <div class="space-y-4">
                        <div>
                            <h5 class="text-blue-400 font-medium mb-2">Regulación servicio de TV</h5>
                            <ul class="space-y-2 text-sm">
                                <li><a href="#" class="hover:text-white transition-colors">Acuerdo 001 CNTV</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Acuerdo 10 CNTV</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Acuerdo 10 Anexo CNTV</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Protección al Usuario -->
                <div>
                    <h4 class="text-white text-lg font-bold mb-6 border-b border-slate-700 pb-2">Protección al Usuario</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Políticas de servicio</a></li>
                        <li><a href="https://www.sic.gov.co" target="_blank" class="hover:text-white transition-colors">Circular única - SIC PQR</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Acuerdo 11 CNTV</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Resolución CRC 3066</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Resolución CRC 3067</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Resolución CRC 4625</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Manejo de Quejas y Reclamos</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Política de tratamiento de datos</a></li>
                    </ul>
                </div>

                <!-- Información de Interés -->
                <div>
                    <h4 class="text-white text-lg font-bold mb-6 border-b border-slate-700 pb-2">Información de Interés</h4>
                    <div class="space-y-4">
                        <div>
                            <h5 class="text-blue-400 font-medium mb-2">Protección infantil</h5>
                            <ul class="space-y-2 text-sm">
                                <li><a href="#" class="hover:text-white transition-colors">Decreto 1524 de 2002</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Ley 679 de 2001</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Ley 1098 de 2006</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Ley 1336 de 2009</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="text-blue-400 font-medium mb-2">Dignidad infantil</h5>
                            <ul class="space-y-2 text-sm">
                                <li><a href="https://www.teprotejo.org" target="_blank" class="hover:text-white transition-colors">www.teprotejo.org</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">En TIC Confío</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contratos -->
                <div>
                    <h4 class="text-white text-lg font-bold mb-6 border-b border-slate-700 pb-2">Contratos de Servicios</h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-white transition-colors">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Contrato TV
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-white transition-colors">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Contrato Internet
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-white transition-colors">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Anexo Cláusula de Permanencia
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-500 text-sm">
                    Intalnet &copy; {{ date('Y') }}. Todos los derechos reservados.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @filamentScripts
    @vite('resources/js/app.js')
</body>
</html>
