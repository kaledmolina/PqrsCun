<div class="flex flex-col gap-1 py-2 {{ $getRecord()->role === 'admin' ? 'items-end' : 'items-start' }}">
    <div class="flex items-end gap-2 {{ $getRecord()->role === 'admin' ? 'flex-row-reverse' : 'flex-row' }}">
        <!-- Avatar/Role Indicator -->
        <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold {{ $getRecord()->role === 'admin' ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-600' }}">
            {{ $getRecord()->role === 'admin' ? 'SOP' : 'CLI' }}
        </div>

        <!-- Message Bubble -->
        <div class="max-w-2xl p-3 rounded-2xl text-sm shadow-sm {{ $getRecord()->role === 'admin' ? 'bg-primary-600 text-white rounded-tr-none' : 'bg-white border border-gray-200 text-gray-700 rounded-tl-none' }}">
            <div class="prose prose-sm max-w-none {{ $getRecord()->role === 'admin' ? 'text-white prose-headings:text-white prose-a:text-white' : '' }}">
                {!! $getRecord()->content !!}
            </div>

            @if($getRecord()->attachments)
                <div class="mt-2 pt-2 border-t {{ $getRecord()->role === 'admin' ? 'border-white/20' : 'border-gray-100' }}">
                    <p class="text-xs font-bold mb-1 opacity-75">Adjuntos:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($getRecord()->attachments as $attachment)
                            <div class="flex gap-1">
                                <a href="{{ Storage::url($attachment) }}" target="_blank" class="flex items-center gap-1 px-2 py-1 rounded text-xs font-medium {{ $getRecord()->role === 'admin' ? 'bg-white/20 hover:bg-white/30' : 'bg-gray-100 hover:bg-gray-200' }} transition-colors">
                                    <x-heroicon-m-eye class="w-3 h-3" />
                                    Ver
                                </a>
                                <a href="{{ Storage::url($attachment) }}" download class="flex items-center gap-1 px-2 py-1 rounded text-xs font-medium {{ $getRecord()->role === 'admin' ? 'bg-white/20 hover:bg-white/30' : 'bg-gray-100 hover:bg-gray-200' }} transition-colors">
                                    <x-heroicon-m-arrow-down-tray class="w-3 h-3" />
                                    Descargar
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Timestamp -->
    <span class="text-xs text-gray-400 px-10">
        {{ $getRecord()->created_at->format('d M, h:i A') }}
    </span>
</div>
