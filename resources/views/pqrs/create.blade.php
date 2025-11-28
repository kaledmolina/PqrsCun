@extends('layouts.pqrs')

@section('title', 'Registrar PQRS')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Registrar Nueva PQRS</h1>
        <p class="mt-2 text-gray-600">Por favor diligencie el siguiente formulario para radicar su solicitud.</p>
    </div>

    <div class="bg-white shadow-sm rounded-lg p-6 border border-gray-200">
        <livewire:create-pqrs />
    </div>
</div>
@endsection
