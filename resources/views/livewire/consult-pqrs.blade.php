<div class="max-w-4xl mx-auto py-10 px-4">
    
    <x-header title="Consulta tu Solicitud" subtitle="Ingresa tu código CUN para ver el estado." size="text-3xl" separator />

    <!-- Search Box -->
    <x-card class="mb-10 shadow-lg">
        <x-form wire:submit="search">
            <x-input 
                label="Código CUN" 
                placeholder="Ej: 4436-24-0000000001" 
                wire:model="data.cun" 
                icon="o-magnifying-glass"
            >
                <x-slot:append>
                    <x-button label="Consultar" icon="o-magnifying-glass" class="btn-primary rounded-l-none" type="submit" spinner="search" />
                </x-slot:append>
            </x-input>
        </x-form>
    </x-card>

    <!-- Not Found Alert -->
    @if ($notFound)
        <x-alert icon="o-exclamation-triangle" title="No encontrado" description="No hemos encontrado ninguna solicitud con ese código CUN." class="alert-error mb-8" />
    @endif

    <!-- Result Card -->
    @if ($pqrs)
        <x-card title="Detalles de la Solicitud" subtitle="Radicado: {{ $pqrs->cun }}" class="shadow-xl border border-base-200">
            <x-slot:menu>
                <div class="badge {{ match($pqrs->status) {
                    'pending' => 'badge-warning',
                    'in_progress' => 'badge-info',
                    'resolved' => 'badge-success',
                    'closed' => 'badge-ghost',
                    default => 'badge-ghost'
                } }} p-3 font-bold">
                    {{ match($pqrs->status) {
                        'pending' => 'Pendiente',
                        'in_progress' => 'En Progreso',
                        'resolved' => 'Resuelto',
                        'closed' => 'Cerrado',
                        default => 'Desconocido'
                    } }}
                </div>
            </x-slot:menu>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <div class="text-xs text-gray-500 font-bold uppercase">Tipo</div>
                    <div class="flex items-center gap-2 text-lg">
                        <x-icon name="o-tag" class="w-5 h-5 text-primary" />
                        {{ ucfirst($pqrs->type) }}
                    </div>
                </div>
                <div>
                    <div class="text-xs text-gray-500 font-bold uppercase">Fecha</div>
                    <div class="flex items-center gap-2 text-lg">
                        <x-icon name="o-calendar" class="w-5 h-5 text-primary" />
                        {{ $pqrs->created_at->format('d/m/Y h:i A') }}
                    </div>
                </div>
                @if($pqrs->motive)
                <div class="col-span-2">
                    <div class="text-xs text-gray-500 font-bold uppercase">Motivo</div>
                    <div>{{ $pqrs->motive }}</div>
                </div>
                @endif
            </div>

            <div class="bg-base-200 p-4 rounded-lg">
                <div class="text-xs text-gray-500 font-bold uppercase mb-2">Descripción</div>
                <p class="text-base-content">{{ $pqrs->description }}</p>
            </div>
        </x-card>

        <!-- Timeline & Messages -->
        <div class="mt-10">
            <x-header title="Historial de Mensajes" size="text-2xl" separator />

            <div class="space-y-6 mt-6">
                @forelse ($pqrs->messages as $message)
                    <div class="chat {{ $message->role === 'client' ? 'chat-end' : 'chat-start' }}">
                        <div class="chat-header">
                            {{ $message->role === 'client' ? 'Tú' : 'Administrador' }}
                            <time class="text-xs opacity-50">{{ $message->created_at->format('d/m/Y H:i') }}</time>
                        </div>
                        <div class="chat-bubble {{ $message->role === 'client' ? 'chat-bubble-primary' : 'chat-bubble-secondary' }}">
                            {!! $message->content !!}
                            
                            @if($message->attachments)
                                <div class="mt-2 pt-2 border-t border-white/20">
                                    <p class="text-xs font-bold mb-1">Adjuntos:</p>
                                    <ul class="list-disc list-inside text-xs">
                                        @foreach($message->attachments as $attachment)
                                            <li>
                                                <a href="{{ Storage::url($attachment) }}" target="_blank" class="underline hover:text-white">
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
                    <div class="text-center text-gray-500 italic">No hay mensajes en el historial.</div>
                @endforelse
            </div>

            <!-- Reply Form -->
            @if(!in_array($pqrs->status, ['resolved', 'closed']))
                <x-card class="mt-10 bg-base-100 shadow-lg" title="Enviar Respuesta">
                    <x-form wire:submit="submitReply">
                        <x-textarea 
                            label="Mensaje" 
                            wire:model="replyContent" 
                            placeholder="Escribe tu respuesta aquí..." 
                            rows="4"
                        />
                        
                        <x-file 
                            label="Adjuntar Archivos" 
                            wire:model="replyAttachments" 
                            multiple 
                        />

                        <x-slot:actions>
                            <x-button label="Enviar Respuesta" class="btn-primary" type="submit" spinner="submitReply" icon="o-paper-airplane" />
                        </x-slot:actions>
                    </x-form>
                </x-card>
            @endif
        </div>
    @endif
</div>
