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
                @if($successCun)
                    <!-- Success State (Sin Modal, directo en el contenedor) -->
                    <div class="text-center py-12 animate-slide-up">
                        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        
                        <h2 class="text-3xl font-bold text-slate-900 mb-4">¡Solicitud Radicada!</h2>
                        <p class="text-slate-600 mb-8 max-w-md mx-auto">
                            Tu solicitud ha sido registrada exitosamente en nuestro sistema. Por favor conserva el siguiente código para consultas futuras.
                        </p>
                        
                        <div class="bg-surface-50 border border-slate-200 rounded-2xl p-6 max-w-sm mx-auto mb-8 transform hover:scale-105 transition-transform duration-300 bg-slate-50">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                {{ Str::startsWith($successCun, 'RAD') ? 'Número de Radicado' : 'Código CUN' }}
                            </p>
                            <p class="text-4xl font-mono font-bold text-primary tracking-widest break-all">{{ $successCun }}</p>
                        </div>
                        
                        <button type="button" wire:click="resetSuccess" class="px-8 py-3 bg-primary text-white font-semibold rounded-xl hover:bg-slate-800 transition-colors shadow-lg shadow-primary/30 transform hover:-translate-y-0.5 active:translate-y-0">
                            Finalizar y volver al inicio
                        </button>
                    </div>
                @else
                    <!-- Form -->
                    <form wire:submit="save" class="space-y-8">
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
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Apellidos *</label>
                                    <input type="text" wire:model="data.last_name" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    @error('data.last_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
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
                                        <option value="reposicion">Reposición</option>
                                        <option value="apelacion">Apelación</option>
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
                                    <label class="block text-sm font-medium text-slate-600 mb-1">Sede *</label>
                                    <div class="relative">
                                        <select wire:model="data.city" class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                            <option value="">Selecciona...</option>
                                            <option value="Montería">Montería</option>
                                            <option value="Puerto Libertador">Puerto Libertador</option>
                                            <option value="San Pedro de Urabá">San Pedro de Urabá</option>
                                            <option value="Tierralta">Tierralta</option>
                                            <option value="Valencia">Valencia</option>
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
                                <label class="block text-sm font-medium text-slate-600 mb-1">Adjuntar soportes/anexos (PDF, JPG y JPEG, max 50MB)</label>
                                <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 border-dashed border-2 hover:border-blue-300 transition-colors cursor-pointer relative group">
                                    <input type="file" wire:model.live="attachments" multiple accept=".pdf,.jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-blue-900">SELECCIONAR ARCHIVO</span>
                                        <button type="button" class="px-4 py-2 bg-cyan-400 text-white font-bold rounded-lg uppercase text-sm">Seleccionar Archivo</button>
                                    </div>
                                    @error('attachments.*') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                                    <div wire:loading wire:target="attachments" class="text-center mt-2 text-sm text-blue-600 font-medium animate-pulse">Subiendo archivos...</div>
                                </div>

                                <!-- File Preview List -->
                                @if(count($attachments) > 0)
                                    <div class="mt-4 space-y-2">
                                        @foreach($attachments as $index => $attachment)
                                            <div wire:key="attachment-{{ $index }}" class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-lg">
                                                <div class="flex items-center gap-3 overflow-hidden">
                                                    <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                    </div>
                                                    <span class="text-sm text-slate-700 truncate">{{ $attachment->getClientOriginalName() }}</span>
                                                </div>
                                                <button type="button" wire:click="removeAttachment({{ $index }})" class="text-slate-400 hover:text-red-500 transition-colors p-1">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Data Privacy Policy -->
                        <div class="group">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" wire:model="data.data_treatment_accepted" class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary transition-all">
                                </div>
                                <div class="text-sm text-slate-600">
                                    He leído y acepto la <a href="#" class="text-primary font-bold hover:underline">Política de Tratamiento de Datos Personales</a>. Entiendo que mis datos serán utilizados para gestionar mi solicitud conforme a la ley.
                                </div>
                            </label>
                            @error('data.data_treatment_accepted') <span class="text-red-500 text-sm mt-1 block">Debes aceptar la política de tratamiento de datos para continuar.</span> @enderror
                        </div>

                        <!-- Actions -->
                        <div class="pt-4">
                            <button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-slate-800 text-white font-bold rounded-xl shadow-lg shadow-primary/30 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2 group">
                                <span wire:loading.remove wire:target="save">Radicar Solicitud</span>
                                <span wire:loading wire:target="save">Procesando...</span>
                                <svg wire:loading.remove wire:target="save" class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                <svg wire:loading wire:target="save" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        
        <!-- Trust Indicators -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-white/60 rounded-2xl backdrop-blur-sm border border-white/50 shadow-sm flex flex-col items-center text-center hover:bg-white/80 transition-colors">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-2xl mb-3">🔒</div>
                <h3 class="text-sm font-bold text-slate-800 uppercase mb-2">Datos Seguros</h3>
                <p class="text-xs text-slate-600 leading-relaxed max-w-xs">
                    Tu información está protegida bajo estrictos estándares de seguridad y cifrado, garantizando la confidencialidad de tus datos personales.
                </p>
            </div>
            <div class="p-6 bg-white/60 rounded-2xl backdrop-blur-sm border border-white/50 shadow-sm flex flex-col items-center text-center hover:bg-white/80 transition-colors">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center text-2xl mb-3">⚖️</div>
                <h3 class="text-sm font-bold text-slate-800 uppercase mb-2">Respaldo Legal</h3>
                
                <details class="group w-full">
                    <summary class="flex justify-center items-center gap-2 cursor-pointer list-none text-xs text-slate-600 hover:text-primary transition-colors font-medium">
                        <span>Entidades de Vigilancia</span>
                        <span class="transition group-open:rotate-180">▼</span>
                    </summary>
                    <div class="mt-4 grid grid-cols-3 gap-2 animate-fade-in">
                        <a href="https://www.sic.gov.co" target="_blank" class="flex flex-col items-center p-2 bg-white rounded-lg border border-slate-100 hover:shadow-md transition-all">
                            <span class="text-xl mb-1">🏛️</span>
                            <span class="text-[10px] font-bold text-slate-700">SIC</span>
                        </a>
                        <a href="https://www.mintic.gov.co" target="_blank" class="flex flex-col items-center p-2 bg-white rounded-lg border border-slate-100 hover:shadow-md transition-all">
                            <span class="text-xl mb-1">📡</span>
                            <span class="text-[10px] font-bold text-slate-700">MinTIC</span>
                        </a>
                        <a href="https://www.crcom.gov.co" target="_blank" class="flex flex-col items-center p-2 bg-white rounded-lg border border-slate-100 hover:shadow-md transition-all">
                            <span class="text-xl mb-1">📊</span>
                            <span class="text-[10px] font-bold text-slate-700">CRC</span>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-500 mt-3 leading-relaxed">
                        Tu solicitud genera un <strong>Código CUN</strong> oficial, validado por estas entidades.
                    </p>
                </details>
            </div>
        </div>
    </div>
</div>