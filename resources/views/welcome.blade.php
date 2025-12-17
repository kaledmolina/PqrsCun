@extends('layouts.pqrs')

@section('title', 'Inicio')

@section('content')
<div class="relative">
    
    <!-- HERO SECTION (Original - Sin Cambios) -->
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
                        Gestiona los trámites de tus servicios de forma ágil. Radica peticiones, quejas y reclamos con la seguridad y respaldo de <span class="text-primary font-bold">Intalnet</span>.
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

    <!-- ENTIDADES REGULATORIAS Y DE VIGILANCIA -->
    <div class="relative z-10 mb-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-4">
                    Respaldo y <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Vigilancia</span>
                </h2>
                <p class="text-slate-600 max-w-2xl mx-auto">
                    Operamos bajo la estricta supervisión de las entidades nacionales para garantizarte un servicio transparente y de calidad.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-center">
                
                <!-- CRC -->
                <a href="https://www.crcom.gov.co" target="_blank" rel="noopener noreferrer" class="group relative bg-white rounded-[2rem] shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden border border-slate-100">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-secondary to-primary group-hover:h-2 transition-all"></div>
                    
                    <!-- Logo Area with Modern Gradient -->
                    <div class="h-40 bg-gradient-to-br from-slate-900 via-[#1e3a8a] to-primary flex items-center justify-center p-8 relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-20"></div>
                        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-secondary/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <img src="https://crcom.gov.co/sites/default/files/webcrc/images/header/logo-comision-regulacion-comunicaciones-colombia.svg" 
                             alt="Logo CRC" 
                             class="w-full h-full object-contain brightness-0 invert drop-shadow-md relative z-10 transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <!-- Content -->
                    <div class="p-6 text-center">
                        <div class="w-10 h-1 rounded-full bg-slate-100 mx-auto mb-4 group-hover:bg-primary/20 transition-colors"></div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2 group-hover:text-primary transition-colors">CRC</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Comisión de Regulación de Comunicaciones
                        </p>
                        <span class="inline-block mt-4 text-xs font-bold text-primary opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all">
                            Ver Sitio Oficial &rarr;
                        </span>
                    </div>
                </a>

                <!-- MinTIC -->
                <a href="https://www.mintic.gov.co" target="_blank" rel="noopener noreferrer" class="group relative bg-white rounded-[2rem] shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden border border-slate-100">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-secondary to-primary group-hover:h-2 transition-all"></div>
                    
                    <div class="h-40 bg-gradient-to-br from-slate-900 via-[#1e3a8a] to-primary flex items-center justify-center p-8 relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-20"></div>
                        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-secondary/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <img src="https://css.mintic.gov.co/mt/mintic/new/img/logo_mintic_24_dark.svg" 
                             alt="Logo MinTIC" 
                             class="w-full h-full object-contain brightness-0 invert drop-shadow-md relative z-10 transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="p-6 text-center">
                        <div class="w-10 h-1 rounded-full bg-slate-100 mx-auto mb-4 group-hover:bg-primary/20 transition-colors"></div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2 group-hover:text-primary transition-colors">MinTIC</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Ministerio de Tecnologías de la Información
                        </p>
                        <span class="inline-block mt-4 text-xs font-bold text-primary opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all">
                            Ver Sitio Oficial &rarr;
                        </span>
                    </div>
                </a>

                <!-- SIC -->
                <a href="https://www.sic.gov.co" target="_blank" rel="noopener noreferrer" class="group relative bg-white rounded-[2rem] shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden border border-slate-100">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-secondary to-primary group-hover:h-2 transition-all"></div>
                    
                    <div class="h-40 bg-gradient-to-br from-slate-900 via-[#1e3a8a] to-primary flex items-center justify-center p-8 relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-20"></div>
                        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-secondary/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                        
                        <img src="https://sedeelectronica.sic.gov.co/themes/custom/sictheme/assets/img/LogoSICv1.png" 
                             alt="Logo SIC" 
                             class="w-full h-full object-contain brightness-0 invert drop-shadow-md relative z-10 transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="p-6 text-center">
                        <div class="w-10 h-1 rounded-full bg-slate-100 mx-auto mb-4 group-hover:bg-primary/20 transition-colors"></div>
                        <h3 class="font-bold text-xl text-slate-900 mb-2 group-hover:text-primary transition-colors">SIC</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Superintendencia de Industria y Comercio
                        </p>
                        <span class="inline-block mt-4 text-xs font-bold text-primary opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all">
                            Ver Sitio Oficial &rarr;
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </div>


    <div id="stacking-context" class="relative pb-40">

        <!-- CARD 1: IDENTIFICACIÓN -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-10 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">PASO 1: IDENTIFICACIÓN</h2>
                    <p class="text-3xl font-extrabold text-slate-900">ENTENDIENDO TU TRÁMITE</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- CUN Section -->
                    <div class="lg:col-span-5 bg-gradient-to-br from-primary/5 to-blue-50/50 rounded-[2rem] p-6 border border-primary/10 relative overflow-hidden group hover:shadow-lg transition-all">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-2xl -mr-16 -mt-16"></div>
                        <div class="relative z-10">
                            <div class="w-12 h-12 bg-primary text-white rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-primary/30 text-xl font-bold">#</div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">El CUN</h3>
                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                El <strong>Código Único Numérico</strong> es tu "identificación" de trámite. Te permite rastrear tu solicitud con trazabilidad total.
                            </p>
                            <a href="{{ route('pqrs.consult') }}" class="inline-flex items-center px-4 py-2 bg-white text-primary font-bold rounded-xl shadow-sm hover:shadow-md transition-all text-sm group-hover:scale-105">
                                Consultar con CUN <span class="ml-2">→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Definitions Section -->
                    <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="bg-white/50 rounded-2xl p-4 border border-white/60 hover:bg-white hover:shadow-lg transition-all">
                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-3 text-lg font-bold">P</div>
                            <h4 class="font-bold text-slate-900 mb-1 text-sm">Petición</h4>
                            <p class="text-[10px] text-slate-500 leading-relaxed">Solicitud para requerir información, copias de documentos o la prestación del servicio. Incluye peticiones de interés general o particular.</p>
                        </div>
                        <div class="bg-white/50 rounded-2xl p-4 border border-white/60 hover:bg-white hover:shadow-lg transition-all">
                            <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center mb-3 text-lg font-bold">Q</div>
                            <h4 class="font-bold text-slate-900 mb-1 text-sm">Queja</h4>
                            <p class="text-[10px] text-slate-500 leading-relaxed">Inconformidad con la prestación del servicio o la atención recibida.</p>
                        </div>
                        <div class="bg-white/50 rounded-2xl p-4 border border-white/60 hover:bg-white hover:shadow-lg transition-all">
                            <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-3 text-lg font-bold">R</div>
                            <h4 class="font-bold text-slate-900 mb-1 text-sm">Recurso de Reposición en Subsidio de Apelación</h4>
                            <p class="text-[10px] text-slate-500 leading-relaxed">Derecho a solicitar que la empresa revise su decisión (Reposición) y, si la mantiene, que la SIC resuelva definitivamente (Apelación).</p>
                        </div>
                        <div class="bg-white/50 rounded-2xl p-4 border border-white/60 hover:bg-white hover:shadow-lg transition-all">
                            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-3 text-lg font-bold">S</div>
                            <h4 class="font-bold text-slate-900 mb-1 text-sm">Sugerencia</h4>
                            <p class="text-[10px] text-slate-500 leading-relaxed">Propuesta para mejorar la prestación del servicio o la gestión de la empresa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: DERECHOS DEL USUARIO -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-20 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-secondary font-bold tracking-widest uppercase text-sm mb-2">PASO 2: TU CONTRATO</h2>
                    <p class="text-3xl font-extrabold text-slate-900">DERECHOS FUNDAMENTALES</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Calidad -->
                    <div class="bg-white/50 rounded-2xl p-5 border border-white/60 hover:bg-white transition-all">
                        <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2 text-sm">
                            <span class="w-6 h-6 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-xs">💎</span>
                            Calidad y Compensación
                        </h3>
                        <p class="text-[10px] text-slate-600 leading-relaxed mb-2">
                            Si el servicio falla o se suspende pese al pago, <strong>lo compensaremos en su próxima factura</strong>.
                        </p>
                        <a href="https://www.mintic.gov.co" target="_blank" class="text-[10px] text-primary font-bold hover:underline">Ver condiciones CRC →</a>
                    </div>

                    <!-- Suspensión -->
                    <div class="bg-white/50 rounded-2xl p-5 border border-white/60 hover:bg-white transition-all">
                        <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2 text-sm">
                            <span class="w-6 h-6 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center text-xs">⏸</span>
                            Suspensión Temporal
                        </h3>
                        <p class="text-[10px] text-slate-600 leading-relaxed">
                            Derecho a suspender el servicio por <strong>máximo 2 meses al año</strong>. Solicitar antes del inicio del ciclo.
                        </p>
                    </div>

                    <!-- Terminación -->
                    <div class="bg-white/50 rounded-2xl p-5 border border-white/60 hover:bg-white transition-all">
                        <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2 text-sm">
                            <span class="w-6 h-6 bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-xs">🚪</span>
                            Terminación
                        </h3>
                        <p class="text-[10px] text-slate-600 leading-relaxed">
                            Termine el contrato en cualquier momento <strong>sin penalidades</strong>. Aviso mín. <strong>3 días hábiles</strong> antes del corte.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 3: GESTIÓN DEL SERVICIO -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-30 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-secondary font-bold tracking-widest uppercase text-sm mb-2">PASO 3: GESTIÓN</h2>
                    <p class="text-3xl font-extrabold text-slate-900">ADMINISTRACIÓN DEL SERVICIO</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Modificación y Cesión -->
                    <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white transition-all">
                        <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2 text-sm">
                            <span class="w-6 h-6 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs">📝</span>
                            Modificación y Cesión
                        </h3>
                        <div class="space-y-2">
                            <details class="group">
                                <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-[10px] text-slate-800">
                                    <span>Cesión de Contrato</span>
                                    <span class="transition group-open:rotate-180">▼</span>
                                </summary>
                                <p class="text-[10px] text-slate-600 mt-2 group-open:animate-fadeIn">
                                    Puede ceder el contrato con solicitud escrita y aceptación del nuevo titular. Respuesta en 15 días hábiles.
                                </p>
                            </details>
                            <details class="group">
                                <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-[10px] text-slate-800">
                                    <span>Cambio de Plan</span>
                                    <span class="transition group-open:rotate-180">▼</span>
                                </summary>
                                <p class="text-[10px] text-slate-600 mt-2 group-open:animate-fadeIn">
                                    Modifique su plan en cualquier momento. Aplica al siguiente periodo. Solicitud 3 días antes del corte.
                                </p>
                            </details>
                        </div>
                    </div>

                    <!-- Pago y Facturación -->
                    <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white transition-all">
                        <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2 text-sm">
                            <span class="w-6 h-6 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-xs">💳</span>
                            Pago y Facturación
                        </h3>
                        <ul class="text-[10px] text-slate-600 space-y-1 list-disc pl-4">
                            <li>Factura llega 5 días antes del pago.</li>
                            <li>Reconexión en 3 días hábiles tras pago.</li>
                        </ul>
                    </div>

                    <!-- Otros Servicios -->
                    <div class="md:col-span-2 grid grid-cols-3 gap-4">
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-center">
                            <h4 class="font-bold text-[10px] text-slate-800 uppercase mb-1">Cambio Domicilio</h4>
                            <p class="text-[10px] text-slate-500">Sujeto a viabilidad técnica. Costo de materiales.</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-center">
                            <h4 class="font-bold text-[10px] text-slate-800 uppercase mb-1">Reconexión</h4>
                            <p class="text-[10px] text-slate-500">Costo operativo: $20.000.</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-center">
                            <h4 class="font-bold text-[10px] text-slate-800 uppercase mb-1">Larga Distancia</h4>
                            <p class="text-[10px] text-slate-500">Elija su operador marcando el código.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 4: OBLIGACIONES -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-40 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-slate-500 font-bold tracking-widest uppercase text-sm mb-2">PASO 4: DEBERES</h2>
                    <p class="text-3xl font-extrabold text-slate-900">PRINCIPALES OBLIGACIONES</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <div class="flex gap-3 text-xs text-slate-600 bg-white/50 p-3 rounded-xl border border-white/60"><span class="text-primary font-bold">1.</span> Pagar oportunamente los servicios e intereses.</div>
                        <div class="flex gap-3 text-xs text-slate-600 bg-white/50 p-3 rounded-xl border border-white/60"><span class="text-primary font-bold">2.</span> Suministrar información verdadera.</div>
                        <div class="flex gap-3 text-xs text-slate-600 bg-white/50 p-3 rounded-xl border border-white/60"><span class="text-primary font-bold">3.</span> Hacer uso adecuado de equipos y servicios.</div>
                        <div class="flex gap-3 text-xs text-slate-600 bg-white/50 p-3 rounded-xl border border-white/60"><span class="text-primary font-bold">4.</span> No divulgar ni acceder a pornografía infantil.</div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex gap-3 text-xs text-slate-600 bg-white/50 p-3 rounded-xl border border-white/60"><span class="text-primary font-bold">5.</span> Avisar sobre robo de elementos de red.</div>
                        <div class="flex gap-3 text-xs text-slate-600 bg-white/50 p-3 rounded-xl border border-white/60"><span class="text-primary font-bold">6.</span> No cometer fraude.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 5: ANEXOS LEGALES -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-50 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-slate-500 font-bold tracking-widest uppercase text-sm mb-2">PASO 5: MARCO LEGAL</h2>
                    <p class="text-3xl font-extrabold text-slate-900">ANEXOS LEGALES</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                        <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                            <span>Disposiciones Generales</span>
                            <span class="transition group-open:rotate-180">▼</span>
                        </summary>
                        <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-24 overflow-y-auto custom-scrollbar">
                            <p class="mb-2"><strong>Obligaciones Usuario:</strong> Permitir ingreso de personal INTALNET. Responder por equipos en comodato.</p>
                            <p><strong>Velocidad:</strong> Factores limitantes: Latencia, congestión, WiFi.</p>
                        </div>
                    </details>

                    <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                        <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                            <span>Habeas Data (Anexo 1)</span>
                            <span class="transition group-open:rotate-180">▼</span>
                        </summary>
                        <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-24 overflow-y-auto custom-scrollbar">
                            <p><strong>¿Qué es?</strong> Es tu derecho fundamental a conocer, actualizar y rectificar la información que tenemos sobre ti.</p>
                            <p class="mt-1"><strong>Protección:</strong> Implementamos estrictas medidas de seguridad para garantizar la confidencialidad de tus datos, usándolos exclusivamente para la prestación del servicio.</p>
                        </div>
                    </details>

                    <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                        <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                            <span>Pornografía Infantil (Anexo 2)</span>
                            <span class="transition group-open:rotate-180">▼</span>
                        </summary>
                        <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-24 overflow-y-auto custom-scrollbar">
                            <p>Prohibición pornografía infantil (Ley 679/2001). Obligación de prevenir acceso de menores y denunciar.</p>
                        </div>
                    </details>

                    <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                        <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                            <span>SARLAFT</span>
                            <span class="transition group-open:rotate-180">▼</span>
                        </summary>
                        <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-24 overflow-y-auto custom-scrollbar">
                            <p>Terminación automática si el usuario es relacionado con lavado de activos/terrorismo. Actualizar información anualmente.</p>
                        </div>
                    </details>
                </div>
            </div>
        </div>

        <!-- CARD 6: CANALES DE ATENCIÓN -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-[60] pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">PASO 6: CONTACTO</h2>
                    <p class="text-3xl font-extrabold text-slate-900">CANALES DE ATENCIÓN</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 font-bold uppercase">WhatsApp Chatbot</p>
                            <p class="text-sm font-extrabold text-slate-900">3148042601</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 font-bold uppercase">Email</p>
                            <a href="mailto:pqr@intalnet.com" class="text-sm font-bold text-slate-900 hover:text-primary">pqr@intalnet.com</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 font-bold uppercase">Web</p>
                            <p class="text-sm font-semibold text-slate-700">Formulario 24/7</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-indigo-50/50 rounded-xl p-4 border border-indigo-100/50">
                        <h4 class="font-bold text-slate-900 text-xs mb-1">Libertad Contractual</h4>
                        <p class="text-[10px] text-slate-600">Sin cláusula de permanencia mínima.</p>
                    </div>
                    <div class="bg-orange-50/50 rounded-xl p-4 border border-orange-100/50">
                        <h4 class="font-bold text-slate-900 text-xs mb-1">Control Parental</h4>
                        <p class="text-[10px] text-slate-600">Solicite bloqueo de contenidos.</p>
                    </div>
                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                        <h4 class="font-bold text-slate-900 text-xs mb-1">Asunto Email</h4>
                        <p class="text-[10px] font-mono text-slate-600">Tipo Solicitud - Cédula</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 7: OFICINAS FÍSICAS -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-[70] pt-10 transition-all duration-500 ease-out origin-top pb-20">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">PASO 7: UBICACIÓN</h2>
                    <p class="text-3xl font-extrabold text-slate-900">OFICINAS FÍSICAS</p>
                </div>

                <div class="space-y-4">
                    <!-- Montería -->
                    <div class="bg-gradient-to-r from-slate-50 to-white border border-slate-200 p-4 rounded-2xl relative overflow-hidden group hover:shadow-md transition-all">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-2 relative z-10">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h4 class="font-bold text-lg text-primary">Valencia</h4>
                                    <span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Sede Principal</span>
                                </div>
                                <p class="text-slate-700 font-medium text-xs">Carrera 14 # 12-26 Barrio Centro</p>
                            </div>
                            <div class="text-right text-[10px] text-slate-500 bg-white/50 p-2 rounded-lg border border-slate-100">
                                <p>Lun-Vie: 8-12 & 2-6 | Sáb: 8-12</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="bg-white border border-slate-100 p-3 rounded-xl hover:border-primary/30 transition-colors">
                            <h4 class="font-bold text-slate-800 text-sm mb-1">Tierralta</h4>
                            <p class="text-[10px] text-slate-600">Cr. 13 # 5-31 Barrio El Prado</p>

                        </div>
                        <div class="bg-white border border-slate-100 p-3 rounded-xl hover:border-primary/30 transition-colors">
                            <h4 class="font-bold text-slate-800 text-sm mb-1">Montería</h4>
                            <p class="text-[10px] text-slate-600">Cr. 25 No. 23-74 Calle la Pradera</p>

                        </div>
                        <div class="bg-white border border-slate-100 p-3 rounded-xl hover:border-primary/30 transition-colors">
                            <h4 class="font-bold text-slate-800 text-sm mb-1">San Pedro</h4>
                            <p class="text-[10px] text-slate-600">Calle 49 No 45-00 Barrio Alfonso López</p>

                        </div>
                        <div class="bg-white border border-slate-100 p-3 rounded-xl hover:border-primary/30 transition-colors">
                            <h4 class="font-bold text-slate-800 text-sm mb-1">Puerto Libertador</h4>
                            <p class="text-[10px] text-slate-600">Carrera 10 # 11-20 Barrio Camilo Jiménez</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN DE NORMATIVIDAD -->
    <div class="relative py-20 px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Marco Normativo</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Cumplimos con todas las disposiciones legales vigentes para garantizar la protección de tus derechos y la calidad del servicio.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Resolución 5050 -->
            <a href="https://gestornormativo.creg.gov.co/gestor/entorno/docs/resolucion_crc_5050_2016.htm" target="_blank" class="group bg-white/60 backdrop-blur-md rounded-2xl p-6 border border-white/50 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2">Resolución CRC 5050</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Régimen de Protección de los Derechos de los Usuarios de Servicios de Comunicaciones.</p>
            </a>

            <!-- Resolución 5111 -->
            <a href="https://colombiatic.mintic.gov.co/679/articles-62266_doc_norma.pdf" target="_blank" class="group bg-white/60 backdrop-blur-md rounded-2xl p-6 border border-white/50 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2">Resolución CRC 5111</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Protección de usuarios, simplificación de trámites y mecanismos de atención.</p>
            </a>

            <!-- Circular Única SIC -->
            <a href="https://www.sic.gov.co/circular-unica" target="_blank" class="group bg-white/60 backdrop-blur-md rounded-2xl p-6 border border-white/50 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2">Circular Única SIC</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Directrices de la Superintendencia de Industria y Comercio sobre protección al consumidor.</p>
            </a>

            <!-- Ley 1336 -->
            <div class="group bg-white/60 backdrop-blur-md rounded-2xl p-6 border border-white/50 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-red-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-900 mb-2">Ley 1336 de 2009</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Informamos que la explotación y el abuso sexual de menores de edad son sancionados penalmente en Colombia.</p>
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
            if (window.innerWidth < 1024) {
                cards.forEach(card => {
                    card.style.transform = '';
                    card.style.opacity = '';
                    card.style.filter = '';
                });
                return;
            }

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