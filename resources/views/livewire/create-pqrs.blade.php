<div class="pqrs-container">
    
    <!-- Header Section -->
    <div class="pqrs-header">
        <h1 class="pqrs-title">
            Estamos aquí para escucharte
        </h1>
        <p class="pqrs-subtitle">
            En <span style="color: var(--primary-color); font-weight: bold;">Intalnet</span>, tu satisfacción es nuestra prioridad. 
            Utiliza este formulario para radicar tus peticiones, quejas, reclamos o recursos. 
            Nos comprometemos a darte una respuesta clara y oportuna.
        </p>
    </div>

    <div class="pqrs-card">
        <!-- Form Header -->
        <div class="card-header">
            <div class="card-header-icon">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <div>
                <h2 class="card-header-title">Registrar Nueva Solicitud</h2>
                <p class="card-header-subtitle">Diligencia los campos a continuación para iniciar tu trámite.</p>
            </div>
        </div>
        
        <form wire:submit="create" class="card-body">
            <!-- Type Selection (First Step) -->
            <div class="form-group" style="background-color: #eff6ff; padding: 1.5rem; border-radius: 0.75rem; border: 1px solid #dbeafe;">
                <label for="type" class="form-label" style="font-size: 1.125rem; color: #1e3a8a;">
                    ¿Qué tipo de solicitud deseas realizar?
                </label>
                <div style="margin-top: 0.5rem;">
                    <select wire:model.live="data.type" id="type" class="form-control form-select">
                        <option value="">Selecciona una opción...</option>
                        <option value="peticion">Petición (Solicitud de información o servicio)</option>
                        <option value="queja">Queja (Inconformidad con el servicio)</option>
                        <option value="apelacion">Recurso de Apelación</option>
                        <option value="reposicion">Recurso de Reposición</option>
                    </select>
                </div>
                @error('data.type') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <!-- Client Info Section -->
            <div>
                <h3 class="section-title">
                    <svg width="20" height="20" style="color: var(--primary-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Información del Solicitante
                </h3>
                <div class="grid-2">
                    
                    <!-- Operator -->
                    <div class="col-span-2">
                        <label for="operator" class="form-label">Operador</label>
                        <input type="text" wire:model="data.operator" id="operator" class="form-control" readonly>
                        @error('data.operator') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- Document Type -->
                    <div>
                        <label for="document_type" class="form-label">Tipo de Documento <span style="color: var(--danger-color);">*</span></label>
                        <select wire:model="data.document_type" id="document_type" class="form-control form-select">
                            <option value="">Selecciona...</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="NIT">NIT</option>
                            <option value="PAS">Pasaporte</option>
                        </select>
                        @error('data.document_type') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- Document Number -->
                    <div>
                        <label for="document_number" class="form-label">Número de Documento <span style="color: var(--danger-color);">*</span></label>
                        <input type="text" wire:model="data.document_number" id="document_number" placeholder="Ej: 1057600123" class="form-control">
                        @error('data.document_number') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- Name / Company Name -->
                    <div class="col-span-2">
                        <label for="first_name" class="form-label">Nombre Completo o Razón Social <span style="color: var(--danger-color);">*</span></label>
                        <input type="text" wire:model="data.first_name" id="first_name" class="form-control">
                        @error('data.first_name') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- Surnames -->
                    <div class="col-span-2">
                        <label for="last_name" class="form-label">Apellidos</label>
                        <input type="text" wire:model="data.last_name" id="last_name" class="form-control">
                        @error('data.last_name') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- Department -->
                    <div>
                        <label for="department" class="form-label">Departamento</label>
                        <input type="text" wire:model="data.department" id="department" value="Boyacá" readonly class="form-control">
                        @error('data.department') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="form-label">Ciudad <span style="color: var(--danger-color);">*</span></label>
                        <select wire:model="data.city" id="city" class="form-control form-select">
                            <option value="">Selecciona ciudad...</option>
                            <option value="Tunja">Tunja</option>
                            <option value="Duitama">Duitama</option>
                            <option value="Sogamoso">Sogamoso</option>
                            <option value="Paipa">Paipa</option>
                            <option value="Chiquinquirá">Chiquinquirá</option>
                        </select>
                        @error('data.city') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="form-label">Correo Electrónico <span style="color: var(--danger-color);">*</span></label>
                        <input type="email" wire:model="data.email" id="email" placeholder="ejemplo@correo.com" class="form-control">
                        @error('data.email') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="form-label">Teléfono de contacto <span style="color: var(--danger-color);">*</span></label>
                        <input type="tel" wire:model="data.phone" id="phone" placeholder="Ej: 3001234567" class="form-control">
                        @error('data.phone') <span class="form-error">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>

            <!-- PQRS Details Section -->
            <div style="margin-top: 2rem;">
                <h3 class="section-title">
                    <svg width="20" height="20" style="color: var(--primary-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Detalles de la Solicitud
                </h3>
                <div class="grid-2">
                    
                    <!-- Motive (Only for Peticion/Queja) -->
                    @if(in_array($data['type'] ?? '', ['peticion', 'queja']))
                    <div class="col-span-2">
                        <label for="motive" class="form-label">Motivo de la solicitud <span style="color: var(--danger-color);">*</span></label>
                        <input type="text" wire:model="data.motive" id="motive" placeholder="Ej: Falla intermitente en el servicio" class="form-control">
                        @error('data.motive') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    @endif

                    <!-- Subject CUN (Conditional) -->
                    @if(in_array($data['type'] ?? '', ['apelacion', 'reposicion']))
                    <div class="col-span-2" style="background-color: #fefce8; padding: 1.25rem; border-radius: 0.75rem; border: 1px solid #fef08a;">
                        <div style="display: flex; gap: 0.75rem;">
                            <svg width="24" height="24" style="color: #ca8a04;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div style="width: 100%;">
                                <label for="subject_cun" class="form-label" style="color: #854d0e; font-weight: 700;">Código CUN a Apelar/Reponer <span style="color: var(--danger-color);">*</span></label>
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
    </div>

    @if (session()->has('success_cun'))
    <div style="position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; z-index: 50; background-color: rgba(0,0,0,0.5); backdrop-filter: blur(4px); padding: 1rem;">
        <div style="background-color: white; border-radius: 1rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); max-width: 28rem; width: 100%; overflow: hidden;">
            <div style="background-color: var(--success-color); padding: 1.5rem; display: flex; justify-content: center;">
                <svg style="width: 4rem; height: 4rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div style="padding: 2rem; text-align: center;">
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem;">¡Solicitud Radicada!</h3>
                <p style="color: #4b5563; margin-bottom: 1.5rem;">Tu PQRS ha sido registrada exitosamente. Por favor guarda tu número de radicado para consultar el estado:</p>
                
                <div style="background-color: #eff6ff; border: 2px solid #dbeafe; border-radius: 0.75rem; padding: 1rem; margin-bottom: 2rem;">
                    <p style="font-size: 0.875rem; color: #2563eb; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">CUN (Código Único Numérico)</p>
                    <p style="font-size: 1.875rem; font-family: monospace; font-weight: 700; color: #1d4ed8; user-select: all;">{{ session('success_cun') }}</p>
                </div>
                
                <button type="button" wire:click="$set('data.type', null)" onclick="window.location.reload()" class="btn btn-primary btn-block">
                    Entendido, finalizar
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
