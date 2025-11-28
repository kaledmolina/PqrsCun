@extends('layouts.pqrs')

@section('title', 'Consultar PQRS')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">Consultar Estado de PQRS</h1>
        <p class="mt-2 text-gray-600">Ingrese el código CUN para verificar el estado de su solicitud.</p>
    </div>

    <livewire:consult-pqrs />
</div>
@endsection
