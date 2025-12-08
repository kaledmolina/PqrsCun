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

        @if(!$pqrs)
            <!-- Help Center Section -->
            <div class="mt-16 animate-fade-in">
                <!-- Where is my CUN? -->
                <div class="bg-white/60 backdrop-blur-xl border border-white/50 rounded-[2rem] p-8 md:p-12 shadow-xl mb-12">
                    <div class="flex flex-col md:flex-row items-center gap-8">
                        <div class="md:w-1/2">
                            <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-wider mb-4">
                                <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
                                Guía de Ayuda
                            </div>
                            <h2 class="text-3xl font-bold text-slate-900 mb-4">¿Dónde encuentro mi CUN?</h2>
                            <p class="text-slate-600 leading-relaxed mb-6">
                                El <strong>Código Único Numérico</strong> es enviado automáticamente a tu correo electrónico al momento de radicar tu solicitud.
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3 text-sm text-slate-700">
                                    <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xs">✓</div>
                                    Revisa tu bandeja de entrada y spam
                                </li>
                                <li class="flex items-center gap-3 text-sm text-slate-700">
                                    <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-xs">✓</div>
                                    Busca el asunto "Confirmación de Radicado"
                                </li>
                            </ul>
                        </div>
                        <div class="md:w-1/2 relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-2xl blur-xl opacity-20"></div>
                            <div class="relative bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
                                <div class="flex items-center gap-3 mb-4 border-b border-slate-100 pb-4">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-500">📧</div>
                                    <div>
                                        <p class="text-xs text-slate-400 font-bold">Asunto</p>
                                        <p class="text-sm font-bold text-slate-800">Confirmación de Radicado - Intalnet</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="h-2 bg-slate-100 rounded w-3/4"></div>
                                    <div class="h-2 bg-slate-100 rounded w-full"></div>
                                    <div class="h-2 bg-slate-100 rounded w-5/6"></div>
                                </div>
                                <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-100 flex items-center gap-3">
                                    <div class="w-8 h-8 bg-white rounded flex items-center justify-center font-mono font-bold text-primary text-xs border border-blue-100">
                                        1234
                                    </div>
                                    <p class="text-xs text-blue-800 font-medium">Tu CUN es: <span class="font-bold">1234-5678-90</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alternative Channels & FAQs -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Channels -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold text-slate-900 mb-6">Canales de Atención</h3>
                        <a href="tel:018000123456" class="flex items-center gap-4 p-4 bg-white rounded-2xl border border-slate-100 hover:shadow-md transition-all group">
                            <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Línea Gratuita</h4>
                                <p class="text-sm text-slate-500">01 8000 123 456</p>
                            </div>
                        </a>
                        <a href="mailto:contacto@intalnet.com" class="flex items-center gap-4 p-4 bg-white rounded-2xl border border-slate-100 hover:shadow-md transition-all group">
                            <div class="w-12 h-12 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Correo Electrónico</h4>
                                <p class="text-sm text-slate-500">contacto@intalnet.com</p>
                            </div>
                        </a>
                    </div>

                    <!-- FAQs -->
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-6">Preguntas Frecuentes</h3>
                        <div class="space-y-3">
                            <div x-data="{ open: false }" class="bg-white rounded-xl border border-slate-100 overflow-hidden">
                                <button @click="open = !open" class="w-full flex items-center justify-between p-4 text-left font-bold text-slate-800 text-sm hover:bg-slate-50 transition-colors">
                                    ¿Cuánto tarda la respuesta?
                                    <svg class="w-4 h-4 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open" class="p-4 pt-0 text-xs text-slate-600 leading-relaxed">
                                    El tiempo máximo legal es de 15 días hábiles. Si no respondemos en ese plazo, aplica el silencio administrativo positivo.
                                </div>
                            </div>
                            <div x-data="{ open: false }" class="bg-white rounded-xl border border-slate-100 overflow-hidden">
                                <button @click="open = !open" class="w-full flex items-center justify-between p-4 text-left font-bold text-slate-800 text-sm hover:bg-slate-50 transition-colors">
                                    ¿Puedo apelar la decisión?
                                    <svg class="w-4 h-4 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="open" class="p-4 pt-0 text-xs text-slate-600 leading-relaxed">
                                    Sí. Si no estás de acuerdo con la respuesta, puedes interponer un recurso de reposición y en subsidio apelación dentro de los 10 días siguientes.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            
                            @if(!$pqrs->rating && $pqrs->status !== 'closed')
                                <button wire:click="openSurvey" class="w-full py-3 bg-yellow-400 text-yellow-900 font-bold rounded-xl hover:bg-yellow-300 transition-colors shadow-lg shadow-yellow-400/20 flex items-center justify-center gap-2">
                                    <span class="text-xl">⭐</span>
                                    Calificar Atención
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Survey Modal -->
                @if($showSurvey)
                    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4 animate-fade-in">
                        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8 text-center relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-400 to-emerald-500"></div>
                            
                            <div class="mb-6">
                                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce-slow">
                                    <span class="text-4xl">⭐</span>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-2">¡Tu opinión nos importa!</h3>
                                <p class="text-slate-600">Ayúdanos a mejorar calificando la atención recibida.</p>
                            </div>

                            <form wire:submit.prevent="rateService" class="space-y-6">
                                <div class="flex justify-center gap-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button" wire:click="$set('rating', {{ $i }})" class="text-3xl transition-transform hover:scale-110 focus:outline-none {{ $rating >= $i ? 'text-yellow-400' : 'text-slate-200' }}">
                                            ★
                                        </button>
                                    @endfor
                                </div>
                                @error('rating') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror

                                <textarea wire:model="feedback" rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="¿Algún comentario adicional? (Opcional)"></textarea>
                                @error('feedback') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror

                                <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-bold hover:bg-slate-800 transition-colors shadow-lg shadow-primary/20">
                                    Enviar Calificación
                                </button>
                                
                                <button type="button" wire:click="skipSurvey" class="text-slate-400 text-sm hover:text-slate-600 underline">
                                    Omitir por ahora
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

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
                        <div 
                            class="flex-grow overflow-y-auto p-6 space-y-6 bg-slate-50/50" 
                            wire:poll.5s
                            x-data="{
                                scrollToBottom() {
                                    this.$el.scrollTop = this.$el.scrollHeight;
                                }
                            }"
                            x-init="
                                scrollToBottom();
                                new MutationObserver(() => scrollToBottom()).observe($el, { childList: true, subtree: true });
                            "
                        >
                            <!-- Initial Message -->
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 w-8 h-8 bg-slate-200 rounded-full flex items-center justify-center text-slate-500 text-xs font-bold">YO</div>
                                <div class="space-y-1 max-w-[85%]">
                                    <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm border border-slate-100">
                                        <p class="text-slate-700 text-sm">{{ $pqrs->description }}</p>
                                        @if($pqrs->attachments)
                                            <div class="mt-3 pt-3 border-t border-slate-100">
                                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Adjuntos Iniciales</p>
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach($pqrs->attachments as $attachment)
                                                        <a href="{{ Storage::url($attachment) }}" target="_blank" class="flex items-center gap-2 px-3 py-1.5 bg-slate-50 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-100 transition-colors">
                                                            📎 Ver archivo
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <span class="text-[10px] text-slate-400 font-medium ml-2">{{ $pqrs->created_at->format('d M, h:i A') }}</span>
                                </div>
                            </div>

                            @foreach($pqrs->messages as $message)
                                <div class="flex gap-4 {{ $message->role === 'client' ? '' : 'flex-row-reverse' }}">
                                    <div class="flex-shrink-0 w-8 h-8 {{ $message->role === 'client' ? 'bg-slate-200 text-slate-500' : 'bg-primary text-white' }} rounded-full flex items-center justify-center text-xs font-bold">
                                        {{ $message->role === 'client' ? 'YO' : 'SOP' }}
                                    </div>
                                    <div class="space-y-1 max-w-[85%]">
                                        <div class="{{ $message->role === 'client' ? 'bg-white border-slate-100' : 'bg-primary text-white border-primary' }} p-4 rounded-2xl {{ $message->role === 'client' ? 'rounded-tl-none' : 'rounded-tr-none' }} shadow-sm border">
                                            <div class="text-sm {{ $message->role === 'client' ? 'text-slate-700' : 'text-white/90' }} prose {{ $message->role === 'client' ? 'prose-slate' : 'prose-invert' }} max-w-none">
                                                {!! $message->content !!}
                                            </div>
                                            
                                            @if($message->attachments)
                                                <div class="mt-3 pt-3 border-t {{ $message->role === 'client' ? 'border-slate-100' : 'border-white/20' }}">
                                                    <p class="text-xs font-bold {{ $message->role === 'client' ? 'text-slate-400' : 'text-white/60' }} uppercase tracking-wider mb-2">Adjuntos</p>
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach($message->attachments as $attachment)
                                                            <a href="{{ Storage::url($attachment) }}" target="_blank" class="flex items-center gap-2 px-3 py-1.5 {{ $message->role === 'client' ? 'bg-slate-50 text-slate-600 hover:bg-slate-100' : 'bg-white/10 text-white hover:bg-white/20' }} rounded-lg text-xs font-medium transition-colors">
                                                                📎 Ver archivo
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="text-[10px] text-slate-400 font-medium {{ $message->role === 'client' ? 'ml-2' : 'mr-2 text-right block' }}">{{ $message->created_at->format('d M, h:i A') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Reply Area -->
                        <div class="p-4 bg-white border-t border-slate-100">
                            @if(session()->has('message_sent'))
                                <div class="mb-4 p-3 bg-green-50 text-green-700 text-sm rounded-xl flex items-center gap-2 animate-fade-in">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    {{ session('message_sent') }}
                                </div>
                            @endif

                            @if($pqrs->status === 'closed')
                                <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-center">
                                    <p class="text-sm text-slate-800 font-medium">
                                        🔒 Este caso ha sido cerrado
                                    </p>
                                    <p class="text-xs text-slate-500 mt-1">
                                        Si necesitas más ayuda, por favor crea una nueva solicitud.
                                    </p>
                                </div>
                            @elseif($this->canReply())
                                <form wire:submit.prevent="submitReply" class="relative">
                                    <textarea 
                                        wire:model="replyContent" 
                                        rows="3" 
                                        class="w-full pl-4 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none text-sm"
                                        placeholder="Escribe tu respuesta..."
                                    ></textarea>
                                    
                                    <div class="absolute bottom-3 right-3 flex items-center gap-2">
                                        <label class="cursor-pointer p-2 text-slate-400 hover:text-primary hover:bg-slate-100 rounded-lg transition-colors" title="Adjuntar archivos">
                                            <input type="file" wire:model="replyAttachments" multiple class="hidden">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                        </label>
                                        <button type="submit" class="p-2 bg-primary text-white rounded-lg hover:bg-slate-800 transition-colors shadow-lg shadow-primary/20">
                                            <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                        </button>
                                    </div>
                                    
                                    @if($replyAttachments)
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            @foreach($replyAttachments as $attachment)
                                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-50 text-blue-700 text-xs rounded-md">
                                                    📄 {{ $attachment->getClientOriginalName() }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </form>
                            @else
                                <div class="bg-yellow-50 border border-yellow-100 rounded-xl p-4 text-center">
                                    <p class="text-sm text-yellow-800 font-medium">
                                        ⏳ Esperando respuesta del asesor
                                    </p>
                                    <p class="text-xs text-yellow-600 mt-1">
                                        Podrás enviar un nuevo mensaje cuando recibas una respuesta.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
