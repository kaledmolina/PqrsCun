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
                        <!-- Section: Request Type -->
                        <div class="bg-surface-50 p-6 rounded-2xl border border-slate-100 hover:border-secondary/30 transition-colors group">
                            <label class="block text-sm font-bold text-slate-700 mb-2 group-hover:text-primary transition-colors">¿Qué tipo de solicitud deseas realizar?</label>
                            <div class="relative">
                                <select wire:model="data.type" class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 font-medium shadow-sm">
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
                            @error('data.type') <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <!-- Section: Personal Info -->
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                                <span class="w-8 h-8 bg-secondary/10 text-secondary rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </span>
                                Información Personal
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 group-focus-within:text-primary transition-colors">Número de Identificación</label>
                                    <input type="text" wire:model="data.identification_number" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm group-hover:border-slate-300" placeholder="Ej: 1057500123">
                                    @error('data.identification_number') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 group-focus-within:text-primary transition-colors">Teléfono de Contacto</label>
                                    <input type="tel" wire:model="data.phone" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm group-hover:border-slate-300" placeholder="Ej: 310 123 4567">
                                    @error('data.phone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 group-focus-within:text-primary transition-colors">Nombres</label>
                                    <input type="text" wire:model="data.first_name" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm group-hover:border-slate-300">
                                    @error('data.first_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 group-focus-within:text-primary transition-colors">Apellidos</label>
                                    <input type="text" wire:model="data.last_name" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm group-hover:border-slate-300">
                                    @error('data.last_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="md:col-span-2 group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 group-focus-within:text-primary transition-colors">Correo Electrónico</label>
                                    <input type="email" wire:model="data.email" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm group-hover:border-slate-300" placeholder="nombre@ejemplo.com">
                                    @error('data.email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section: Details -->
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                                <span class="w-8 h-8 bg-secondary/10 text-secondary rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </span>
                                Detalles de la Solicitud
                            </h3>
                            
                            <div class="space-y-6">
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 group-focus-within:text-primary transition-colors">Asunto / Motivo (Opcional)</label>
                                    <input type="text" wire:model="data.motive" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm group-hover:border-slate-300">
                                    @error('data.motive') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1 group-focus-within:text-primary transition-colors">Descripción Detallada</label>
                                    <textarea wire:model="data.description" rows="5" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm group-hover:border-slate-300" placeholder="Por favor describe tu solicitud con el mayor detalle posible..."></textarea>
                                    @error('data.description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 border-dashed border-2 hover:border-blue-300 transition-colors cursor-pointer relative group">
                                    <input type="file" wire:model="attachments" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div class="text-center">
                                        <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        </div>
                                        <p class="text-sm font-medium text-blue-900">Haz clic para adjuntar archivos</p>
                                        <p class="text-xs text-blue-500 mt-1">o arrastra y suelta aquí (Imágenes, PDF)</p>
                                    </div>
                                    @error('attachments.*') <span class="text-red-500 text-sm mt-2 block text-center">{{ $message }}</span> @enderror
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
