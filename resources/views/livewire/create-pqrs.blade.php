<div class="py-12 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Registrar Nueva Solicitud</h2>
                <p class="text-blue-100 mt-1">Complete el formulario para radicar su PQRS</p>
            </div>
            
            <form wire:submit="create" class="p-8 space-y-8">
                <!-- Client Info Section -->
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900 border-b pb-2 mb-4">Información del Cliente</h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nombres</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.first_name" id="first_name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.last_name" id="last_name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <div class="mt-1">
                                <input type="email" wire:model="data.email" id="email" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <div class="mt-1">
                                <input type="tel" wire:model="data.phone" id="phone" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="document_number" class="block text-sm font-medium text-gray-700">Número de Documento</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.document_number" id="document_number" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.document_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- PQRS Details Section -->
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900 border-b pb-2 mb-4">Detalles de la Solicitud</h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipo de Solicitud</label>
                            <div class="mt-1">
                                <select wire:model="data.type" id="type" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                                    <option value="">Seleccione una opción</option>
                                    <option value="peticion">Petición</option>
                                    <option value="queja">Queja</option>
                                    <option value="apelacion">Recurso de Apelación</option>
                                    <option value="reposicion">Recurso de Reposición</option>
                                </select>
                            </div>
                            @error('data.type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="motive" class="block text-sm font-medium text-gray-700">Motivo</label>
                            <div class="mt-1">
                                <input type="text" wire:model="data.motive" id="motive" placeholder="Ej: Falla en el servicio de internet" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            @error('data.motive') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción Detallada</label>
                            <div class="mt-1">
                                <textarea wire:model="data.description" id="description" rows="4" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                            </div>
                            @error('data.description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

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
