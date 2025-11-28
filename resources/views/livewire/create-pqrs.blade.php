<div class="py-16 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">
                Estamos aquí para escucharte
            </h1>
            <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">
                En <span class="font-bold text-blue-600">Intalnet</span>, tu satisfacción es nuestra prioridad. 
                Utiliza este formulario para radicar tus peticiones, quejas, reclamos o recursos. 
                Nos comprometemos a darte una respuesta clara y oportuna.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <div class="flex items-center gap-4">
                    <div class="bg-white/20 p-3 rounded-lg backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Registrar Nueva Solicitud</h2>
                        <p class="text-blue-100 text-sm mt-1">Diligencia los campos a continuación para iniciar tu trámite.</p>
                    </div>
                </div>
            </div>
            
            <form wire:submit="create" class="p-8 space-y-8">
                <!-- Type Selection (First Step) -->
                <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100 transition-all hover:shadow-md">
                    <label for="type" class="block text-lg font-semibold text-blue-900 mb-3">
                        ¿Qué tipo de solicitud deseas realizar?
                    </label>
                    <div class="mt-1">
                        <select wire:model.live="data.type" id="type" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-base border-gray-300 rounded-lg p-3 transition-colors cursor-pointer hover:border-blue-400">
                            <option value="">Selecciona una opción...</option>
                            <option value="peticion">Petición (Solicitud de información o servicio)</option>
                            <option value="queja">Queja (Inconformidad con el servicio)</option>
                            <option value="apelacion">Recurso de Apelación</option>
                            <option value="reposicion">Recurso de Reposición</option>
                        </select>
                    </div>
                    @error('data.type') <span class="text-red-500 text-sm mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</span> @enderror
                </div>

                <!-- Client Info Section -->
                <div>
                    <h3 class="text-lg font-bold text-slate-800 border-b border-slate-200 pb-3 mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Información del Solicitante
                    </h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2">
                        
                        <!-- Operator -->
                        <div class="sm:col-span-2">
                            <label for="operator" class="block text-sm font-medium text-slate-700 mb-1">Operador</label>
                            <input type="text" wire:model="data.operator" id="operator" class="bg-slate-50 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5 text-slate-500 cursor-not-allowed" readonly>
                            @error('data.operator') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Document Type -->
                        <div>
                            <label for="document_type" class="block text-sm font-medium text-slate-700 mb-1">Tipo de Documento <span class="text-red-500">*</span></label>
                            <select wire:model="data.document_type" id="document_type" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                                <option value="">Selecciona...</option>
                                <option value="CC">Cédula de Ciudadanía</option>
                                <option value="CE">Cédula de Extranjería</option>
                                <option value="NIT">NIT</option>
                                <option value="PAS">Pasaporte</option>
                            </select>
                            @error('data.document_type') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Document Number -->
                        <div>
                            <label for="document_number" class="block text-sm font-medium text-slate-700 mb-1">Número de Documento <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="data.document_number" id="document_number" placeholder="Ej: 1057600123" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                            @error('data.document_number') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Name / Company Name -->
                        <div class="sm:col-span-2">
                            <label for="first_name" class="block text-sm font-medium text-slate-700 mb-1">Nombre Completo o Razón Social <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="data.first_name" id="first_name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                            @error('data.first_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Surnames -->
                        <div class="sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-slate-700 mb-1">Apellidos</label>
                            <input type="text" wire:model="data.last_name" id="last_name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                            @error('data.last_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Department -->
                        <div>
                            <label for="department" class="block text-sm font-medium text-slate-700 mb-1">Departamento</label>
                            <input type="text" wire:model="data.department" id="department" value="Boyacá" readonly class="bg-slate-50 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5 text-slate-500 cursor-not-allowed">
                            @error('data.department') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- City -->
                        <div>
                            <label for="city" class="block text-sm font-medium text-slate-700 mb-1">Ciudad <span class="text-red-500">*</span></label>
                            <select wire:model="data.city" id="city" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                                <option value="">Selecciona ciudad...</option>
                                <option value="Tunja">Tunja</option>
                                <option value="Duitama">Duitama</option>
                                <option value="Sogamoso">Sogamoso</option>
                                <option value="Paipa">Paipa</option>
                                <option value="Chiquinquirá">Chiquinquirá</option>
                            </select>
                            @error('data.city') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Correo Electrónico <span class="text-red-500">*</span></label>
                            <input type="email" wire:model="data.email" id="email" placeholder="ejemplo@correo.com" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                            @error('data.email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Teléfono de contacto <span class="text-red-500">*</span></label>
                            <input type="tel" wire:model="data.phone" id="phone" placeholder="Ej: 3001234567" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                            @error('data.phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>

                <!-- PQRS Details Section -->
                <div>
                    <h3 class="text-lg font-bold text-slate-800 border-b border-slate-200 pb-3 mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Detalles de la Solicitud
                    </h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-2">
                        
                        <!-- Motive (Only for Peticion/Queja) -->
                        @if(in_array($data['type'] ?? '', ['peticion', 'queja']))
                        <div class="sm:col-span-2">
                            <label for="motive" class="block text-sm font-medium text-slate-700 mb-1">Motivo de la solicitud <span class="text-red-500">*</span></label>
                            <input type="text" wire:model="data.motive" id="motive" placeholder="Ej: Falla intermitente en el servicio" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5">
                            @error('data.motive') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        <!-- Subject CUN (Conditional) -->
                        @if(in_array($data['type'] ?? '', ['apelacion', 'reposicion']))
                        <div class="sm:col-span-2 bg-yellow-50 p-5 rounded-xl border border-yellow-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="w-full">
                                    <label for="subject_cun" class="block text-sm font-bold text-yellow-800 mb-1">Código CUN a Apelar/Reponer <span class="text-red-500">*</span></label>
                                    <input type="text" wire:model="data.subject_cun" id="subject_cun" placeholder="Ej: 4436-24-0000000001" class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-yellow-300 rounded-lg p-2.5">
                                    <p class="mt-2 text-xs text-yellow-700">Por favor ingresa el número de radicado (CUN) de la solicitud anterior sobre la cual deseas presentar este recurso.</p>
                                </div>
                            </div>
                            @error('data.subject_cun') <span class="text-red-500 text-xs mt-1 block ml-9">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        <!-- Description -->
                        <div class="sm:col-span-2">
                            <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Descripción de los hechos <span class="text-red-500">*</span></label>
                            <div class="mt-1">
                                <textarea wire:model="data.description" id="description" rows="5" placeholder="Describe detalladamente tu solicitud..." class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-slate-300 rounded-lg p-2.5"></textarea>
                            </div>
                            <p class="mt-2 text-xs text-slate-500">Trata de ser lo más claro y específico posible para agilizar tu trámite.</p>
                            @error('data.description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Attachments -->
                        <div class="sm:col-span-2">
                            <label for="attachments" class="block text-sm font-medium text-slate-700 mb-1">Anexos (Opcional)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:bg-slate-50 transition-colors cursor-pointer group">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-400 group-hover:text-blue-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-slate-600 justify-center">
                                        <label for="attachments" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>Sube un archivo</span>
                                            <input id="attachments" wire:model="data.attachments" type="file" class="sr-only" multiple>
                                        </label>
                                        <p class="pl-1">o arrástralo aquí</p>
                                    </div>
                                    <p class="text-xs text-slate-500">PNG, JPG, PDF hasta 10MB</p>
                                </div>
                            </div>
                            @error('data.attachments') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            
                            <!-- Loading State for Upload -->
                            <div wire:loading wire:target="data.attachments" class="mt-2 text-sm text-blue-600 flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Subiendo archivos...
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-200">
                    <div class="flex justify-end">
                        <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center py-3 px-6 border border-transparent shadow-lg text-base font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed" wire:loading.attr="disabled">
                            <span wire:loading.remove>Radicar Solicitud</span>
                            <span wire:loading class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Procesando...
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-filament-actions::modals />
</div>
