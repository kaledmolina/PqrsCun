<div class="animate-fade-in">
    <!-- Hero Search Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4 tracking-tight">
            Consulta tu <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Solicitud</span>
        </h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-8">
            Ingresa el código CUN asignado para ver el estado y responder a tu caso.
        </p>

        <!-- Search Box -->
        <div class="max-w-xl mx-auto relative group z-10">
            <div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
            <form wire:submit="search" class="relative bg-white rounded-2xl shadow-xl p-2 flex items-center">
                <div class="flex-grow relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" wire:model="data.cun" class="w-full pl-12 pr-4 py-3 bg-transparent border-none focus:ring-0 text-slate-800 placeholder-slate-400 text-lg font-medium" placeholder="Ingresa tu código CUN (Ej: 1234-56...)">
                </div>
                <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-slate-800 transition-colors shadow-lg shadow-primary/20 flex items-center gap-2">
                    <span wire:loading.remove wire:target="search">Buscar</span>
                    <span wire:loading wire:target="search">...</span>
                </button>
            </form>
            @error('data.cun') <span class="text-red-500 text-sm mt-2 block font-medium">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Results Section -->
    <div class="max-w-5xl mx-auto">
        @if($notFound)
            <div class="bg-red-50 border border-red-100 rounded-2xl p-6 text-center animate-slide-up">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-red-900 mb-2">No encontramos ese código</h3>
                <p class="text-red-600">Verifica que el CUN esté escrito correctamente e intenta nuevamente.</p>
            </div>
        @endif

        @if($pqrs)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slide-up">
                <!-- Sidebar: Details -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 p-6 sticky top-24">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-slate-900">Detalles del Caso</h3>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 uppercase tracking-wider">
                                @switch($pqrs->status)
                                    @case('pending') Pendiente @break
                                    @case('in_progress') En Progreso @break
                                    @case('resolved') Resuelto @break
                                    @case('closed') Cerrado @break
                                    @default({{ $pqrs->status }})
                                @endswitch
                            </span>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">{{ $pqrs->type === 'sugerencia' ? 'Radicado' : 'Código CUN' }}</p>
                                <p class="text-lg font-mono font-bold text-primary">{{ $pqrs->cun }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Tipo</p>
                                <p class="text-slate-700 font-medium capitalize">{{ $pqrs->type }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Solicitante</p>
                                <p class="text-slate-700 font-medium">{{ $pqrs->first_name }} {{ $pqrs->last_name }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Fecha de Radicación</p>
                                <p class="text-slate-700 font-medium">{{ $pqrs->created_at->format('d M, Y h:i A') }}</p>
                            </div>
                             <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Descripción Inicial</p>
                                <p class="text-slate-600 text-sm leading-relaxed bg-slate-50 p-3 rounded-xl border border-slate-100">
                                    {{ $pqrs->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main: Timeline & Chat -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden flex flex-col h-[700px]">
                        <!-- Header -->
                        <div class="p-6 border-b border-slate-100 bg-surface-50 flex items-center gap-3">
                            <div class="w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center text-xl">💬</div>
                            <div>
                                <h3 class="font-bold text-slate-900">Historial de Mensajes</h3>
                                <p class="text-xs text-slate-500">Comunicación oficial con soporte</p>
                            </div>
                        </div>

                        <!-- Messages Area -->
                        <div class="flex-grow overflow-y-auto p-6 space-y-6 bg-slate-50/50" wire:poll.5s>
                            <!-- Initial Message -->
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 w-8 h-8 bg-slate-200 rounded-full flex items-center justify-center text-slate-500 text-xs font-bold">YO</div>
                                <div class="max-w-[80%]">
                                    <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm border border-slate-100 text-slate-700 text-sm">
                                        {{ $pqrs->description }}
                                    </div>
                                    <p class="text-xs text-slate-400 mt-1 ml-2">{{ $pqrs->created_at->format('h:i A') }}</p>
                                </div>
                            </div>

                            @foreach($pqrs->messages as $message)
                                <div class="flex gap-4 {{ $message->role === 'admin' ? 'flex-row-reverse' : '' }}">
                                    <div class="flex-shrink-0 w-8 h-8 {{ $message->role === 'admin' ? 'bg-primary text-white' : 'bg-slate-200 text-slate-500' }} rounded-full flex items-center justify-center text-xs font-bold">
                                        {{ $message->role === 'admin' ? 'SOP' : 'YO' }}
                                    </div>
                                    <div class="max-w-[80%]">
                                        <div class="p-4 rounded-2xl shadow-sm text-sm {{ $message->role === 'admin' ? 'bg-primary text-white rounded-tr-none' : 'bg-white text-slate-700 border border-slate-100 rounded-tl-none' }}">
                                            {!! $message->content !!}
                                            
                                            @if($message->attachments)
                                                <div class="mt-3 pt-3 border-t {{ $message->role === 'admin' ? 'border-white/20' : 'border-slate-100' }}">
                                                    <p class="text-xs font-bold mb-2 opacity-75">Adjuntos:</p>
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach($message->attachments as $attachment)
                                                            <a href="{{ Storage::url($attachment) }}" target="_blank" class="flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-medium {{ $message->role === 'admin' ? 'bg-white/20 hover:bg-white/30 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }} transition-colors">
                                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                                Ver
                                                            </a>
                                                            <a href="{{ Storage::url($attachment) }}" download class="flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-medium {{ $message->role === 'admin' ? 'bg-white/20 hover:bg-white/30 text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }} transition-colors">
                                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                                Descargar
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <p class="text-xs text-slate-400 mt-1 {{ $message->role === 'admin' ? 'text-right mr-2' : 'ml-2' }}">{{ $message->created_at->format('d M, h:i A') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Reply Area -->
                        @if($pqrs->status !== 'closed')
                            <div class="p-4 bg-white border-t border-slate-100">
                                @if(session()->has('message_sent'))
                                    <div class="mb-4 p-3 bg-green-50 text-green-700 text-sm rounded-xl flex items-center gap-2 animate-fade-in">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        {{ session('message_sent') }}
                                    </div>
                                @endif

                                <form wire:submit="submitReply" class="relative">
                                    <div class="relative">
                                        <textarea wire:model="replyContent" rows="3" class="w-full pl-4 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none text-sm" placeholder="Escribe tu respuesta aquí..."></textarea>
                                        
                                        <!-- Attachment Button -->
                                        <div class="absolute bottom-3 right-3">
                                            <label class="cursor-pointer p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-full transition-colors block" title="Adjuntar archivo">
                                                <input type="file" wire:model="replyAttachments" multiple class="hidden">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                            </label>
                                        </div>
                                    </div>

                                    @if($replyAttachments)
                                        <div class="mt-2 flex gap-2 overflow-x-auto py-1">
                                            @foreach($replyAttachments as $file)
                                                <div class="flex items-center gap-1 px-2 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-medium whitespace-nowrap">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                    {{ $file->getClientOriginalName() }}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="mt-3 flex justify-between items-center">
                                        <div class="text-xs text-slate-400">
                                            <span wire:loading wire:target="replyAttachments">Subiendo archivos...</span>
                                        </div>
                                        <button type="submit" class="bg-primary text-white px-6 py-2 rounded-xl font-bold text-sm hover:bg-slate-800 transition-colors shadow-lg shadow-primary/20 flex items-center gap-2">
                                            <span wire:loading.remove wire:target="submitReply">Enviar Respuesta</span>
                                            <span wire:loading wire:target="submitReply">Enviando...</span>
                                            <svg wire:loading.remove wire:target="submitReply" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="p-6 bg-gray-50 border-t border-slate-100 text-center">
                                <p class="text-slate-500 text-sm">Este caso ha sido cerrado. Si necesitas más ayuda, por favor crea una nueva solicitud.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
