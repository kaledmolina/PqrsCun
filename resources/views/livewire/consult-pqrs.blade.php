<div class="pqrs-container">
    
    <!-- Header Section -->
    <div class="pqrs-header">
        <h1 class="pqrs-title">
            Consulta el estado de tu solicitud
        </h1>
        <p class="pqrs-subtitle">
            En <span style="color: var(--primary-color); font-weight: bold;">Intalnet</span> trabajamos para darte soluciones. 
            Ingresa tu código CUN para conocer en tiempo real el avance de tu trámite.
        </p>
    </div>

    <!-- Search Box -->
    <div class="pqrs-card" style="padding: 2rem; margin-bottom: 2.5rem;">
        <form wire:submit="search" style="max-width: 42rem; margin: 0 auto;">
            <div style="position: relative; display: flex; align-items: center;">
                <div style="position: absolute; left: 0; padding-left: 1rem; pointer-events: none;">
                    <svg style="height: 1.5rem; width: 1.5rem; color: #94a3b8;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" wire:model="data.cun" style="padding-left: 3rem; padding-right: 1rem; padding-top: 1rem; padding-bottom: 1rem;" class="form-control" placeholder="Ingresa tu código CUN (ej: 4436-24-0000000001)">
                <button type="submit" class="btn btn-primary" style="position: absolute; right: 0.5rem; top: 0.5rem; bottom: 0.5rem;">
                    <span wire:loading.remove>Consultar</span>
                    <span wire:loading>
                        <svg class="animate-spin" style="height: 1.25rem; width: 1.25rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>
            @error('data.cun') <span class="form-error" style="display: flex; align-items: center; gap: 0.25rem; margin-left: 0.5rem; margin-top: 0.5rem;"><svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</span> @enderror
        </form>
    </div>

    <!-- Not Found Alert -->
    @if ($notFound)
        <div style="background-color: #fef2f2; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #fee2e2; margin-bottom: 2rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
            <div style="display: flex; align-items: flex-start; gap: 1rem;">
                <div style="flex-shrink: 0; background-color: #fee2e2; padding: 0.5rem; border-radius: 9999px;">
                    <svg style="height: 1.5rem; width: 1.5rem; color: #ef4444;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #991b1b; margin: 0;">No encontramos resultados</h3>
                    <p style="margin-top: 0.5rem; color: #b91c1c;">
                        No hemos encontrado ninguna solicitud con el código CUN ingresado. 
                        Por favor verifica que el número esté escrito correctamente e inténtalo de nuevo.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Result Card -->
    @if ($pqrs)
        <div class="pqrs-card">
            <div style="padding: 1.5rem 2rem; border-bottom: 1px solid #f1f5f9; background-color: rgba(248, 250, 252, 0.5); display: flex; flex-direction: column; gap: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin: 0;">Detalles de tu Solicitud</h3>
                        <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #64748b;">Radicado CUN: <span style="font-family: monospace; font-weight: 700; color: var(--primary-color); background-color: #eff6ff; padding: 0.125rem 0.5rem; border-radius: 0.25rem;">{{ $pqrs->cun }}</span></p>
                    </div>
                    <div>
                        <span class="badge {{ match($pqrs->status) {
                            'pending' => 'badge-pending',
                            'in_progress' => 'badge-progress',
                            'resolved' => 'badge-resolved',
                            'closed' => 'badge-closed',
                            default => 'badge-closed'
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
            </div>
            <div class="card-body">
                <dl class="grid-2">
                    <div>
                        <dt class="form-label" style="color: #64748b;">Tipo de Solicitud</dt>
                        <dd style="font-size: 1rem; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 0.5rem;">
                            <svg style="width: 1.25rem; height: 1.25rem; color: var(--primary-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            {{ match($pqrs->type) {
                                'peticion' => 'Petición',
                                'queja' => 'Queja',
                                'apelacion' => 'Recurso de Apelación',
                                'reposicion' => 'Recurso de Reposición',
                                default => ucfirst($pqrs->type)
                            } }}
                        </dd>
                    </div>
                    <div>
                        <dt class="form-label" style="color: #64748b;">Fecha de Radicación</dt>
                        <dd style="font-size: 1rem; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 0.5rem;">
                            <svg style="width: 1.25rem; height: 1.25rem; color: var(--primary-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $pqrs->created_at->format('d/m/Y h:i A') }}
                        </dd>
                    </div>
                    
                    @if($pqrs->motive)
                    <div class="col-span-2">
                        <dt class="form-label" style="color: #64748b;">Motivo</dt>
                        <dd style="font-size: 1rem; color: #0f172a;">{{ $pqrs->motive }}</dd>
                    </div>
                    @endif

                    <div class="col-span-2">
                        <dt class="form-label" style="color: #64748b; margin-bottom: 0.5rem;">Descripción de la Solicitud</dt>
                        <dd style="font-size: 1rem; color: #334155; background-color: #f8fafc; padding: 1rem; border-radius: 0.75rem; border: 1px solid #f1f5f9; line-height: 1.6;">
                            {{ $pqrs->description }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Timeline & Messages -->
        <div style="margin-top: 2rem;">
            <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 1rem;">Historial de Mensajes</h3>

            <div class="timeline">
                @forelse ($pqrs->messages as $message)
                    <div class="message {{ $message->role }}">
                        <div class="message-bubble">
                            <div class="message-meta">
                                <span>
                                    {{ $message->role === 'client' ? 'Tú' : 'Administrador' }}
                                </span>
                                <span class="message-time">
                                    {{ $message->created_at->format('d/m/Y H:i') }}
                                </span>
                            </div>
                            <div style="font-size: 0.875rem;">
                                {!! $message->content !!}
                            </div>
                            @if($message->attachments)
                                <div style="margin-top: 0.75rem; padding-top: 0.75rem; border-top: 1px solid rgba(0,0,0,0.1);">
                                    <p style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.25rem;">Adjuntos:</p>
                                    <ul style="list-style-type: disc; padding-left: 1rem; font-size: 0.75rem;">
                                        @foreach($message->attachments as $attachment)
                                            <li>
                                                <a href="{{ Storage::url($attachment) }}" target="_blank" style="text-decoration: underline; color: inherit;">
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
                    <p class="text-center" style="color: #64748b; font-style: italic; padding: 1rem;">No hay mensajes en el historial.</p>
                @endforelse
            </div>

            <!-- Reply Form -->
            @if(!in_array($pqrs->status, ['resolved', 'closed']))
                <div class="pqrs-card" style="margin-top: 2rem; padding: 1.5rem;">
                    <h4 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin-bottom: 1rem;">Enviar Respuesta</h4>
                    
                    @if (session()->has('message_sent'))
                        <div style="margin-bottom: 1rem; padding: 1rem; background-color: #f0fdf4; color: #15803d; border-radius: 0.5rem;">
                            {{ session('message_sent') }}
                        </div>
                    @endif

                    <form wire:submit="submitReply">
                        <div class="form-group">
                            <label for="replyContent" class="form-label">Mensaje</label>
                            <textarea wire:model="replyContent" id="replyContent" rows="4" class="form-control" placeholder="Escribe tu respuesta aquí..."></textarea>
                            @error('replyContent') <span class="form-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="replyAttachments" class="form-label">Adjuntar Archivos</label>
                            <input type="file" wire:model="replyAttachments" id="replyAttachments" class="form-control" multiple>
                            @error('replyAttachments.*') <span class="form-error">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="replyAttachments" style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--primary-color);">Subiendo archivos...</div>
                        </div>
                        
                        <div style="margin-top: 1rem; display: flex; justify-content: flex-end;">
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading.remove>Enviar Respuesta</span>
                                <span wire:loading>Enviando...</span>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    @endif
</div>
