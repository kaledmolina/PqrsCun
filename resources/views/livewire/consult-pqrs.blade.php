<div class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">
                Consulta el estado de tu solicitud
            </h1>
            <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">
                En <span class="font-bold text-blue-600">Intalnet</span> trabajamos para darte soluciones. 
                Ingresa tu código CUN para conocer en tiempo real el avance de tu trámite.
            </p>
        </div>

        <!-- Search Box -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-10 border border-slate-100">
            <form wire:submit="search" class="max-w-2xl mx-auto">
                <div class="relative flex items-center">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" wire:model="data.cun" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-12 pr-4 py-4 text-lg border-slate-300 rounded-xl shadow-sm transition-shadow focus:shadow-md" placeholder="Ingresa tu código CUN (ej: 4436-24-0000000001)">
                    <button type="submit" class="absolute right-2 top-2 bottom-2 bg-blue-600 text-white px-6 rounded-lg font-medium hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <span wire:loading.remove>Consultar</span>
                        <span wire:loading>
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
                @error('data.cun') <span class="text-red-500 text-sm mt-2 ml-2 flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</span> @enderror
            </form>
        </div>

        <!-- Not Found Alert -->
        @if ($notFound)
            <div class="rounded-xl bg-red-50 p-6 border border-red-100 animate-fade-in-up shadow-sm">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 bg-red-100 p-2 rounded-full">
                        <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-red-800">No encontramos resultados</h3>
                        <p class="mt-2 text-red-700">
                            No hemos encontrado ninguna solicitud con el código CUN ingresado. 
                            Por favor verifica que el número esté escrito correctamente e inténtalo de nuevo.
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Result Card -->
        @if ($pqrs)
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-100 animate-fade-in-up">
                <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Detalles de tu Solicitud</h3>
                        <p class="mt-1 text-sm text-slate-500">Radicado CUN: <span class="font-mono font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">{{ $pqrs->cun }}</span></p>
                    </div>
                    <div>
                        <span class="px-4 py-2 inline-flex items-center gap-2 text-sm font-bold rounded-full shadow-sm
                            {{ match($pqrs->status) {
                                'pending' => 'bg-yellow-100 text-yellow-800 border border-yellow-200',
                                'in_progress' => 'bg-blue-100 text-blue-800 border border-blue-200',
                                'resolved' => 'bg-green-100 text-green-800 border border-green-200',
                                'closed' => 'bg-slate-100 text-slate-800 border border-slate-200',
                                default => 'bg-gray-100 text-gray-800'
                            } }}">
                            <span class="w-2 h-2 rounded-full {{ match($pqrs->status) {
                                'pending' => 'bg-yellow-500',
                                'in_progress' => 'bg-blue-500',
                                'resolved' => 'bg-green-500',
                                'closed' => 'bg-slate-500',
                                default => 'bg-gray-500'
                            } }}"></span>
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
                <div class="px-8 py-8">
                    <dl class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-slate-500 mb-1">Tipo de Solicitud</dt>
                            <dd class="text-base font-semibold text-slate-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
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
                            <dt class="text-sm font-medium text-slate-500 mb-1">Fecha de Radicación</dt>
                            <dd class="text-base font-semibold text-slate-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $pqrs->created_at->format('d/m/Y h:i A') }}
                            </dd>
                        </div>
                        
                        @if($pqrs->motive)
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-slate-500 mb-1">Motivo</dt>
                            <dd class="text-base text-slate-900">{{ $pqrs->motive }}</dd>
                        </div>
                        @endif

                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-slate-500 mb-2">Descripción de la Solicitud</dt>
                            <dd class="text-base text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-100 leading-relaxed">
                                {{ $pqrs->description }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Timeline & Messages -->
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Historial de Mensajes</h3>

                <div class="space-y-6">
                    @forelse ($pqrs->messages as $message)
                        <div class="flex flex-col {{ $message->role === 'client' ? 'items-end' : 'items-start' }}">
                            <div class="max-w-[80%] rounded-lg p-4 {{ $message->role === 'client' ? 'bg-blue-50 text-blue-900' : 'bg-gray-100 text-gray-900' }}">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="font-bold text-sm">
                                        {{ $message->role === 'client' ? 'Tú' : 'Administrador' }}
                                    </span>
                                    <span class="text-xs opacity-75">
                                        {{ $message->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                                <div class="prose prose-sm max-w-none">
                                    {!! $message->content !!}
                                </div>
                                @if($message->attachments)
                                    <div class="mt-3 pt-3 border-t border-gray-200/50">
                                        <p class="text-xs font-semibold mb-1">Adjuntos:</p>
                                        <ul class="list-disc list-inside text-xs">
                                            @foreach($message->attachments as $attachment)
                                                <li>
                                                    <a href="{{ Storage::url($attachment) }}" target="_blank" class="underline hover:text-blue-600">
                                                        Ver archivo
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 italic py-4">No hay mensajes en el historial.</p>
                    @endforelse
                </div>

                <!-- Reply Form -->
                @if(!in_array($pqrs->status, ['resolved', 'closed']))
                    <div class="mt-8 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Enviar Respuesta</h4>
                        
                        @if (session()->has('message_sent'))
                            <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg">
                                {{ session('message_sent') }}
                            </div>
                        @endif

                        <form wire:submit="submitReply">
                            {{ $this->replyForm }}
                            
                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors duration-200">
                                    Enviar Respuesta
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
