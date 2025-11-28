<div class="py-12 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Registrar PQR - Intalnet</h2>
                <p class="text-blue-100 mt-1">En Intalnet estamos para escucharte, registra tu PQR y en la mayor brevedad atenderemos tu solicitud</p>
            </div>
            
            <form wire:submit="create" class="p-8 space-y-8">
                <!-- Type Selection (First Step) -->
                <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                    <label for="type" class="block text-lg font-medium text-blue-900 mb-2">¿Qué tipo de solicitud desea realizar?</label>
                    <div class="mt-1">
                        <select wire:model.live="data.type" id="type" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-base border-gray-300 rounded-md p-3 border">
                            <option value="">Seleccione una opción</option>
                            <option value="peticion">Petición</option>
                            <option value="queja">Queja</option>
                            <option value="apelacion">Recurso de Apelación</option>
                            <option value="reposicion">Recurso de Reposición</option>
                        </select>
                    </div>
                    @error('data.type') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Client Info Section -->
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900 border-b pb-2 mb-4">Información del Cliente</h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        
                        <!-- Operator -->
                        <div class="sm:col-span-2">
                            <label for="operator" class="block text-sm font-medium text-gray-700">¿Cuál es el nombre de su operador?</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.operator" id="operator" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.operator') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Document Type -->
                        <div>
                            <label for="document_type" class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
                            <div class="mt-1">
                                <select wire:model="data.document_type" id="document_type" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                                    <option value="">Seleccione tipo</option>
                                    <option value="CC">Cédula de Ciudadanía</option>
                                    <option value="CE">Cédula de Extranjería</option>
                                    <option value="NIT">NIT</option>
                                    <option value="PAS">Pasaporte</option>
                                </select>
                            </div>
                            @error('data.document_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Document Number -->
                        <div>
                            <label for="document_number" class="block text-sm font-medium text-gray-700">Número de Documento</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.document_number" id="document_number" placeholder="1234567890" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.document_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Name / Company Name -->
                        <div class="sm:col-span-2">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">¿Cuál es su nombre o razón social de su empresa? <span class="text-red-500">*</span></label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.first_name" id="first_name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Surnames -->
                        <div class="sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">¿Cuáles son sus apellidos?</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.last_name" id="last_name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Department -->
                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700">Departamento</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.department" id="department" value="Boyacá" readonly class="bg-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.department') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- City -->
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                            <div class="mt-1">
                                <select wire:model="data.city" id="city" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                                    <option value="">Seleccione ciudad</option>
                                    <option value="Tunja">Tunja</option>
                                    <option value="Duitama">Duitama</option>
                                    <option value="Sogamoso">Sogamoso</option>
                                    <option value="Paipa">Paipa</option>
                                    <option value="Chiquinquirá">Chiquinquirá</option>
                                </select>
                            </div>
                            @error('data.city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico <span class="text-red-500">*</span></label>
                            <div class="mt-1">
                                <input type="email" wire:model="data.email" id="email" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono de contacto <span class="text-red-500">*</span></label>
                            <div class="mt-1">
                                <input type="tel" wire:model="data.phone" id="phone" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>

                <!-- PQRS Details Section -->
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900 border-b pb-2 mb-4">Detalles de la Solicitud</h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        
                        <!-- Motive -->
                        <div class="sm:col-span-2">
                            <label for="motive" class="block text-sm font-medium text-gray-700">¿Cuál es el motivo del PQR? <span class="text-red-500">*</span></label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.motive" id="motive" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.motive') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Subject CUN (Conditional) -->
                        @if(in_array($data['type'] ?? '', ['apelacion', 'reposicion']))
                        <div class="sm:col-span-2 bg-yellow-50 p-4 rounded-md border border-yellow-200">
                            <label for="subject_cun" class="block text-sm font-medium text-yellow-800">Código CUN a Apelar/Reponer <span class="text-red-500">*</span></label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.subject_cun" id="subject_cun" placeholder="Ej: 4436-24-0000000001" class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            <p class="mt-1 text-xs text-yellow-600">Ingrese el CUN de la PQRS anterior que desea apelar o reponer.</p>
                            @error('data.subject_cun') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        <!-- Description -->
                        <div class="sm:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">¿Cuáles son los hechos en los que se fundamenta la petición, queja/reclamo o recurso?</label>
                            <div class="mt-1">
                                <textarea wire:model="data.description" id="description" rows="4" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                            </div>
                            @error('data.description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Attachments -->
                        <div class="sm:col-span-2">
                            <label for="attachments" class="block text-sm font-medium text-gray-700">Anexos (Opcional)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:bg-gray-50 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="attachments" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Subir archivos</span>
                                            <input id="attachments" wire:model="data.attachments" type="file" class="sr-only" multiple>
                                        </label>
                                        <p class="pl-1">o arrastrar y soltar</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, PDF hasta 10MB</p>
                                </div>
                            </div>
                            @error('data.attachments') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            
                            <!-- Loading State for Upload -->
                            <div wire:loading wire:target="data.attachments" class="mt-2 text-sm text-blue-600">
                                Subiendo archivos...
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" wire:loading.attr="disabled">
                            <span wire:loading.remove>Radicar Solicitud</span>
                            <span wire:loading>Procesando...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-filament-actions::modals />
</div>
