<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intalnet - @yield('title', 'PQRS')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta property="og:site_name" content="Intalnet PQRS" />
    <meta property="og:title" content="Centro de Atención al Usuario - Intalnet" />
    <meta property="og:description" content="Gestiona tus trámites de telecomunicaciones, radica peticiones, quejas y reclamos, y consulta el estado de tus solicitudes en línea." />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2b5f94ff',
                        secondary: '#00aaff',
                        accent: '#f59e0b',
                        'surface-50': '#f8fafc',
                        'surface-100': '#f1f5f9',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'bounce-slow': 'bounce 3s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9; 
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; 
        }
        
        /* Glassmorphism Utilities */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
    @livewireStyles
</head>
<body class="bg-surface-50 text-slate-800 font-sans antialiased selection:bg-primary selection:text-white flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav x-data="{ mobileMenuOpen: false, showNavbar: true, lastScrollY: window.scrollY }" 
         @scroll.window="showNavbar = (window.scrollY < lastScrollY) || (window.scrollY < 20); lastScrollY = window.scrollY"
         :class="{ '-translate-y-full': !showNavbar }"
         class="fixed top-0 w-full z-50 transition-transform duration-300 p-4">
        <div class="max-w-7xl mx-auto bg-slate-900/40 backdrop-blur-3xl border border-white/10 rounded-2xl shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] ring-1 ring-white/10 px-6 relative">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-4 group cursor-pointer">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-secondary to-primary rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-500"></div>
                        <img src="{{ asset('images/logo.png') }}" alt="Intalnet Logo" class="h-16 w-auto relative transform group-hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-slate-300 hover:text-white font-medium transition-colors relative group py-2 text-sm">
                        Inicio
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-secondary to-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('pqrs.create') }}" class="text-slate-300 hover:text-white font-medium transition-colors relative group py-2 text-sm">
                        Radicar PQRS
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-secondary to-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <a href="{{ route('pqrs.consult') }}" class="px-5 py-2 rounded-full bg-gradient-to-r from-primary to-slate-900 text-white text-sm font-semibold hover:shadow-lg hover:shadow-primary/50 hover:scale-105 transition-all duration-300 border border-white/10 backdrop-blur-sm flex items-center gap-2 group">
                        <span>Consultar</span>
                        <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-300 hover:text-white focus:outline-none p-2 rounded-lg hover:bg-white/10 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 x-cloak
                 class="md:hidden absolute top-full left-0 w-full mt-2 bg-slate-900/90 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden shadow-2xl z-50">
                <div class="px-4 pt-2 pb-6 space-y-2">
                    <a href="{{ route('home') }}" class="block px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 rounded-xl transition-colors font-medium">Inicio</a>
                    <a href="{{ route('pqrs.create') }}" class="block px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 rounded-xl transition-colors font-medium">Radicar PQRS</a>

                    <a href="{{ route('pqrs.consult') }}" class="block px-4 py-3 text-primary hover:text-white hover:bg-primary/20 rounded-xl transition-colors font-bold">Consultar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Animated Background Decor -->
    <div class="fixed inset-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <!-- Blobs -->
        <div class="absolute top-[-10%] left-[-10%] w-[60%] h-[60%] bg-gradient-to-br from-secondary/30 to-primary/30 rounded-full blur-[130px] animate-bounce-slow mix-blend-multiply"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[60%] h-[60%] bg-gradient-to-tl from-primary/30 to-accent/20 rounded-full blur-[130px] animate-bounce-slow mix-blend-multiply" style="animation-delay: 2s;"></div>
        <div class="absolute top-[30%] left-[30%] w-[40%] h-[40%] bg-secondary/20 rounded-full blur-[110px] animate-pulse mix-blend-multiply" style="animation-duration: 5s;"></div>
        
        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMCwgMCwgMCwgMC4wMykiLz48L3N2Zz4=')] opacity-40"></div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow pt-32 pb-12 px-4 sm:px-6 lg:px-8 relative min-h-screen">
        <div class="max-w-7xl mx-auto relative z-10">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white/80 backdrop-blur-md border-t border-slate-200 pt-16 pb-8 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-secondary to-primary"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ asset('images/logo.png') }}" alt="Intalnet Logo" class="h-10 w-auto grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        Conectando personas, empresas y comunidades con la mejor tecnología de fibra óptica. Comprometidos con la calidad y el servicio.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-primary hover:text-white transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-primary hover:text-white transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.072 3.252.148 4.771 1.691 4.919 4.919.06 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Vigilancia -->
                <div class="col-span-1">
                    <h4 class="font-bold text-slate-900 mb-6 text-lg">Entidades de Vigilancia</h4>
                    <div class="flex flex-col gap-3">
                        <a href="https://www.sic.gov.co" target="_blank" class="group flex items-center gap-3 p-3 rounded-xl bg-slate-50 hover:bg-white hover:shadow-md transition-all border border-slate-100">
                            <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center text-xl shadow-sm group-hover:scale-110 transition-transform">🏛️</div>
                            <div>
                                <p class="font-bold text-slate-700 text-xs uppercase">SIC</p>
                                <p class="text-[10px] text-slate-500">Superintendencia de Industria y Comercio</p>
                            </div>
                        </a>
                        <a href="https://www.mintic.gov.co" target="_blank" class="group flex items-center gap-3 p-3 rounded-xl bg-slate-50 hover:bg-white hover:shadow-md transition-all border border-slate-100">
                            <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center text-xl shadow-sm group-hover:scale-110 transition-transform">📡</div>
                            <div>
                                <p class="font-bold text-slate-700 text-xs uppercase">MinTIC</p>
                                <p class="text-[10px] text-slate-500">Ministerio de Tecnologías</p>
                            </div>
                        </a>
                        <a href="https://www.crcom.gov.co" target="_blank" class="group flex items-center gap-3 p-3 rounded-xl bg-slate-50 hover:bg-white hover:shadow-md transition-all border border-slate-100">
                            <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center text-xl shadow-sm group-hover:scale-110 transition-transform">📊</div>
                            <div>
                                <p class="font-bold text-slate-700 text-xs uppercase">CRC</p>
                                <p class="text-[10px] text-slate-500">Comisión de Regulación</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Normatividad & Protección -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-6 text-lg">Marco Legal</h4>
                    <ul class="space-y-3 text-sm text-slate-600">
                        <li><a href="https://gestornormativo.creg.gov.co/gestor/entorno/docs/resolucion_crc_5050_2016.htm" target="_blank" class="hover:text-primary transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 bg-secondary rounded-full"></span>Resolución CRC 5050 de 2016</a></li>
                        <li><a href="https://colombiatic.mintic.gov.co/679/articles-62266_doc_norma.pdf" target="_blank" class="hover:text-primary transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 bg-secondary rounded-full"></span>Resolución CRC 5111 de 2017</a></li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-6 text-lg">Contacto</h4>
                    <ul class="space-y-4 text-sm text-slate-600">
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0 text-primary">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">Línea Nacional</p>
                                <p>3148042601</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0 text-primary">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">Correo Electrónico</p>
                                <p>servicioalcliente@intalnet.com</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-400 text-sm font-medium">&copy; {{ date('Y') }} Intalnet. Todos los derechos reservados.</p>
                <div class="flex gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">Sistemas Operativos</span>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
