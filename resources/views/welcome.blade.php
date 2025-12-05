@extends('layouts.pqrs')

@section('title', 'Inicio')

@section('content')
<!-- Contenedor Principal Transparente para dejar ver el fondo del layout -->
<div class="relative">
    
    <!-- HERO SECTION -->
    <div class="relative z-10">
        <div class="pt-10 pb-16 lg:pt-20 lg:pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Columna Izquierda: Texto -->
                <div class="text-center lg:text-left animate-fade-in">
                    <div class="inline-flex items-center px-4 py-2 rounded-full border border-primary/20 bg-white/40 backdrop-blur-md text-primary text-sm font-semibold mb-8 shadow-sm">
                        <span class="flex h-2.5 w-2.5 rounded-full bg-green-500 mr-3 animate-pulse"></span>
                        Estamos en línea para ayudarte
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl tracking-tight font-extrabold text-slate-900 sm:text-6xl xl:text-7xl mb-8 leading-tight">
                        Centro de <br class="hidden lg:block" />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">
                            Atención al Usuario
                        </span>
                    </h1>
                    
                    <p class="mt-4 text-xl text-slate-600 sm:max-w-xl sm:mx-auto lg:mx-0 leading-relaxed font-light">
                        Gestiona tus trámites de telecomunicaciones de forma ágil. Radica peticiones, quejas y reclamos con la seguridad y respaldo de <span class="text-primary font-bold">Intalnet</span>.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row gap-5 justify-center lg:justify-start">
                        <a href="{{ route('pqrs.create') }}" class="group relative flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-gradient-to-r from-primary to-secondary rounded-2xl hover:scale-105 hover:shadow-xl hover:shadow-primary/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <div class="absolute inset-0 rounded-2xl bg-white/20 blur-sm group-hover:blur-md transition-all"></div>
                            <span class="relative flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Radicar PQRS
                            </span>
                        </a>
                        
                        <a href="{{ route('pqrs.consult') }}" class="group flex items-center justify-center px-8 py-4 text-lg font-bold text-slate-700 transition-all duration-300 bg-white/60 border border-white/40 rounded-2xl hover:bg-white/80 hover:scale-105 shadow-lg shadow-slate-200/50 backdrop-blur-md">
                            <svg class="w-6 h-6 mr-2 text-slate-500 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            Consultar Estado
                        </a>
                    </div>
                </div>

                <!-- Columna Derecha: Imagen Ilustrativa -->
                <div class="hidden lg:block relative animate-slide-up">
                    <!-- Efecto de resplandor -->
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-full blur-[100px] opacity-20 transform translate-x-10 translate-y-10"></div>
                    
                    <div class="relative z-10 bg-white/30 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-6 shadow-2xl shadow-slate-200/50 transform rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="https://img.freepik.com/free-vector/customer-support-flat-illustration_23-2148889374.jpg" 
                             alt="Soporte al Usuario" 
                             class="w-full h-auto rounded-[2rem] shadow-inner">
                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-white/50 flex items-center gap-4 animate-bounce-slow">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-bold uppercase">Estado del Servicio</p>
                                <p class="text-slate-900 font-bold">Operando 100%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN CUN (Tarjetas Glassmorphism) -->
    <div class="relative z-10 py-12">
        <div class="text-center mb-12">
            <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-3">Información Vital</h2>
            <p class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                Código Único Numérico (CUN)
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Tarjeta 1 -->
            <div class="group relative bg-white/40 backdrop-blur-xl border border-white/50 rounded-[2rem] p-8 hover:bg-white/60 transition-all duration-300 shadow-xl shadow-slate-200/40 hover:shadow-2xl hover:-translate-y-1">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-primary to-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-primary/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">¿Para qué sirve el CUN?</h3>
                        <p class="text-slate-600 leading-relaxed mb-4 text-sm">
                            Es tu "cédula" de trámite. Te permite identificar tu solicitud desde el inicio hasta el final, garantizando trazabilidad total de tu petición, queja o recurso.
                        </p>
                        <a href="#" class="inline-flex items-center text-primary font-bold text-sm hover:text-secondary transition-colors">
                            Leer más información <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="group relative bg-white/40 backdrop-blur-xl border border-white/50 rounded-[2rem] p-8 hover:bg-white/60 transition-all duration-300 shadow-xl shadow-slate-200/40 hover:shadow-2xl hover:-translate-y-1">
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-secondary to-cyan-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-secondary/30 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Servicio en Línea</h3>
                        <p class="text-slate-600 leading-relaxed mb-4 text-sm">
                            El CUN unifica el proceso a nivel nacional. Úsalo en nuestra plataforma para procesar apelaciones y realizar seguimiento en tiempo real.
                        </p>
                        <a href="{{ route('pqrs.consult') }}" class="inline-flex items-center text-secondary font-bold text-sm hover:text-primary transition-colors">
                            Ir al servicio en línea <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN ENLACES DE INTERÉS -->
    <div class="relative z-10 py-16">
        <h2 class="text-2xl font-bold text-slate-900 mb-8 border-l-4 border-primary pl-4">Entidades Regulatorias</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Enlace 1 -->
            <a href="https://www.crcom.gov.co" target="_blank" class="flex items-center p-4 bg-white/60 border border-white/50 rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 font-bold text-xs mr-4 group-hover:bg-primary group-hover:text-white transition-colors">CRC</div>
                <div>
                    <h4 class="text-slate-900 font-bold text-sm group-hover:text-primary transition-colors">Comisión de Regulación</h4>
                    <p class="text-slate-500 text-xs">Comunicaciones</p>
                </div>
            </a>

            <!-- Enlace 2 -->
            <a href="https://www.mintic.gov.co" target="_blank" class="flex items-center p-4 bg-white/60 border border-white/50 rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 font-bold text-xs mr-4 group-hover:bg-primary group-hover:text-white transition-colors">TIC</div>
                <div>
                    <h4 class="text-slate-900 font-bold text-sm group-hover:text-primary transition-colors">Ministerio TIC</h4>
                    <p class="text-slate-500 text-xs">Políticas del sector</p>
                </div>
            </a>

            <!-- Enlace 3 -->
            <a href="#" class="flex items-center p-4 bg-white/60 border border-white/50 rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 font-bold text-xs mr-4 group-hover:bg-primary group-hover:text-white transition-colors">ANTV</div>
                <div>
                    <h4 class="text-slate-900 font-bold text-sm group-hover:text-primary transition-colors">Autoridad Nacional TV</h4>
                    <p class="text-slate-500 text-xs">Servicio público</p>
                </div>
            </a>
        </div>
    </div>

</div>
@endsection
