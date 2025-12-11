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

        <!-- CARD 1: ENTENDIENDO TU TRÁMITE (Original - Sin Cambios) -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-10 pt-10 transition-all duration-500 ease-out origin-top">
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

        <!-- CARD 2: DERECHOS Y CONDICIONES (Actualizada) -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-20 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-12 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-10">
                    <h2 class="text-secondary font-bold tracking-widest uppercase text-sm mb-3">Paso 2: Tu Contrato</h2>
                    <p class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                        Derechos y Condiciones
                    </p>
                    <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                        Conoce tus derechos, las condiciones de prestación del servicio y los mecanismos de protección al usuario.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Columna Izquierda -->
                    <div class="space-y-4">
                        <!-- Calidad y Compensación -->
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white transition-all">
                            <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                                <span class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-sm">💎</span>
                                Calidad y Compensación
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed mb-2">
                                Cuando se presente indisponibilidad del servicio o este se suspenda a pesar de su pago oportuno, <strong>lo compensaremos en su próxima factura</strong>.
                            </p>
                            <a href="https://www.mintic.gov.co" target="_blank" class="text-[10px] text-primary font-bold hover:underline">Ver condiciones CRC (MinTIC) →</a>
                        </div>

                        <!-- Suspensión -->
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white transition-all">
                            <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                                <span class="w-8 h-8 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center text-sm">⏸</span>
                                Suspensión Temporal
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Tiene derecho a solicitar la suspensión del servicio por un <strong>máximo de 2 meses al año</strong>. Debe solicitarlo antes del inicio del ciclo de facturación.
                            </p>
                        </div>

                        <!-- Terminación -->
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white transition-all">
                            <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                                <span class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-sm">🚪</span>
                                Terminación del Contrato
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Puede terminar el contrato en cualquier momento <strong>sin penalidades</strong> (salvo cláusula de permanencia pactada). Debe avisar con mínimo <strong>3 días hábiles</strong> antes del corte de facturación (día 1 de cada mes).
                            </p>
                        </div>
                    </div>

                    <!-- Columna Derecha -->
                    <div class="space-y-4">
                        <!-- Modificación y Cesión -->
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white transition-all">
                            <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                                <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-sm">📝</span>
                                Modificación y Cesión
                            </h3>
                            <div class="space-y-2">
                                <details class="group">
                                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-xs text-slate-800">
                                        <span>Cesión de Contrato</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                                        </span>
                                    </summary>
                                    <p class="text-xs text-slate-600 mt-2 group-open:animate-fadeIn">
                                        Puede ceder el contrato presentando solicitud escrita acompañada de la aceptación del nuevo titular. Respuesta en 15 días hábiles.
                                    </p>
                                </details>
                                <details class="group">
                                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-xs text-slate-800">
                                        <span>Modificación de Servicios</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                                        </span>
                                    </summary>
                                    <p class="text-xs text-slate-600 mt-2 group-open:animate-fadeIn">
                                        Puede modificar su plan en cualquier momento. El cambio aplica en el siguiente periodo. Solicitud 3 días antes del corte. No podemos modificar el contrato sin su autorización.
                                    </p>
                                </details>
                            </div>
                        </div>

                        <!-- Pago y Facturación -->
                        <div class="bg-white/50 rounded-2xl p-6 border border-white/60 hover:bg-white transition-all">
                            <h3 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                                <span class="w-8 h-8 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-sm">💳</span>
                                Pago y Facturación
                            </h3>
                            <ul class="text-xs text-slate-600 space-y-2 list-disc pl-4">
                                <li>La factura llega mín. 5 días antes del pago.</li>
                                <li>Reconexión en 3 días hábiles tras pago.</li>
                                <li>Reporte a centrales de riesgo con aviso de 20 días.</li>
                                <li>Reclamos de facturación: No debe pagar las sumas reclamadas mientras se resuelve.</li>
                            </ul>
                        </div>

                        <!-- Otros -->
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                                <h4 class="font-bold text-[10px] text-slate-800 uppercase mb-1">Cambio Domicilio</h4>
                                <p class="text-[10px] text-slate-500">Posible si hay viabilidad técnica. Costo de materiales a cargo del usuario.</p>
                            </div>
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                                <h4 class="font-bold text-[10px] text-slate-800 uppercase mb-1">Reconexión</h4>
                                <p class="text-[10px] text-slate-500">Costo: $20.000 (solo costos operativos).</p>
                            </div>
                            <div class="col-span-2 bg-slate-50 p-3 rounded-xl border border-slate-100">
                                <h4 class="font-bold text-[10px] text-slate-800 uppercase mb-1">Larga Distancia</h4>
                                <p class="text-[10px] text-slate-500">Usamos el operador que usted elija marcando su código respectivo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 3: OBLIGACIONES Y LEGAL (Actualizada) -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-30 pt-10 transition-all duration-500 ease-out origin-top">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-10 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                <div class="text-center mb-8">
                    <h2 class="text-slate-500 font-bold tracking-widest uppercase text-sm mb-2">Paso 3: Marco Legal</h2>
                    <p class="text-3xl font-extrabold text-slate-900">
                        Obligaciones y Anexos
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                    <!-- Obligaciones -->
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-sm">📋</span>
                            Principales Obligaciones
                        </h3>
                        <ul class="space-y-2">
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">1.</span> Pagar oportunamente los servicios e intereses de mora.</li>
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">2.</span> Suministrar información verdadera.</li>
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">3.</span> Hacer uso adecuado de equipos y servicios.</li>
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">4.</span> No divulgar ni acceder a pornografía infantil.</li>
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">5.</span> Avisar a autoridades sobre robo de elementos de red.</li>
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">6.</span> No cometer fraude.</li>
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">7.</span> Hacer uso adecuado del derecho a PQR.</li>
                            <li class="flex gap-3 text-xs text-slate-600"><span class="text-primary font-bold">8.</span> Actuar de buena fe.</li>
                        </ul>
                    </div>

                    <!-- Anexos Legales (Acordeón) -->
                    <div class="space-y-3">
                        <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-sm">⚖️</span>
                            Anexos Legales
                        </h3>
                        
                        <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                            <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                                <span>Disposiciones Generales</span>
                                <span class="transition group-open:rotate-180">▼</span>
                            </summary>
                            <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-32 overflow-y-auto custom-scrollbar">
                                <p class="mb-2"><strong>Obligaciones Usuario:</strong> Permitir ingreso de personal INTALNET para auditorias/mantenimiento. Responder por daño en equipos. Devolver equipos al terminar contrato. No realizar conexiones fraudulentas (Phishing, Spamming).</p>
                                <p class="mb-2"><strong>Equipos:</strong> Son propiedad de INTALNET (comodato). El usuario responde por custodia. Deben devolverse al terminar.</p>
                                <p><strong>Velocidad:</strong> Factores limitantes: Latencia, congestión, uso de WiFi, consumo excesivo de ancho de banda.</p>
                            </div>
                        </details>

                        <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                            <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                                <span>Habeas Data (Anexo 1)</span>
                                <span class="transition group-open:rotate-180">▼</span>
                            </summary>
                            <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-32 overflow-y-auto custom-scrollbar">
                                <p>Autoriza a INTALNET a consultar/reportar en centrales de riesgo. Autoriza tratamiento de datos sensibles (huella/voz/rostro) para validar identidad. Derecho a conocer, actualizar y rectificar datos (Ley 1581/2012).</p>
                            </div>
                        </details>

                        <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                            <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                                <span>Pornografía Infantil (Anexo 2)</span>
                                <span class="transition group-open:rotate-180">▼</span>
                            </summary>
                            <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-32 overflow-y-auto custom-scrollbar">
                                <p>El usuario declara conocer normas que prohíben pornografía infantil (Ley 679/2001). Se obliga a prevenir acceso de menores a dichos contenidos y a no alojar/distribuir material ilegal. Obligación de denunciar.</p>
                            </div>
                        </details>

                        <details class="group bg-white/50 rounded-xl border border-white/60 overflow-hidden">
                            <summary class="flex justify-between items-center p-3 font-bold cursor-pointer list-none text-xs text-slate-800 bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                                <span>SARLAFT</span>
                                <span class="transition group-open:rotate-180">▼</span>
                            </summary>
                            <div class="p-3 text-[10px] text-slate-500 leading-relaxed h-32 overflow-y-auto custom-scrollbar">
                                <p>Terminación automática si el usuario es relacionado con lavado de activos/terrorismo. Obligación de actualizar información anualmente.</p>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 4: DIRECTORIO Y CANALES (ACTUALIZADA con Información Detallada del Documento) -->
        <div class="stacking-card lg:sticky lg:top-[120px] z-40 pt-10 transition-all duration-500 ease-out origin-top pb-20">
            <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[3rem] p-8 md:p-12 shadow-2xl shadow-slate-300/40 mx-4 md:mx-0 ring-1 ring-white/40">
                
                <div class="text-center mb-10">
                    <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-3">Paso 4: Directorio</h2>
                    <p class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                        Canales y Centros de Atención
                    </p>
                    <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                        Radica tus PQR a través de nuestros canales presenciales y electrónicos. Te garantizamos atención completa y sin cláusulas de permanencia.
                    </p>
                </div>

                <!-- INFO DE CONTACTO PRINCIPAL -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                     <!-- Línea Telefónica -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Línea de Atención</p>
                            <p class="text-xl font-extrabold text-slate-900">322 580 2429</p>
                        </div>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Correo PQR</p>
                            <a href="mailto:pqr@intalnet.com" class="text-lg font-bold text-slate-900 hover:text-primary transition-colors">pqr@intalnet.com</a>
                        </div>
                    </div>

                    <!-- Web -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center gap-4 md:col-span-2 lg:col-span-1">
                        <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Trámites Web</p>
                            <p class="text-sm font-semibold text-slate-700">Formulario PQR 24/7</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Directorio de Oficinas -->
                    <div class="lg:col-span-8 space-y-4">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="flex h-3 w-3 rounded-full bg-green-500 shadow-lg shadow-green-500/30"></span>
                            <h3 class="text-xl font-bold text-slate-900">Ubicación Oficinas Físicas</h3>
                        </div>

                        <!-- Card Montería (Principal) -->
                        <div class="bg-gradient-to-r from-slate-50 to-white border border-slate-200 p-6 rounded-2xl relative overflow-hidden group hover:shadow-md transition-all">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-primary/5 rounded-full -mr-10 -mt-10"></div>
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 relative z-10">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="font-bold text-lg text-primary">Montería</h4>
                                        <span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Sede Principal</span>
                                    </div>
                                    <p class="text-slate-700 font-medium text-sm flex items-center gap-2">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        Cr. 25 No. 23-74 Calle la Pradera
                                    </p>
                                </div>
                                <div class="text-right md:text-right text-sm text-slate-500 bg-white/50 p-2 rounded-lg border border-slate-100">
                                    <p><span class="font-bold text-slate-700">Lun-Vie:</span> 8am-12pm & 2pm-6pm</p>
                                    <p><span class="font-bold text-slate-700">Sábados:</span> 8am-12pm</p>
                                </div>
                            </div>
                        </div>

                        <!-- Grid de otras oficinas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Tierralta -->
                            <div class="bg-white border border-slate-100 p-5 rounded-xl hover:border-primary/30 transition-colors">
                                <h4 class="font-bold text-slate-800 mb-2">Tierralta</h4>
                                <p class="text-xs text-slate-600 mb-1 flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Cr. 13 # 5-31 Barrio El Prado
                                </p>
                                <p class="text-xs text-slate-500 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    311 393 4218
                                </p>
                            </div>

                            <!-- Valencia -->
                            <div class="bg-white border border-slate-100 p-5 rounded-xl hover:border-primary/30 transition-colors">
                                <h4 class="font-bold text-slate-800 mb-2">Valencia</h4>
                                <p class="text-xs text-slate-600 mb-1 flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Carrera 14 # 12-26 Barrio Centro
                                </p>
                                <p class="text-xs text-slate-500 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    315 252 2215
                                </p>
                            </div>

                            <!-- San Pedro -->
                            <div class="bg-white border border-slate-100 p-5 rounded-xl hover:border-primary/30 transition-colors">
                                <h4 class="font-bold text-slate-800 mb-2">San Pedro</h4>
                                <p class="text-xs text-slate-600 mb-1 flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Calle 49 No 45-00 Barrio Alfonso López
                                </p>
                                <p class="text-xs text-slate-500 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    313 574 5320
                                </p>
                            </div>

                            <!-- Puerto Libertador -->
                            <div class="bg-white border border-slate-100 p-5 rounded-xl hover:border-primary/30 transition-colors">
                                <h4 class="font-bold text-slate-800 mb-2">Puerto Libertador</h4>
                                <p class="text-xs text-slate-600 mb-1 flex items-start gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Carrera 10 # 11-20 Barrio Camilo Jiménez
                                </p>
                                <p class="text-xs text-slate-500 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    321 791 5903
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Información Adicional Lateral -->
                    <div class="lg:col-span-4 space-y-4">
                        <!-- Cláusula de Permanencia -->
                        <div class="bg-indigo-50/50 rounded-2xl p-6 border border-indigo-100/50">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h4 class="font-bold text-slate-900 text-sm">Libertad Contractual</h4>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed mb-2">
                                En Intalnet <strong>no aplica cláusula de permanencia mínima</strong>. Eres libre de modificar o cancelar tus servicios sin penalidades.
                            </p>
                        </div>

                        <!-- Control Parental -->
                        <div class="bg-orange-50/50 rounded-2xl p-6 border border-orange-100/50">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <h4 class="font-bold text-slate-900 text-sm">Control Parental</h4>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Protege a los menores. Solicita la guía de configuración para bloqueo de contenidos en TV e Internet a través de nuestros canales.
                            </p>
                        </div>
                        
                        <!-- Instrucción Correo -->
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                             <h4 class="font-bold text-slate-800 text-xs uppercase mb-2">Instrucción PQR por Correo</h4>
                             <p class="text-xs text-slate-500 mb-2">Para agilizar tu solicitud vía email, usa este asunto:</p>
                             <div class="bg-white p-2 rounded border border-slate-200 text-[10px] font-mono text-slate-600">
                                Asunto: Tipo de Solicitud - Cédula
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