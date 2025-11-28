<div class="max-w-3xl mx-auto py-10 px-4">
    <x-header title="Radicar PQRS" subtitle="Completa el formulario para registrar tu solicitud." size="text-3xl" separator />

    <x-card class="shadow-xl">
        <x-form wire:submit="create">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-select 
                    label="Tipo de Solicitud" 
                    :options="[
                        ['id' => 'peticion', 'name' => 'Petición'],
                        ['id' => 'queja', 'name' => 'Queja'],
                        ['id' => 'reclamo', 'name' => 'Reclamo'],
                        ['id' => 'sugerencia', 'name' => 'Sugerencia'],
                        ['id' => 'apelacion', 'name' => 'Recurso de Apelación'],
                        ['id' => 'reposicion', 'name' => 'Recurso de Reposición']
                    ]"
                    wire:model="data.type"
                    icon="o-tag"
                    placeholder="Seleccione una opción"
                />

                <x-input label="Número de Identificación" wire:model="data.identification_number" icon="o-identification" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input label="Nombres" wire:model="data.first_name" icon="o-user" />
                <x-input label="Apellidos" wire:model="data.last_name" icon="o-user" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input label="Correo Electrónico" wire:model="data.email" icon="o-envelope" type="email" />
                <x-input label="Teléfono" wire:model="data.phone" icon="o-phone" />
            </div>

            <x-input label="Motivo (Opcional)" wire:model="data.motive" icon="o-chat-bubble-bottom-center-text" />

            <x-textarea 
                label="Descripción de la Solicitud" 
                wire:model="data.description" 
                rows="5" 
                placeholder="Describe detalladamente tu solicitud..." 
            />

            <x-file label="Adjuntar Archivos (Opcional)" wire:model="attachments" multiple icon="o-paper-clip" />

            <x-slot:actions>
                <x-button label="Radicar Solicitud" class="btn-primary" type="submit" spinner="create" icon="o-paper-airplane" />
            </x-slot:actions>
        </x-form>
    </x-card>

    {{-- Success Modal --}}
    @if($showSuccessModal)
    <x-modal wire:model="showSuccessModal" class="backdrop-blur">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                <x-icon name="o-check" class="w-8 h-8 text-green-600" />
            </div>
            <h3 class="text-lg font-bold text-gray-900">¡Solicitud Radicada!</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Tu PQRS ha sido registrada exitosamente.
                </p>
                <div class="mt-4 bg-blue-50 p-3 rounded-lg border border-blue-100">
                    <p class="text-xs text-blue-600 uppercase font-bold tracking-wide">Código CUN</p>
                    <p class="text-2xl font-mono font-bold text-blue-700 mt-1">{{ $createdCun }}</p>
                </div>
                <p class="text-xs text-gray-400 mt-4">
                    Guarda este código para consultar el estado de tu trámite.
                </p>
            </div>
            <div class="mt-4">
                <x-button label="Entendido" class="btn-primary w-full" @click="$wire.showSuccessModal = false" />
            </div>
        </div>
    </x-modal>
    @endif
</div>
