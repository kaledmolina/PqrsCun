@extends('layouts.pqrs')

@section('title', 'Inicio')

@section('content')
<div class="relative overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>

            <div class="relative pt-6 px-4 sm:px-6 lg:px-8"></div>

            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Centro de Atención</span>
                        <span class="block text-blue-600 xl:inline">al Usuario</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Estamos comprometidos con brindarle el mejor servicio. Utilice nuestra plataforma para radicar sus peticiones, quejas, reclamos o sugerencias de manera ágil y segura.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('pqrs.create') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg transition-colors">
                                Radicar PQRS
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="{{ route('pqrs.consult') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg transition-colors">
                                Consultar Estado
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="Customer Support">
    </div>
</div>

<!-- CUN Info Section -->
<div class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center mb-12">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Información Importante</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Código Único Numérico (CUN)
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">¿Para qué sirve el CUN?</h3>
                <p class="text-gray-600 mb-6">
                    El código asignado le permitirá al usuario (i) saber desde el inicio con qué número se identificará su trámite hasta que culmine el mismo y, (ii) hacer el seguimiento del estado actualizado de la petición, queja, recurso o solicitud de indemnización (en el caso de los operadores postales), a través de la consulta interactiva, línea de atención gratuita o centros de atención al cliente.
                </p>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-500 flex items-center gap-1">
                    Continuar leyendo
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Servicio en Línea CUN</h3>
                <p class="text-gray-600 mb-6">
                    El CUN (Código Único Numérico) tiene como objetivo ser un número único a nivel nacional para procesar la apelación del usuario y realizar el correspondiente seguimiento de su queja, petición o recurso de reposición del servicio proveído por el proveedor de servicios de telecomunicaciones y operador de servicios postales.
                </p>
                <a href="{{ route('pqrs.consult') }}" class="text-blue-600 font-medium hover:text-blue-500 flex items-center gap-1">
                    Visite Servicio en Línea CUN
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Related Sites Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center mb-12">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Enlaces de Interés</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Sitios Relacionados
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                La ley 1507 de 2012 redistribuyó las competencias de la otrora CNTV entre la ANTV, la Agencia Nacional del Espectro ANE y la Comisión de Regulación de Comunicaciones CRC.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="https://www.crcom.gov.co" target="_blank" class="group block p-6 bg-slate-50 rounded-xl hover:bg-blue-50 transition-colors">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-700 mb-2">Comisión de Regulación de Comunicaciones</h3>
                <p class="text-sm text-gray-600">Es encargado de promover la competencia, evitar el abuso de posición dominante y regular los mercados de las redes y los servicios de comunicaciones.</p>
            </a>

            <a href="https://www.mintic.gov.co" target="_blank" class="group block p-6 bg-slate-50 rounded-xl hover:bg-blue-50 transition-colors">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-700 mb-2">Ministerio TIC</h3>
                <p class="text-sm text-gray-600">Entidad que se encarga de diseñar, adoptar y promover las políticas, planes, programas y proyectos del sector de las Tecnologías de la Información y las Comunicaciones.</p>
            </a>

            <a href="#" class="group block p-6 bg-slate-50 rounded-xl hover:bg-blue-50 transition-colors">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-700 mb-2">Autoridad Nacional de Televisión</h3>
                <p class="text-sm text-gray-600">Brinda las herramientas para la ejecución de los planes y programas de la prestación del servicio público de televisión.</p>
            </a>
        </div>
    </div>
</div>

<!-- Legal & Info Grid -->
<div class="bg-slate-900 text-slate-300 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
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
    </div>
</div>
@endsection
