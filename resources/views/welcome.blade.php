@extends('layouts.pqrs')

@section('title', 'Inicio')

@section('content')
<div class="relative">
    
    <div class="relative z-10 mb-10">
        <div class="pt-10 pb-16 lg:pt-20 lg:pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
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

                <div class="hidden lg:block relative animate-slide-up">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-full blur-[100px] opacity-20 transform translate-x-10 translate-y-10"></div>
                    <div class="relative z-10 bg-white/30 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-6 shadow-2xl shadow-slate-200/50 transform rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="https://img.freepik.com/free-vector/customer-support-flat-illustration_23-2148889374.jpg" 
                             alt="Soporte al Usuario" 
                             class="w-full h-auto rounded-[2rem] shadow-inner">
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


    <div id="stacking-context" class="relative pb-40">

        <!-- CARD 1: ENTENDIENDO TU TRÁMITE -->
        <div class="stacking-card sticky top-[120px] z-10 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-12 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-10">
                    <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-3">Paso 1: Identificación</h2>
                    <p class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                        Entendiendo tu Trámite
                    </p>
                    <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                        Antes de iniciar, es fundamental que conozcas el código que garantiza tu seguimiento y el tipo de solicitud que vas a realizar.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- CUN Section -->
                    <div class="lg:col-span-5 bg-gradient-to-br from-primary/5 to-blue-50/50 rounded-[2rem] p-8 border border-primary/10 relative overflow-hidden group hover:shadow-lg transition-all">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-2xl -mr-16 -mt-16"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-primary text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/30 text-2xl font-bold">
                                #
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">El CUN</h3>
                            <p class="text-slate-600 mb-6 leading-relaxed">
                                El <strong>Código Único Numérico</strong> es tu "cédula" de trámite. Te permite rastrear tu solicitud desde el inicio hasta el final, garantizando trazabilidad total.
                            </p>
                            <a href="{{ route('pqrs.consult') }}" class="inline-flex items-center px-6 py-3 bg-white text-primary font-bold rounded-xl shadow-sm hover:shadow-md transition-all group-hover:scale-105">
                                Consultar con CUN <span class="ml-2">→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Definitions Section -->
                    <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4 text-xl font-bold">P</div>
                            <h4 class="font-bold text-slate-900 mb-2">Petición</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Solicitud de información o servicios. Cualquier manifestación sobre tus derechos.</p>
                        </div>
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center mb-4 text-xl font-bold">Q</div>
                            <h4 class="font-bold text-slate-900 mb-2">Queja</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Inconformidad con la prestación del servicio o la atención recibida.</p>
                        </div>
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white hover:shadow-lg transition-all">
                            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-4 text-xl font-bold">R</div>
                            <h4 class="font-bold text-slate-900 mb-2">Recurso</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Si no estás de acuerdo con la respuesta a tu queja, puedes apelar la decisión.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: TUS GARANTÍAS -->
        <div class="stacking-card sticky top-[120px] z-20 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-12 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-10">
                    <h2 class="text-secondary font-bold tracking-widest uppercase text-sm mb-3">Paso 2: Protección</h2>
                    <p class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                        Tus Garantías y Derechos
                    </p>
                    <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                        La regulación colombiana te protege. Conoce los tiempos y mecanismos que aseguran una respuesta justa.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Timeline & Silence -->
                    <div class="bg-slate-50/50 rounded-[2rem] p-8 border border-slate-100">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center shadow-sm">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-900">15 Días Hábiles</h3>
                                <p class="text-sm text-slate-500">Tiempo máximo de respuesta</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex gap-4 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                                <span class="text-2xl">🤫</span>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm">Silencio Administrativo Positivo</h4>
                                    <p class="text-xs text-slate-500 mt-1">Si no respondemos a tiempo, tu solicitud se entiende resuelta a tu favor automáticamente en 72 horas.</p>
                                </div>
                            </div>
                            <div class="flex gap-4 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                                <span class="text-2xl">💰</span>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm">Sin Pago Previo</h4>
                                    <p class="text-xs text-slate-500 mt-1">No debes pagar los valores en reclamo para ser atendido. Solo paga lo que no estás disputando.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rights Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-2xl border border-red-100 hover:shadow-md transition-all">
                            <div class="w-10 h-10 bg-red-100 text-red-600 rounded-lg flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm mb-2">Terminación</h4>
                            <p class="text-xs text-slate-600">Cancela tu contrato cuando quieras, avisando 3 días antes del corte.</p>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-white p-6 rounded-2xl border border-green-100 hover:shadow-md transition-all">
                            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm mb-2">Compensación</h4>
                            <p class="text-xs text-slate-600">Recibe saldo a favor automáticamente si tu servicio falla.</p>
                        </div>
                        <div class="col-span-1 sm:col-span-2 bg-gradient-to-br from-blue-50 to-white p-6 rounded-2xl border border-blue-100 hover:shadow-md transition-all flex items-center gap-4">
                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Tarifas Claras</h4>
                                <p class="text-xs text-slate-600">Sin letra menuda ni cobros sorpresa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 3: DEBERES Y REGULADOR -->
        <div class="stacking-card sticky top-[120px] z-30 pt-10 transition-all duration-500 ease-out origin-top pb-20">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-12 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-10">
                    <h2 class="text-slate-500 font-bold tracking-widest uppercase text-sm mb-3">Paso 3: Responsabilidad</h2>
                    <p class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                        Tus Deberes y el Regulador
                    </p>
                    <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                        Una relación sana requiere compromiso de ambas partes. Conoce tus deberes y quién nos vigila.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <!-- Duties List -->
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-sm">📋</span>
                            Tus Obligaciones
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3 p-3 bg-white/50 rounded-xl border border-white/60">
                                <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xs">✓</div>
                                <span class="text-sm text-slate-700 font-medium">Pagar oportunamente tu factura</span>
                            </li>
                            <li class="flex items-center gap-3 p-3 bg-white/50 rounded-xl border border-white/60">
                                <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xs">✓</div>
                                <span class="text-sm text-slate-700 font-medium">No realizar fraudes ni conexiones ilegales</span>
                            </li>
                            <li class="flex items-center gap-3 p-3 bg-white/50 rounded-xl border border-white/60">
                                <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xs">✓</div>
                                <span class="text-sm text-slate-700 font-medium">Usar equipos homologados</span>
                            </li>
                            <li class="flex items-center gap-3 p-3 bg-white/50 rounded-xl border border-white/60">
                                <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xs">✓</div>
                                <span class="text-sm text-slate-700 font-medium">Tratar con respeto al personal de atención</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Regulators -->
                    <div class="bg-gradient-to-br from-indigo-50 to-white rounded-[2rem] p-8 border border-indigo-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-indigo-100/50 rounded-full blur-3xl -mr-10 -mt-10"></div>
                        <h3 class="text-xl font-bold text-slate-900 mb-6 relative z-10">Entidades de Vigilancia</h3>
                        <div class="space-y-4 relative z-10">
                            <a href="https://www.crcom.gov.co" target="_blank" class="flex items-center gap-4 p-4 bg-white rounded-xl border border-indigo-50 hover:shadow-md transition-all group">
                                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-xs">CRC</div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">Comisión de Regulación</h4>
                                    <p class="text-xs text-slate-500">Regula el mercado de comunicaciones</p>
                                </div>
                                <svg class="w-5 h-5 ml-auto text-slate-300 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                            <a href="https://www.mintic.gov.co" target="_blank" class="flex items-center gap-4 p-4 bg-white rounded-xl border border-indigo-50 hover:shadow-md transition-all group">
                                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-xs">TIC</div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">Ministerio TIC</h4>
                                    <p class="text-xs text-slate-500">Diseña la política pública</p>
                                </div>
                                <svg class="w-5 h-5 ml-auto text-slate-300 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                            <a href="https://www.sic.gov.co" target="_blank" class="flex items-center gap-4 p-4 bg-white rounded-xl border border-indigo-50 hover:shadow-md transition-all group">
                                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-xs">SIC</div>
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">Superintendencia</h4>
                                    <p class="text-xs text-slate-500">Protege tus derechos como consumidor</p>
                                </div>
                                <svg class="w-5 h-5 ml-auto text-slate-300 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                            
                            <!-- Habeas Data Info -->
                            <div class="mt-4 p-4 bg-indigo-100/50 rounded-xl border border-indigo-100 flex gap-3 items-start">
                                <svg class="w-5 h-5 text-indigo-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                <div>
                                    <h4 class="font-bold text-indigo-900 text-sm">Habeas Data</h4>
                                    <p class="text-xs text-indigo-800 leading-relaxed">
                                        Tienes derecho a conocer, actualizar y rectificar tu información personal. La SIC vigila el cumplimiento de la Ley 1581 de 2012.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll('.stacking-card');
        const viewportHeight = window.innerHeight;
        const stickyTopPoint = 120; 

        function handleScroll() {
            cards.forEach((card, index) => {
                if (index === cards.length - 1) return;

                const nextCard = cards[index + 1];
                const rect = card.getBoundingClientRect();
                const nextRect = nextCard.getBoundingClientRect();

                if (rect.top <= stickyTopPoint + 20 && nextRect.top <= viewportHeight) {
                    const distanceToSticky = Math.max(0, nextRect.top - stickyTopPoint);
                    const totalDistance = viewportHeight - stickyTopPoint;
                    let progressRatio = 1 - (distanceToSticky / totalDistance);
                    progressRatio = Math.max(0, Math.min(1, progressRatio));

                    const scale = 1 - (progressRatio * 0.1); 
                    const opacity = 1 - (progressRatio * 0.4);
                    
                    // Solo aplicar desenfoque cuando la tarjeta ya está muy atrás (al 70% del recorrido)
                    const blur = Math.max(0, (progressRatio - 0.7) * 20); 

                    card.style.transform = `scale(${scale})`;
                    card.style.opacity = `${opacity}`;
                    card.style.filter = `blur(${blur}px)`;

                } else {
                    card.style.transform = 'scale(1)';
                    card.style.opacity = '1';
                    card.style.filter = 'blur(0px)';
                }
            });
        }

        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    });
</script>
@endsection