<div>
    <div class="card">
        <h2 style="margin-top: 0;">Radicar PQRS</h2>
        <p>Completa el formulario para registrar tu solicitud.</p>

        @if($showSuccessModal)
            <div class="alert alert-success">
                <h3>¡Solicitud Radicada!</h3>
                <p>Tu PQRS ha sido registrada exitosamente.</p>
                <p><strong>Código CUN: {{ $createdCun }}</strong></p>
                <p>Guarda este código para consultar el estado de tu trámite.</p>
                <button type="button" class="btn" wire:click="$set('showSuccessModal', false)">Entendido</button>
            </div>
        @else
            <form wire:submit="create">
                <div class="form-group">
                    <label class="form-label">Tipo de Solicitud</label>
                    <select wire:model="data.type" class="form-control">
                        <option value="">Seleccione una opción</option>
                        <option value="peticion">Petición</option>
                        <option value="queja">Queja</option>
                        <option value="reclamo">Reclamo</option>
                        <option value="sugerencia">Sugerencia</option>
                        <option value="apelacion">Recurso de Apelación</option>
                        <option value="reposicion">Recurso de Reposición</option>
                    </select>
                    @error('data.type') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Número de Identificación</label>
                    <input type="text" wire:model="data.identification_number" class="form-control">
                    @error('data.identification_number') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Nombres</label>
                    <input type="text" wire:model="data.first_name" class="form-control">
                    @error('data.first_name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Apellidos</label>
                    <input type="text" wire:model="data.last_name" class="form-control">
                    @error('data.last_name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" wire:model="data.email" class="form-control">
                    @error('data.email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Teléfono</label>
                    <input type="text" wire:model="data.phone" class="form-control">
                    @error('data.phone') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Motivo (Opcional)</label>
                    <input type="text" wire:model="data.motive" class="form-control">
                    @error('data.motive') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Descripción de la Solicitud</label>
                    <textarea wire:model="data.description" rows="5" class="form-control"></textarea>
                    @error('data.description') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Adjuntar Archivos (Opcional)</label>
                    <input type="file" wire:model="attachments" multiple class="form-control">
                    @error('attachments.*') <span class="error">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="attachments" style="color: #003366; font-size: 0.9rem; margin-top: 0.5rem;">Subiendo archivos...</div>
                </div>

                <button type="submit" class="btn">
                    <span wire:loading.remove wire:target="create">Radicar Solicitud</span>
                    <span wire:loading wire:target="create">Procesando...</span>
                </button>
            </form>
        @endif
    </div>
</div>
