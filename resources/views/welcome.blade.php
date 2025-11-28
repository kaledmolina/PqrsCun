@extends('layouts.pqrs')

@section('title', 'Inicio')

@section('content')
<div class="relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <main class="mt-10 mx-auto max-w-7xl sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28">
                <div class="sm:text-center lg:text-left animate-fade-in">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl mb-6">
                        <span class="block xl:inline">Centro de Atención</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-secondary to-primary xl:inline">al Usuario</span>
                    </h1>
                    <p class="mt-3 text-base text-slate-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Estamos comprometidos con brindarle el mejor servicio. Utilice nuestra plataforma para radicar sus peticiones, quejas, reclamos o sugerencias de manera ágil y segura.
                    </p>
                    <div class="mt-8 sm:mt-10 sm:flex sm:justify-center lg:justify-start gap-4">
                        <div class="rounded-md shadow">
                            <a href="{{ route('pqrs.create') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-primary to-secondary hover:shadow-lg hover:shadow-primary/50 transition-all duration-300 md:py-4 md:text-lg hover:scale-105">
                                Radicar PQRS
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0">
                            <a href="{{ route('pqrs.consult') }}" class="w-full flex items-center justify-center px-8 py-3 border border-white/10 text-base font-medium rounded-xl text-white bg-white/10 hover:bg-white/20 backdrop-blur-md md:py-4 md:text-lg transition-all duration-300 hover:scale-105">
                                Consultar Estado
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<!-- CUN Info Section -->
<div class="py-16">
    <div class="max-w-7xl mx-auto">
        <div class="lg:text-center mb-12 animate-slide-up">
            <h2 class="text-base text-secondary font-semibold tracking-wide uppercase">Información Importante</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                Código Único Numérico (CUN)
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-slate-900/40 backdrop-blur-3xl border border-white/10 rounded-2xl shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] p-8 hover:transform hover:scale-[1.02] transition-all duration-300 animate-slide-up">
                <h3 class="text-xl font-bold text-white mb-4">¿Para qué sirve el CUN?</h3>
                <p class="text-slate-300 mb-6 leading-relaxed">
                    El código asignado le permitirá al usuario (i) saber desde el inicio con qué número se identificará su trámite hasta que culmine el mismo y, (ii) hacer el seguimiento del estado actualizado de la petición, queja, recurso o solicitud de indemnización.
                </p>
                <a href="#" class="text-secondary font-medium hover:text-white transition-colors flex items-center gap-1 group">
                    Continuar leyendo
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="bg-slate-900/40 backdrop-blur-3xl border border-white/10 rounded-2xl shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] p-8 hover:transform hover:scale-[1.02] transition-all duration-300 animate-slide-up" style="animation-delay: 0.2s;">
                <h3 class="text-xl font-bold text-white mb-4">Servicio en Línea CUN</h3>
                <p class="text-slate-300 mb-6 leading-relaxed">
                    El CUN (Código Único Numérico) tiene como objetivo ser un número único a nivel nacional para procesar la apelación del usuario y realizar el correspondiente seguimiento de su queja, petición o recurso de reposición.
                </p>
                <a href="{{ route('pqrs.consult') }}" class="text-secondary font-medium hover:text-white transition-colors flex items-center gap-1 group">
                    Visite Servicio en Línea CUN
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Related Sites Section -->
<div class="py-16">
    <div class="max-w-7xl mx-auto">
        <div class="lg:text-center mb-12 animate-slide-up">
            <h2 class="text-base text-secondary font-semibold tracking-wide uppercase">Enlaces de Interés</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                Sitios Relacionados
            </p>
            <p class="mt-4 max-w-2xl text-xl text-slate-300 lg:mx-auto">
                Entidades reguladoras y de control del sector de las telecomunicaciones.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="https://www.crcom.gov.co" target="_blank" class="group block p-6 bg-slate-900/40 backdrop-blur-3xl border border-white/10 rounded-2xl shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] hover:bg-slate-800/60 transition-all duration-300 animate-slide-up">
                <h3 class="text-lg font-bold text-white group-hover:text-secondary mb-2 transition-colors">Comisión de Regulación de Comunicaciones</h3>
                <p class="text-sm text-slate-400">Promueve la competencia y regula los mercados de las redes y servicios de comunicaciones.</p>
            </a>

            <a href="https://www.mintic.gov.co" target="_blank" class="group block p-6 bg-slate-900/40 backdrop-blur-3xl border border-white/10 rounded-2xl shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] hover:bg-slate-800/60 transition-all duration-300 animate-slide-up" style="animation-delay: 0.2s;">
                <h3 class="text-lg font-bold text-white group-hover:text-secondary mb-2 transition-colors">Ministerio TIC</h3>
                <p class="text-sm text-slate-400">Diseña, adopta y promueve las políticas del sector de las Tecnologías de la Información.</p>
            </a>

            <a href="#" class="group block p-6 bg-slate-900/40 backdrop-blur-3xl border border-white/10 rounded-2xl shadow-[0_8px_32px_0_rgba(31,38,135,0.37)] hover:bg-slate-800/60 transition-all duration-300 animate-slide-up" style="animation-delay: 0.4s;">
                <h3 class="text-lg font-bold text-white group-hover:text-secondary mb-2 transition-colors">Autoridad Nacional de Televisión</h3>
                <p class="text-sm text-slate-400">Brinda herramientas para la ejecución de planes del servicio público de televisión.</p>
            </a>
        </div>
    </div>
</div>
@endsection
