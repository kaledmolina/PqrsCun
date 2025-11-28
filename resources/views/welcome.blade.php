@extends('layouts.pqrs')

@section('title', 'Inicio')

@section('content')
<div class="text-center">
    @if (session('success_cun'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">¡Solicitud Radicada!</span> Su código CUN es: <strong>{{ session('success_cun') }}</strong>. Por favor guárdelo para futuras consultas.
        </div>
    @endif

    <h1 class="text-4xl font-bold text-gray-900 mb-4">Bienvenido al Sistema de PQRS</h1>
    <p class="text-xl text-gray-600 mb-8">Gestione sus Peticiones, Quejas, Reclamos y Sugerencias de manera fácil y rápida.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
        <a href="{{ route('pqrs.create') }}" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-50">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Registrar PQRS</h5>
            <p class="font-normal text-gray-700">Radique una nueva solicitud. Recibirá un código CUN para su seguimiento.</p>
        </a>
        <a href="{{ route('pqrs.consult') }}" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-50">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Consultar Estado</h5>
            <p class="font-normal text-gray-700">Verifique el estado de su solicitud utilizando su código CUN.</p>
        </a>
    </div>
</div>
@endsection
