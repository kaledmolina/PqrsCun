<div class="animate-fade-in">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4 tracking-tight">
            Estamos aquí para <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">escucharte</span>
        </h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto">
            Tu satisfacción es nuestra prioridad. Utiliza este formulario para radicar tus peticiones, quejas o reclamos.
        </p>
    </div>

    <div class="max-w-4xl mx-auto">
        <!-- Main Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-100 relative">
            <!-- Decorative Header -->
            <div class="h-2 bg-gradient-to-r from-primary via-secondary to-primary"></div>
            
            <div class="p-8 md:p-12">
                @if($showSuccessModal)
                    <!-- Success State -->
                    <div class="text-center py-12 animate-slide-up">
                        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-4">¡Solicitud Radicada!</h2>
                        <p class="text-slate-600 mb-8">Tu PQRS ha sido registrada exitosamente en nuestro sistema.</p>
                        
                        <div class="bg-surface-50 border border-slate-200 rounded-2xl p-6 max-w-sm mx-auto mb-8 transform hover:scale-105 transition-transform duration-300">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Código de Seguimiento (CUN)</p>
                            <p class="text-3xl font-mono font-bold text-primary tracking-widest">{{ $createdCun }}</p>
                        </div>
                        
                        <button type="button" wire:click="$set('showSuccessModal', false)" class="px-8 py-3 bg-primary text-white font-semibold rounded-xl hover:bg-slate-800 transition-colors shadow-lg shadow-primary/30">
                            Entendido, finalizar
                        </button>
                    </div>
                @else
                    <!-- Form -->
                    <form wire:submit="create" class="space-y-8">
                        <div class="space-y-6">
                            <!-- Row 1 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Número de contrato de reclamación</label>
                                    <input type="text" wire:model="data.contract_number" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.contract_number') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Tipo de documento de Identidad o de tu empresa *</label>
                                    <div class="relative">
                                        <select wire:model="data.document_type" class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                            <option value="">Selecciona...</option>
                                            <option value="CC">Cédula de ciudadanía</option>
                                            <option value="TI">Tarjeta de Identidad</option>
                                            <option value="CE">Cédula de Extranjería</option>
                                            <option value="NIT">NIT</option>
                                            <option value="PAS">Pasaporte</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                    @error('data.document_type') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 {{ $errors->has('data.document_number') ? 'text-red-500' : '' }}">Número de documento *</label>
                                    <input type="text" wire:model="data.document_number" class="w-full px-4 py-3 bg-white border {{ $errors->has('data.document_number') ? 'border-red-500' : 'border-slate-200' }} rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.document_number') <span class="text-red-500 text-sm mt-1 block">El campo número de documento es obligatorio</span> @enderror
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Tu nombre o razón social de empresa *</label>
                                    <input type="text" wire:model="data.first_name" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.first_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <div class="group">
                                <label class="block text-sm font-medium text-slate-600 mb-1">¿Presentar una petición, queja / reclamo o recurso? *</label>
                                <div class="relative">
                                    <select wire:model="data.type" class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                        <option value="">Selecciona una opción...</option>
                                        <option value="peticion">Petición (Solicitud de información)</option>
                                        <option value="queja">Queja (Inconformidad)</option>
                                        <option value="reclamo">Reclamo (Falla en servicio)</option>
                                        <option value="sugerencia">Sugerencia</option>
                                        <option value="apelacion">Recurso de Apelación</option>
                                        <option value="reposicion">Recurso de Reposición</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                                @error('data.type') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Row 4 -->
                            <div class="group">
                                <label class="block text-sm font-medium text-slate-600 mb-3">Selecciona el servicio Objeto de la PQR:</label>
                                <div class="flex flex-wrap gap-6">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox" wire:model="data.services" value="Cámaras de seguridad" class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary">
                                        <span class="text-slate-700">Cámaras de seguridad</span>
                                    </label>
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox" wire:model="data.services" value="Televisión" class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary">
                                        <span class="text-slate-700">Televisión</span>
                                    </label>
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox" wire:model="data.services" value="Internet" class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary">
                                        <span class="text-slate-700">Internet</span>
                                    </label>
                                </div>
                                @error('data.services') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Row 5 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">¿Cuál es el correo al cual quiere que llegue la respuesta? *</label>
                                    <input type="email" wire:model="data.email" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Confirma el correo electrónico *</label>
                                    <input type="email" wire:model="data.email_confirmation" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                </div>
                            </div>

                            <!-- Row 6 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Dirección Física *</label>
                                    <input type="text" wire:model="data.address" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.address') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Ciudad *</label>
                                    <div class="relative">
                                        <select wire:model="data.city" class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                            <option value="">Selecciona...</option>
                                            <option value="Tunja">Tunja</option>
                                            <option value="Duitama">Duitama</option>
                                            <option value="Sogamoso">Sogamoso</option>
                                            <option value="Paipa">Paipa</option>
                                            <option value="Chiquinquirá">Chiquinquirá</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                    @error('data.city') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Row 7 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Número de contacto celular *</label>
                                    <input type="tel" wire:model="data.phone" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.phone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Teléfono de contacto</label>
                                    <input type="tel" wire:model="data.landline" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.landline') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Row 8 -->
                            <div class="group">
                                <label class="block text-sm font-medium text-slate-600 mb-1">Cuéntanos qué ocurrió y qué necesitas que resolvamos (máx. 500 caracteres) *</label>
                                <textarea wire:model="data.description" rows="5" maxlength="500" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm"></textarea>
                                @error('data.description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Row 9 -->
                            <div class="group">
                                <label class="block text-sm font-medium text-slate-600 mb-1">Adjuntar soportes/anexos (PDF, JPG y JPEG, max 5mb)</label>
                                <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 border-dashed border-2 hover:border-blue-300 transition-colors cursor-pointer relative group">
                                    <input type="file" wire:model="attachments" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-blue-900">SELECCIONAR ARCHIVO</span>
                                        <button type="button" class="px-4 py-2 bg-cyan-400 text-white font-bold rounded-lg uppercase text-sm">Seleccionar Archivo</button>
                                    </div>
                                    @error('attachments.*') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                                    <div wire:loading wire:target="attachments" class="text-center mt-2 text-sm text-blue-600 font-medium animate-pulse">Subiendo archivos...</div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4">
                            <button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-slate-800 text-white font-bold rounded-xl shadow-lg shadow-primary/30 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2 group">
                                <span wire:loading.remove wire:target="create">Radicar Solicitud</span>
                                <span wire:loading wire:target="create">Procesando...</span>
                                <svg wire:loading.remove wire:target="create" class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                <svg wire:loading wire:target="create" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        
        <!-- Trust Indicators -->
        <div class="mt-8 grid grid-cols-3 gap-4 text-center">
            <div class="p-4 bg-white/50 rounded-xl backdrop-blur-sm">
                <div class="text-2xl mb-1">🔒</div>
                <p class="text-xs font-bold text-slate-500 uppercase">Datos Seguros</p>
            </div>
            <div class="p-4 bg-white/50 rounded-xl backdrop-blur-sm">
                <div class="text-2xl mb-1">⚡</div>
                <p class="text-xs font-bold text-slate-500 uppercase">Respuesta Rápida</p>
            </div>
            <div class="p-4 bg-white/50 rounded-xl backdrop-blur-sm">
                <div class="text-2xl mb-1">📄</div>
                <p class="text-xs font-bold text-slate-500 uppercase">Trámite Legal</p>
            </div>
        </div>
    </div>
</div>
