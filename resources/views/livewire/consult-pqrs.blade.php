<div>
    <h2 style="text-align: center; margin-bottom: 2rem;">Consulta tu Solicitud</h2>

    <!-- Search Box -->
    <div class="card">
        <form wire:submit="search" style="display: flex; gap: 1rem;">
            <div style="flex-grow: 1;">
                <input type="text" wire:model="data.cun" placeholder="Ingresa tu código CUN (Ej: 4436-24-0000000001)" class="form-control">
                @error('data.cun') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn">
                <span wire:loading.remove wire:target="search">Consultar</span>
                <span wire:loading wire:target="search">Buscando...</span>
            </button>
        </form>
    </div>

    <!-- Not Found Alert -->
    @if ($notFound)
        <div class="alert alert-danger">
            <strong>No encontrado:</strong> No hemos encontrado ninguna solicitud con ese código CUN.
        </div>
    @endif

    <!-- Result Card -->
    @if ($pqrs)
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 1rem;">
                <div>
                    <h3 style="margin: 0;">Detalles de la Solicitud</h3>
                    <small>Radicado: <strong>{{ $pqrs->cun }}</strong></small>
                </div>
                <span style="padding: 0.25rem 0.5rem; border-radius: 4px; background-color: #eee; font-weight: bold;">
                    {{ match($pqrs->status) {
                        'pending' => 'Pendiente',
                        'in_progress' => 'En Progreso',
                        'resolved' => 'Resuelto',
                        'closed' => 'Cerrado',
                        default => 'Desconocido'
                    } }}
                </span>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <strong>Tipo:</strong> {{ ucfirst($pqrs->type) }}
                </div>
                <div>
                    <strong>Fecha:</strong> {{ $pqrs->created_at->format('d/m/Y h:i A') }}
                </div>
                @if($pqrs->motive)
                <div style="grid-column: span 2;">
                    <strong>Motivo:</strong> {{ $pqrs->motive }}
                </div>
                @endif
            </div>

            <div style="background-color: #f9f9f9; padding: 1rem; border-radius: 4px;">
                <strong>Descripción:</strong>
                <p style="margin-top: 0.5rem;">{{ $pqrs->description }}</p>
            </div>
        </div>

        <!-- Timeline & Messages -->
        <div style="margin-top: 2rem;">
            <h3>Historial de Mensajes</h3>

            <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 1rem;">
                @forelse ($pqrs->messages as $message)
                    <div style="padding: 1rem; border-radius: 8px; max-width: 80%; {{ $message->role === 'client' ? 'align-self: flex-end; background-color: #e3f2fd;' : 'align-self: flex-start; background-color: #f5f5f5;' }}">
                        <div style="font-size: 0.8rem; color: #666; margin-bottom: 0.5rem; display: flex; justify-content: space-between;">
                            <strong>{{ $message->role === 'client' ? 'Tú' : 'Administrador' }}</strong>
                            <span>{{ $message->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div>{!! $message->content !!}</div>
                        
                        @if($message->attachments)
                            <div style="margin-top: 0.5rem; font-size: 0.85rem;">
                                <strong>Adjuntos:</strong>
                                <ul>
                                    @foreach($message->attachments as $attachment)
                                        <li><a href="{{ Storage::url($attachment) }}" target="_blank">Ver archivo</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @empty
                    <p style="text-align: center; color: #999;">No hay mensajes en el historial.</p>
                @endforelse
            </div>

            <!-- Reply Form -->
            @if(!in_array($pqrs->status, ['resolved', 'closed']))
                <div class="card" style="margin-top: 2rem;">
                    <h4>Enviar Respuesta</h4>
                    <form wire:submit="submitReply">
                        <div class="form-group">
                            <label class="form-label">Mensaje</label>
                            <textarea wire:model="replyContent" rows="4" class="form-control" placeholder="Escribe tu respuesta aquí..."></textarea>
                            @error('replyContent') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Adjuntar Archivos</label>
                            <input type="file" wire:model="replyAttachments" multiple class="form-control">
                            @error('replyAttachments.*') <span class="error">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="replyAttachments" style="color: #003366; font-size: 0.9rem; margin-top: 0.5rem;">Subiendo archivos...</div>
                        </div>

                        <button type="submit" class="btn">
                            <span wire:loading.remove wire:target="submitReply">Enviar Respuesta</span>
                            <span wire:loading wire:target="submitReply">Enviando...</span>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    @endif
</div>
