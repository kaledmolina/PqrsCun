<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Search Box -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Consultar Estado de Solicitud</h2>
            <form wire:submit="search" class="max-w-xl mx-auto">
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" wire:model="data.cun" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 sm:text-lg border-gray-300 rounded-md p-3 border" placeholder="Ingrese su código CUN (ej: 4436-24-0000000001)">
                </div>
                @error('data.cun') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                
                <div class="mt-4 flex justify-center">
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <span wire:loading.remove>Consultar</span>
                        <span wire:loading>Buscando...</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Not Found Alert -->
        @if ($notFound)
            <div class="rounded-md bg-red-50 p-4 border border-red-200 animate-fade-in-up">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">No encontrado</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <p>No se encontró ninguna PQRS con el código CUN ingresado. Por favor verifique e intente nuevamente.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Result Card -->
        @if ($pqrs)
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100 animate-fade-in-up">
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Detalles de la Solicitud</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">CUN: <span class="font-mono font-bold text-gray-700">{{ $pqrs->cun }}</span></p>
                    </div>
                    <div>
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                            {{ match($pqrs->status) {
                                'pending' => 'bg-gray-100 text-gray-800',
                                'in_progress' => 'bg-yellow-100 text-yellow-800',
                                'resolved' => 'bg-green-100 text-green-800',
                                'closed' => 'bg-blue-100 text-blue-800',
                                default => 'bg-gray-100 text-gray-800'
                            } }}">
                            {{ match($pqrs->status) {
                                'pending' => 'Pendiente',
                                'in_progress' => 'En Progreso',
                                'resolved' => 'Resuelto',
                                'closed' => 'Cerrado',
                                default => 'Desconocido'
                            } }}
                        </span>
                    </div>
                </div>
                <div class="px-6 py-5">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Tipo de Solicitud</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-medium">
                                {{ match($pqrs->type) {
                                    'peticion' => 'Petición',
                                    'queja' => 'Queja',
                                    'apelacion' => 'Recurso de Apelación',
                                    'reposicion' => 'Recurso de Reposición',
                                    default => ucfirst($pqrs->type)
                                } }}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Fecha de Radicación</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $pqrs->created_at->format('d/m/Y h:i A') }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Motivo</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $pqrs->motive }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                            <dd class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded-md border border-gray-100">
                                {{ $pqrs->description }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        @endif
    </div>
</div>
