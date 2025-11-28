@extends('layouts.pqrs')

@section('title', 'Inicio')

@section('content')
<!-- Fondo General con Gradiente Moderno -->
<div class="min-h-screen bg-slate-900 overflow-x-hidden relative">
    
    <!-- Elementos decorativos de fondo (Blobs) -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-primary/30 rounded-full blur-[100px] opacity-50 mix-blend-screen animate-pulse"></div>
        <div class="absolute bottom-[10%] right-[-5%] w-[500px] h-[500px] bg-secondary/20 rounded-full blur-[120px] opacity-40 mix-blend-screen"></div>
    </div>

    <!-- HERO SECTION -->
    <div class="relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16 lg:pt-32 lg:pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Columna Izquierda: Texto -->
                <div class="text-center lg:text-left animate-fade-in-up">
                    <div class="inline-flex items-center px-3 py-1 rounded-full border border-secondary/30 bg-secondary/10 text-secondary text-sm font-medium mb-6 backdrop-blur-sm">
                        <span class="flex h-2 w-2 rounded-full bg-secondary mr-2 animate-ping"></span>
                        Estamos en línea para ayudarte
                    </div>
                    
                    <h1 class="text-5xl tracking-tight font-extrabold text-white sm:text-6xl xl:text-7xl mb-6 leading-tight">
                        Centro de <br class="hidden lg:block" />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">
                            Atención al Usuario
                        </span>
                    </h1>
                    
                    <p class="mt-4 text-lg text-slate-300 sm:mt-5 sm:max-w-xl sm:mx-auto md:mt-5 lg:mx-0 leading-relaxed">
                        Gestiona tus trámites de telecomunicaciones de forma ágil. Radica peticiones, quejas y reclamos con la seguridad y respaldo de <span class="text-white font-semibold">Intalnet</span>.
                    </p>

                    <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('pqrs.create') }}" class="group relative flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-2xl hover:scale-105 hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-slate-900">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Radicar PQRS
                        </a>
                        
                        <a href="{{ route('pqrs.consult') }}" class="group flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-white/5 border border-white/10 rounded-2xl hover:bg-white/10 hover:border-white/20 hover:scale-105 backdrop-blur-md">
                            <svg class="w-6 h-6 mr-2 group-hover:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            Consultar Estado
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Imagen Ilustrativa (Nueva) -->
                <div class="hidden lg:block relative animate-fade-in transition-transform duration-500 hover:scale-[1.02]">
                    <!-- Efecto de resplandor detrás de la imagen -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full blur-[80px] opacity-20 transform translate-x-10 translate-y-10"></div>
                    
                    <!-- IMAGEN PRINCIPAL: Puedes reemplazar src con tu propia imagen -->
                    <!-- Usamos una imagen genérica de tecnología/soporte moderna -->
                    <img src="https://img.freepik.com/free-vector/customer-support-flat-illustration_23-2148889374.jpg?w=826&t=st=1700000000~exp=1700000000~hmac=x" 
                         alt="Soporte al Usuario" 
                         class="relative z-10 w-full max-w-lg mx-auto drop-shadow-2xl rounded-3xl border border-white/10 mix-blend-luminosity hover:mix-blend-normal transition-all duration-500 opacity-90 hover:opacity-100"
                         style="mask-image: linear-gradient(to bottom, black 80%, transparent 100%);">
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN CUN (Tarjetas Modernas) -->
    <div class="relative z-10 py-16 bg-slate-900/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-cyan-400 font-bold tracking-wide uppercase text-sm mb-2">Información Vital</h2>
                <p class="text-3xl sm:text-4xl font-extrabold text-white">
                    Código Único Numérico (CUN)
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                <!-- Tarjeta 1 -->
                <div class="group relative bg-gradient-to-b from-slate-800 to-slate-900 border border-slate-700 rounded-3xl p-8 hover:border-cyan-500/50 transition-all duration-300 hover:shadow-[0_10px_40px_-10px_rgba(6,182,212,0.3)]">
                    <div class="flex items-start gap-6">
                        <!-- Icono/Imagen pequeña -->
                        <div class="flex-shrink-0 w-16 h-16 bg-cyan-900/30 rounded-2xl flex items-center justify-center border border-cyan-500/20 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors">¿Para qué sirve el CUN?</h3>
                            <p class="text-slate-400 leading-relaxed mb-4 text-sm">
                                Es tu "cédula" de trámite. Te permite identificar tu solicitud desde el inicio hasta el final, garantizando trazabilidad total de tu petición, queja o recurso.
                            </p>
                            <a href="#" class="inline-flex items-center text-cyan-400 font-semibold text-sm hover:text-cyan-300">
                                Leer más información <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="group relative bg-gradient-to-b from-slate-800 to-slate-900 border border-slate-700 rounded-3xl p-8 hover:border-cyan-500/50 transition-all duration-300 hover:shadow-[0_10px_40px_-10px_rgba(6,182,212,0.3)]">
                    <div class="flex items-start gap-6">
                        <!-- Icono/Imagen pequeña -->
                        <div class="flex-shrink-0 w-16 h-16 bg-blue-900/30 rounded-2xl flex items-center justify-center border border-blue-500/20 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors">Servicio en Línea</h3>
                            <p class="text-slate-400 leading-relaxed mb-4 text-sm">
                                El CUN unifica el proceso a nivel nacional. Úsalo en nuestra plataforma para procesar apelaciones y realizar seguimiento en tiempo real.
                            </p>
                            <a href="{{ route('pqrs.consult') }}" class="inline-flex items-center text-blue-400 font-semibold text-sm hover:text-blue-300">
                                Ir al servicio en línea <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN ENLACES DE INTERÉS -->
    <div class="relative z-10 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-white mb-8 border-l-4 border-cyan-500 pl-4">Entidades Regulatorias</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Enlace 1 -->
                <a href="https://www.crcom.gov.co" target="_blank" class="flex items-center p-4 bg-white/5 border border-white/10 rounded-xl hover:bg-white/10 transition-colors group">
                    <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold text-xs mr-4 group-hover:bg-cyan-600 transition-colors">CRC</div>
                    <div>
                        <h4 class="text-white font-medium text-sm group-hover:text-cyan-400">Comisión de Regulación</h4>
                        <p class="text-slate-500 text-xs">Comunicaciones</p>
                    </div>
                </a>

                <!-- Enlace 2 -->
                <a href="https://www.mintic.gov.co" target="_blank" class="flex items-center p-4 bg-white/5 border border-white/10 rounded-xl hover:bg-white/10 transition-colors group">
                    <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold text-xs mr-4 group-hover:bg-cyan-600 transition-colors">TIC</div>
                    <div>
                        <h4 class="text-white font-medium text-sm group-hover:text-cyan-400">Ministerio TIC</h4>
                        <p class="text-slate-500 text-xs">Políticas del sector</p>
                    </div>
                </a>

                <!-- Enlace 3 -->
                <a href="#" class="flex items-center p-4 bg-white/5 border border-white/10 rounded-xl hover:bg-white/10 transition-colors group">
                    <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold text-xs mr-4 group-hover:bg-cyan-600 transition-colors">ANTV</div>
                    <div>
                        <h4 class="text-white font-medium text-sm group-hover:text-cyan-400">Autoridad Nacional TV</h4>
                        <p class="text-slate-500 text-xs">Servicio público</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
