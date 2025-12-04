<div class="px-4 py-6 bg-gray-50 border-b border-gray-200">
    <div class="flex items-start gap-4">
        <div class="flex-shrink-0 w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center text-xl border border-gray-100">
            📝
        </div>
        <div class="flex-grow">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-bold text-gray-900">
                    {{ $this->getOwnerRecord()->first_name }} {{ $this->getOwnerRecord()->last_name }}
                </h3>
                <span class="text-xs text-gray-500">
                    {{ $this->getOwnerRecord()->created_at->format('d M, Y h:i A') }}
                </span>
            </div>
            
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm text-sm text-gray-700">
                {{ $this->getOwnerRecord()->description }}
            </div>

            @if($this->getOwnerRecord()->attachments)
                <div class="mt-3 flex gap-2">
                    @foreach($this->getOwnerRecord()->attachments as $attachment)
                        <div class="inline-flex gap-1">
                            <a href="{{ Storage::url($attachment) }}" target="_blank" class="inline-flex items-center gap-1 px-2 py-1 bg-white border border-gray-200 rounded text-xs font-medium text-gray-600 hover:bg-gray-50 transition-colors">
                                <x-heroicon-m-eye class="w-3 h-3" />
                                Ver
                            </a>
                            <a href="{{ Storage::url($attachment) }}" download class="inline-flex items-center gap-1 px-2 py-1 bg-white border border-gray-200 rounded text-xs font-medium text-gray-600 hover:bg-gray-50 transition-colors">
                                <x-heroicon-m-arrow-down-tray class="w-3 h-3" />
                                Descargar
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
