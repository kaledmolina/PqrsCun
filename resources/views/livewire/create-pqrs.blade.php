<div class="animate-fade-in" x-data="{ showDataAuthModal: false }">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4 tracking-tight">
            Estamos aquí para <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">atender tus
                solicitudes</span>
        </h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto">
            Tu satisfacción es nuestra prioridad. Utiliza este formulario para radicar tus Peticiones, Quejas/Reclamos o
            Recursos.
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
                        <div
                            class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>

                        <h2 class="text-3xl font-bold text-slate-900 mb-4">¡Solicitud Radicada!</h2>
                        <p class="text-slate-600 mb-8 max-w-md mx-auto">
                            Tu solicitud ha sido registrada exitosamente en nuestro sistema. Por favor conserva el siguiente
                            código para consultas futuras.
                        </p>

                        <div
                            class="bg-surface-50 border border-slate-200 rounded-2xl p-6 max-w-sm mx-auto mb-8 transform hover:scale-105 transition-transform duration-300 bg-slate-50">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                {{ Str::startsWith($successCun, 'RAD') ? 'Número de Radicado' : 'Código CUN' }}
                            </p>
                            <p class="text-4xl font-mono font-bold text-primary tracking-widest break-all">{{ $successCun }}
                            </p>
                        </div>

                        <button type="button" wire:click="resetSuccess"
                            class="px-8 py-3 bg-primary text-white font-semibold rounded-xl hover:bg-slate-800 transition-colors shadow-lg shadow-primary/30 transform hover:-translate-y-0.5 active:translate-y-0">
                            Finalizar y volver al inicio
                        </button>
                    </div>
                @else
                    <!-- Form -->
                    <form wire:submit="save" class="space-y-8">
                        <div class="space-y-6">
                            <!-- Conditional Personal Data Sections -->
                            @if($validPreviousCun)
                                <!-- Loaded Data Summary -->
                                <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-6 animate-fade-in">
                                    <div class="flex items-start gap-4">
                                        <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-slate-800 text-lg mb-1">Datos del Solicitante (Cargados
                                                del CUN Anterior)</h3>
                                            <p class="text-slate-600 text-sm mb-4">La información ha sido recuperada
                                                exitosamente.</p>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 text-sm">
                                                <div>
                                                    <span
                                                        class="block text-slate-500 text-xs uppercase tracking-wider">Nombre</span>
                                                    <span class="font-medium text-slate-900">{{ $data['first_name'] }}
                                                        {{ $data['last_name'] }}</span>
                                                </div>
                                                <div>
                                                    <span
                                                        class="block text-slate-500 text-xs uppercase tracking-wider">Documento</span>
                                                    <span class="font-medium text-slate-900">{{ $data['document_type'] }} -
                                                        {{ $data['document_number'] }}</span>
                                                </div>
                                                <div>
                                                    <span
                                                        class="block text-slate-500 text-xs uppercase tracking-wider">Correo</span>
                                                    <span class="font-medium text-slate-900">{{ $data['email'] }}</span>
                                                </div>
                                                <div>
                                                    <span
                                                        class="block text-slate-500 text-xs uppercase tracking-wider">Celular</span>
                                                    <span class="font-medium text-slate-900">{{ $data['phone'] }}</span>
                                                </div>
                                                <div class="col-span-1 md:col-span-2">
                                                    <span
                                                        class="block text-slate-500 text-xs uppercase tracking-wider">Dirección</span>
                                                    <span class="font-medium text-slate-900">{{ $data['address'] }},
                                                        {{ $data['city'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Row 1 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Código de contrato</label>
                                        <input type="text" wire:model="data.contract_number"
                                            x-on:input="$el.value = $el.value.replace(/[^0-9]/g, '')"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                        @error('data.contract_number') <span
                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Tipo de documento de
                                            Identidad o de tu empresa *</label>
                                        <div class="relative">
                                            <select wire:model.live="data.document_type"
                                                class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                                <option value="">Selecciona...</option>
                                                <option value="CC">Cédula de ciudadanía</option>
                                                <option value="TI">Tarjeta de Identidad</option>
                                                <option value="CE">Cédula de Extranjería</option>
                                                <option value="NIT">NIT</option>
                                                <option value="PAS">Pasaporte</option>
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('data.document_type') <span
                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <!-- Row 2 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label
                                            class="block text-sm font-medium text-slate-600 mb-1 {{ $errors->has('data.document_number') ? 'text-red-500' : '' }}">Número
                                            de documento *</label>
                                        <input type="text" wire:model="data.document_number"
                                            x-on:input="$el.value = $el.value.replace(/[^0-9]/g, '')"
                                            class="w-full px-4 py-3 bg-white border {{ $errors->has('data.document_number') ? 'border-red-500' : 'border-slate-200' }} rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                        @error('data.document_number') <span class="text-red-500 text-sm mt-1 block">El campo
                                        número de documento es obligatorio</span> @enderror
                                    </div>
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Tu nombre o razón social de
                                            empresa *</label>
                                        <input type="text" wire:model="data.first_name"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                        @error('data.first_name') <span
                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                    @if($data['document_type'] !== 'NIT')
                                        <div class="group">
                                            <label class="block text-sm font-medium text-slate-600 mb-1">Apellidos *</label>
                                            <input type="text" wire:model="data.last_name"
                                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                            @error('data.last_name') <span
                                            class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Row 3: Type Selection -->
                            <div class="group">
                                <label class="block text-sm font-medium text-slate-600 mb-1">¿Presentar una petición, queja
                                    / reclamo o recurso? *</label>
                                <div class="relative">
                                    <select wire:model.live="data.type"
                                        class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                        <option value="">Selecciona una opción...</option>
                                        <option value="peticion">Petición (Solicitud de información)</option>
                                        <option value="queja_reclamo">Queja / Reclamo (Inconformidad o Falla)</option>
                                        <option value="sugerencia">Sugerencia</option>
                                        <option value="recurso_subsidio">Recurso de Reposición en Subsidio de Apelación
                                        </option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('data.type') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Row 3.1: Previous CUN for Recurso -->
                            @if($data['type'] === 'recurso_subsidio')
                                <div class="group animate-fade-in">
                                    <label class="block text-sm font-medium text-slate-600 mb-1">CUN</label>
                                    <div class="relative">
                                        <input type="text" wire:model.blur="previous_cun" placeholder="Ej: PQR-25-0000000001"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm {{ $validPreviousCun ? 'border-green-500 ring-1 ring-green-500' : '' }}">
                                        @if($validPreviousCun)
                                            <div class="absolute inset-y-0 right-0 flex items-center px-3 text-green-500">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    @error('previous_cun')
                                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                    @enderror

                                    <p class="text-xs text-slate-500 mt-2">
                                        Digite los 16 dígitos del CUN con el que radicó su PQR inicial
                                    </p>
                                </div>
                            @endif

                            @if($data['type'] === 'queja_reclamo')
                                <!-- Row 3.5 Typologies -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-fade-in">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Tipología *</label>
                                        <div class="relative">
                                            <select wire:model.live="data.typology"
                                                class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                                <option value="">Selecciona...</option>
                                                @foreach(\App\Livewire\CreatePqrs::TYPOLOGIES as $typology => $subtypes)
                                                    <option value="{{ $typology }}">{{ $typology }}</option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('data.typology') <span
                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Detalle *</label>
                                        <div class="relative">
                                            <select wire:model="data.sub_typology"
                                                class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm"
                                                @if(empty($data['typology'])) disabled @endif>
                                                <option value="">Selecciona...</option>
                                                @if(!empty($data['typology']) && isset(\App\Livewire\CreatePqrs::TYPOLOGIES[$data['typology']]))
                                                    @foreach(\App\Livewire\CreatePqrs::TYPOLOGIES[$data['typology']] as $subTypology)
                                                        <option value="{{ $subTypology }}">{{ $subTypology }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('data.sub_typology') <span
                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @endif

                            <!-- Row 4 -->
                            @if(!$validPreviousCun)
                                <div class="group">
                                    <label class="block text-sm font-medium text-slate-600 mb-3">Selecciona el servicio Objeto
                                        de la PQR:</label>
                                    <div class="flex flex-wrap gap-6">
                                        <label class="flex items-center space-x-3 cursor-pointer">
                                            <input type="checkbox" wire:model="data.services" value="Cámaras de seguridad"
                                                class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary">
                                            <span class="text-slate-700">Cámaras de seguridad</span>
                                        </label>
                                        <label class="flex items-center space-x-3 cursor-pointer">
                                            <input type="checkbox" wire:model="data.services" value="Televisión"
                                                class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary">
                                            <span class="text-slate-700">Televisión</span>
                                        </label>
                                        <label class="flex items-center space-x-3 cursor-pointer">
                                            <input type="checkbox" wire:model="data.services" value="Internet"
                                                class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary">
                                            <span class="text-slate-700">Internet</span>
                                        </label>
                                    </div>
                                    @error('data.services') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Row 5 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">¿Cuál es el correo al cual
                                            quiere que llegue la respuesta?</label>
                                        <input type="email" wire:model="data.email"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                        @error('data.email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Confirma el correo
                                            electrónico</label>
                                        <input type="email" wire:model="data.email_confirmation"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                    </div>
                                </div>

                                <!-- Row 6 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Dirección Física *</label>
                                        <input type="text" wire:model="data.address"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                        @error('data.address') <span
                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Sede *</label>
                                        <div class="relative">
                                            <select wire:model="data.city"
                                                class="w-full pl-4 pr-10 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all appearance-none cursor-pointer text-slate-700 shadow-sm">
                                                <option value="">Selecciona...</option>
                                                <option value="Montería">Montería</option>
                                                <option value="Puerto Libertador">Puerto Libertador</option>
                                                <option value="San Pedro de Urabá">San Pedro de Urabá</option>
                                                <option value="Tierralta">Tierralta</option>
                                                <option value="Valencia">Valencia</option>
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('data.city') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Row 7 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Número de contacto
                                            celular</label>
                                        <input type="tel" wire:model="data.phone"
                                            x-on:input="$el.value = $el.value.replace(/[^0-9]/g, '')"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                        @error('data.phone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="group">
                                        <label class="block text-sm font-medium text-slate-600 mb-1">Teléfono de
                                            contacto</label>
                                        <input type="tel" wire:model="data.landline"
                                            x-on:input="$el.value = $el.value.replace(/[^0-9]/g, '')"
                                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm">
                                        @error('data.landline') <span
                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @endif

                            <!-- Row 8 -->
                            <div class="group">
                                <label class="block text-sm font-medium text-slate-600 mb-1">Cuéntanos qué ocurrió y qué
                                    necesitas que resolvamos *</label>
                                <textarea wire:model="data.description" rows="5"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-secondary focus:border-secondary transition-all shadow-sm"></textarea>
                                @error('data.description') <span
                                class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Row 9 -->
                            <div class="group">
                                <label class="block text-sm font-medium text-slate-600 mb-1">Adjuntar soportes/anexos (PDF,
                                    JPG y JPEG, max 50MB)</label>
                                <div
                                    class="bg-blue-50 border border-blue-100 rounded-xl p-6 border-dashed border-2 hover:border-blue-300 transition-colors cursor-pointer relative group">
                                    <input type="file" wire:model.live="attachments" multiple accept=".pdf,.jpg,.jpeg,.png"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-blue-900">SELECCIONAR ARCHIVO</span>
                                        <button type="button"
                                            class="px-4 py-2 bg-cyan-400 text-white font-bold rounded-lg uppercase text-sm">Seleccionar
                                            Archivo</button>
                                    </div>
                                    @error('attachments.*') <span
                                    class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
                                    <div wire:loading wire:target="attachments"
                                        class="text-center mt-2 text-sm text-blue-600 font-medium animate-pulse">Subiendo
                                        archivos...</div>
                                </div>

                                <!-- File Preview List -->
                                @if(count($attachments) > 0)
                                    <div class="mt-4 space-y-2">
                                        @foreach($attachments as $index => $attachment)
                                            <div wire:key="attachment-{{ $index }}"
                                                class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-lg">
                                                <div class="flex items-center gap-3 overflow-hidden">
                                                    <div
                                                        class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <span
                                                        class="text-sm text-slate-700 truncate">{{ $attachment->getClientOriginalName() }}</span>
                                                </div>
                                                <button type="button" wire:click="removeAttachment({{ $index }})"
                                                    class="text-slate-400 hover:text-red-500 transition-colors p-1">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Data Privacy Policy & Authorization -->
                        @if($data['type'] !== 'recurso_subsidio')
                            <div class="space-y-4">
                                <div class="group">
                                    <label class="flex items-start gap-3 cursor-pointer">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" wire:model="data.authorize_email_documents"
                                                class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary transition-all">
                                        </div>
                                        <div class="text-sm text-slate-600">
                                            Autorizo el envío de notificaciones y documentos relacionados con esta solicitud al
                                            correo electrónico proporcionado. (Opcional)
                                        </div>
                                    </label>
                                </div>

                                <div class="group">
                                    <label class="flex items-start gap-3 cursor-pointer">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" wire:model="data.data_treatment_accepted"
                                                class="w-5 h-5 text-secondary border-slate-300 rounded focus:ring-secondary transition-all">
                                        </div>
                                        <div class="text-sm text-slate-600">
                                            He leído y acepto la
                                            <a href="https://intalnet.com/politica-tratamiento-datos" target="_blank"
                                                class="text-primary font-bold hover:underline">
                                                Política de Tratamiento de Datos Personales
                                            </a>, y autorizo el
                                            <a href="#" @click.prevent="showDataAuthModal = true"
                                                class="text-primary font-bold hover:underline">
                                                Tratamiento de mis Datos Personales
                                            </a>.
                                        </div>

                                    </label>
                                    @error('data.data_treatment_accepted') <span class="text-red-500 text-sm mt-1 block">Debes
                                    aceptar la política de tratamiento de datos para continuar.</span> @enderror
                                </div>
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full py-4 bg-gradient-to-r from-primary to-slate-800 text-white font-bold rounded-xl shadow-lg shadow-primary/30 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2 group">
                                <span wire:loading.remove wire:target="save">Radicar Solicitud</span>
                                <span wire:loading wire:target="save">Procesando...</span>
                                <svg wire:loading.remove wire:target="save"
                                    class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                                <svg wire:loading wire:target="save" class="animate-spin h-5 w-5 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="text-[10px] text-justify text-slate-400 leading-tight mt-4">
                            @if($data['type'] === 'recurso_subsidio')
                                De conformidad con lo dispuesto en la regulación vigente, INTALNET TELECOMUNICACIONES, informa
                                al usuario que su recurso será resuelto de fondo dentro de un término máximo de quince (15) días
                                hábiles, contados a partir del día hábil siguiente a la fecha de su radicación. Si su recurso de
                                reposición no es atendido en la fecha indicada, se entenderá que ha sido resuelto a su favor.
                                (Esto se llama Silencio Administrativo Positivo). RECURSO DE REPOSICIÓN bajo el cual solicita a
                                INTALNET TELECOMUNICACIONES, que revise nuevamente la decisión o RECURSO DE REPOSICION Y EN
                                SUBSIDIO APELACION para que INTALNET TELECOMUNICACIONES revise la decisión y si no se accede a
                                lo solicitado remita el expediente a la Superintendencia de Industria y Comercio (SIC) para que
                                esta entidad revise y adopte una decisión final y definitiva. Para estos efectos, INTALNET
                                TELECOMUNICACIONES, tiene habilitados los siguientes canales de atención: Teléfono de Atención
                                al Cliente 3148042601, correo electrónico pqr@intalnet.com, y la página web
                                https://intalnettelecomunicaciones.com/, a través de los cuales el usuario podrá radicar sus
                                solicitudes y hacer seguimiento a las mismas.
                            @else
                                De conformidad con lo dispuesto en la regulación vigente, INTALNET TELECOMUNICACIONES, informa
                                al usuario que las PQRS presentados, serán atendidos y resueltos mediante una respuesta clara,
                                completa y de fondo dentro de un término máximo de quince (15) días hábiles, contados a partir
                                del día hábil siguiente a la fecha de su radicación. Si su PQR no es atendida en la fecha
                                indicada, se entenderá que ha sido resuelta a su favor. (Esto se llama Silencio Administrativo
                                Positivo). RECURSOS. Dentro de los 10 días hábiles siguientes a la notificación de la decisión y
                                cuando INTALNET TELECOMUNICACIONES NO resuelva a su favor la petición o queja, en relación con
                                actos de negativa del contrato, suspensión del servicio, terminación del contrato, corte y
                                facturación, Ud, tendrá derecho a solicitar que se reconsidere la decisión tomada, a través de
                                la presentación de recursos en cualquiera de los canales de atención, teniendo la opción de
                                presentar RECURSO DE REPOSICIÓN bajo el cual solicita a INTALNET TELECOMUNICACIONES, que revise
                                nuevamente la decisión o RECURSO DE REPOSICION Y EN SUBSIDIO APELACION para que INTALNET
                                TELECOMUNICACIONES revise la decisión y si no se accede a lo solicitado remita el expediente a
                                la Superintendencia de Industria y Comercio (SIC) para que esta entidad revise y adopte una
                                decisión final y definitiva. Para estos efectos, INTALNET TELECOMUNICACIONES, tiene habilitados
                                los siguientes canales de atención: Teléfono de Atención al Cliente 3148042601, correo
                                electrónico pqr@intalnet.com, y la página web https://intalnettelecomunicaciones.com/, a través
                                de los cuales el usuario podrá radicar sus solicitudes y hacer seguimiento a las mismas.
                            @endif
                        </div>

                    </form>
                @endif
            </div>
        </div>

        <!-- Trust Indicators -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
                class="p-6 bg-white/60 rounded-2xl backdrop-blur-sm border border-white/50 shadow-sm flex flex-col items-center text-center hover:bg-white/80 transition-colors">
                <div
                    class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-2xl mb-3">
                    🔒</div>
                <h3 class="text-sm font-bold text-slate-800 uppercase mb-2">Datos Seguros</h3>
                <p class="text-xs text-slate-600 leading-relaxed max-w-xs">
                    Tu información está protegida bajo estrictos estándares de seguridad y cifrado, garantizando la
                    confidencialidad de tus datos personales.
                </p>
            </div>
            <div
                class="p-6 bg-white/60 rounded-2xl backdrop-blur-sm border border-white/50 shadow-sm flex flex-col items-center text-center hover:bg-white/80 transition-colors">
                <div
                    class="w-12 h-12 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center text-2xl mb-3">
                    ⚖️</div>
                <h3 class="text-sm font-bold text-slate-800 uppercase mb-2">Respaldo Legal</h3>

                <details class="group w-full">
                    <summary
                        class="flex justify-center items-center gap-2 cursor-pointer list-none text-xs text-slate-600 hover:text-primary transition-colors font-medium">
                        <span>Entidades de Vigilancia</span>
                        <span class="transition group-open:rotate-180">▼</span>
                    </summary>
                    <div class="mt-4 grid grid-cols-3 gap-2 animate-fade-in">
                        <a href="https://www.sic.gov.co" target="_blank"
                            class="flex flex-col items-center p-2 bg-white rounded-lg border border-slate-100 hover:shadow-md transition-all">
                            <span class="text-xl mb-1">🏛️</span>
                            <span class="text-[10px] font-bold text-slate-700">SIC</span>
                        </a>
                        <a href="https://www.mintic.gov.co" target="_blank"
                            class="flex flex-col items-center p-2 bg-white rounded-lg border border-slate-100 hover:shadow-md transition-all">
                            <span class="text-xl mb-1">📡</span>
                            <span class="text-[10px] font-bold text-slate-700">MinTIC</span>
                        </a>
                        <a href="https://www.crcom.gov.co" target="_blank"
                            class="flex flex-col items-center p-2 bg-white rounded-lg border border-slate-100 hover:shadow-md transition-all">
                            <span class="text-xl mb-1">📊</span>
                            <span class="text-[10px] font-bold text-slate-700">CRC</span>
                        </a>
                    </div>
                    <p class="text-[10px] text-slate-500 mt-3 leading-relaxed">
                        Tu solicitud genera un <strong>Código CUN</strong> oficial, validado por estas entidades.
                    </p>
                </details>
            </div>

            <!-- Data Treatment Modal -->
            <div x-show="showDataAuthModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <!-- Backdrop -->
                <div x-show="showDataAuthModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity"
                    @click="showDataAuthModal = false"></div>

                <!-- Modal Panel -->
                <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                    <div x-show="showDataAuthModal" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl">
                        <!-- Close Button -->
                        <div class="absolute right-0 top-0 pr-4 pt-4 z-10">
                            <button @click="showDataAuthModal = false" type="button"
                                class="rounded-md bg-white text-slate-400 hover:text-slate-500 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2">
                                <span class="sr-only">Cerrar</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Content -->
                        <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4 max-h-[80vh] overflow-y-auto">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-left sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-2xl font-bold leading-6 text-slate-900 mb-6 text-center"
                                        id="modal-title">
                                        FORMATO DE AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES – CENTRALES DE
                                        RIESGOS
                                    </h3>
                                    <div class="mt-2 text-sm text-slate-600 space-y-4 leading-relaxed text-justify">
                                        <p>
                                            Yo, actuando en nombre propio o en mi calidad de representante legal,
                                            identificado(a) con los datos suministrados en el presente formulario, para
                                            efectos del tratamiento de datos personales, por medio del presente
                                            documento, autorizo a INVERSIONES ZULUAGA SEJIN S.A.S., en adelante,
                                            INTALNET TELECOMUNICACIONES, identificada con NIT. 900.888.246-0, como
                                            responsable del tratamiento de mis datos personales para: procesar,
                                            recolectar, almacenar, usar, circular, suprimir, compartir, actualizar,
                                            transferir y/o transmitir dentro o fuera del territorio de la República de
                                            Colombia, mis datos personales, bajo los lineamientos legales
                                            correspondientes y respetando los derechos de los titulares de los datos,
                                            principalmente, para hacer posible la relación de Usuario –
                                            Operador/Proveedor de Servicios de Comunicaciones, según aplique, así como
                                            también, para efectuar reportes a las autoridades de control y vigilancia
                                            cuando resulte aplicable, y/o para otros usos, con fines administrativos,
                                            comerciales, publicitarios y para efectos de contactar a los titulares de
                                            los mismos, y en general, para los asuntos relacionados con el objeto del
                                            contrato de prestación de servicios de comunicaciones suscrito entre el
                                            Titular e INTALNET TELECOMUNICACIONES; y, de forma específica según aplique
                                            en cada caso, para:
                                        </p>
                                        <ol class="list-decimal pl-5 space-y-2">
                                            <li>Ejecutar el Contrato de Prestación de Servicios de Comunicaciones
                                                suscrito con INTALNET TELECOMUNICACIONES.</li>
                                            <li>Realizar el pago de las obligaciones contractuales.</li>
                                            <li>Enviar la información a entidades gubernamentales o de Control y
                                                Vigilancia por solicitud expresa de las mismas.</li>
                                            <li>Soportar procesos de auditoría externa e interna.</li>
                                            <li>Enviar y recibir mensajes con fines comerciales, publicitarios y/o de
                                                atención al cliente.</li>
                                            <li>Registrar la información de los clientes, aliados y proveedores en las
                                                bases de datos de INTALNET TELECOMUNICACIONES, con la finalidad de
                                                analizar, evaluar y generar datos estadísticos, así como indicadores,
                                                resultados comerciales, investigaciones de mercados, variables de sus
                                                negocios y/o cualquier otra consideración relacionada directa o
                                                indirectamente con la actividad económica y comercial que realicen las
                                                partes y resulte necesaria para el desarrollo de las actividades para
                                                las cuales tienen una relación contractual o comercial, entre otras.
                                            </li>
                                            <li>Contactar al cliente para el envío de información referida a la relación
                                                contractual, comercial y obligacional a que haya lugar.</li>
                                            <li>Recolectar datos para el cumplimiento de los deberes que, como
                                                Responsable de la información y de los datos personales, le corresponden
                                                a INTALNET TELECOMUNICACIONES.</li>
                                            <li>Contactarlo vía telefónica, vía redes sociales o por correo electrónico,
                                                para atender y dar seguimiento a las solicitudes de servicios y/o
                                                productos.</li>
                                            <li>Elaboración de facturación física, facturación electrónica y notas de
                                                crédito, derivadas de la prestación de servicios de INTALNET
                                                TELECOMUNICACIONES.</li>
                                            <li>Cualquier otra finalidad que resulte en el desarrollo del contrato o de
                                                la relación que existe entre el Titular e INTALNET TELECOMUNICACIONES.
                                            </li>
                                        </ol>
                                        <p>
                                            En este mismo sentido, manifiesto que, INTALNET TELECOMUNICACIONES me
                                            informó sobre los derechos que me asisten como Titular de mis datos
                                            personales, especialmente a: acceder en forma gratuita a los datos
                                            proporcionados que hayan sido objeto de tratamiento; solicitar la
                                            actualización y rectificación de la información frente a datos parciales,
                                            inexactos, incompletos, fraccionados, que induzcan a error, o a aquellos
                                            cuyo tratamiento esté prohibido o no haya sido autorizado; solicitar prueba
                                            de la autorización otorgada y a presentar ante la Superintendencia de
                                            Industria y Comercio (SIC) quejas por infracciones a lo dispuesto en la
                                            normatividad vigente; revocar la autorización y/o solicitar la supresión del
                                            dato, a menos que exista un deber legal o contractual que haga imperativo
                                            conservar la información; abstenerse de responder las preguntas sobre datos
                                            sensibles o sobre datos de las niñas y niños y adolescentes.
                                        </p>
                                        <p>
                                            Lo anterior conforme a lo establecido en la Constitución Política de
                                            Colombia, en la Ley 1581 de 2012 y demás normas que la modifiquen,
                                            complementen o adicionen, así como también en la Política de Tratamiento de
                                            Datos Personales adoptada por INTALNET TELECOMUNICACIONES, la cual está
                                            publicada en la página web https://intalnettelecomunicaciones.com/.
                                        </p>
                                        <p>
                                            La presente autorización no impedirá que, el abajo firmante o a su
                                            representada, pueda ejercer el derecho a solicitar actualizar o modificar en
                                            cualquier tiempo ante INTALNET TELECOMUNICACIONES, la información
                                            suministrada y a ser informado sobre las correcciones efectuadas o a
                                            solicitar la revocatoria de sus datos, siempre y cuando no exista un deber
                                            legal o contractual que lo obligue a estar en la base de datos de INTALNET
                                            TELECOMUNICACIONES. La atención de requerimientos relacionados con el
                                            tratamiento de sus datos personales o el ejercicio de los derechos
                                            mencionados en esta autorización, serán atendidos en el correo electrónico:
                                            pqr@intalnet.com
                                        </p>
                                        <p>
                                            Igualmente, por medio del presente documento, como Titular de los datos
                                            personales, declaro que conozco la Política de Tratamiento de Datos de
                                            INTALNET TELECOMUNICACIONES, la cual, fue puesta a mi disposición de manera
                                            previa a la recolección de mis datos personales y que se encuentra dispuesta
                                            en medio digital en la página web https://intalnettelecomunicaciones.com/,
                                            donde además, también se encuentra contenido el procedimiento para presentar
                                            consultas y reclamos, relacionados con el tratamiento de mis datos, entre
                                            otros aspectos.
                                        </p>
                                        <p>
                                            De otra parte, por medio del presente documento, autorizo a INTALNET
                                            TELECOMUNICACIONES, en caso de que aplique, a realizar las consultas
                                            necesarias, sobre mi comportamiento crediticio y a efectuar el reporte
                                            negativo ante las Centrales de Riesgo frente a incumplimientos que puedan
                                            afectar a INTALNET TELECOMUNICACIONES.
                                        </p>
                                        <p>
                                            Finalmente, manifiesto que la presente autorización me fue solicitada y
                                            puesta de presente antes de entregar mis datos personales y que la suscribo
                                            de forma libre y voluntaria una vez leída en su totalidad.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button"
                                class="inline-flex w-full justify-center rounded-xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 transition-all sm:ml-3 sm:w-auto"
                                @click="showDataAuthModal = false; @this.set('data.data_treatment_accepted', true)">
                                Aceptar y Continuar
                            </button>
                            <button type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-6 py-3 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto transition-all"
                                @click="showDataAuthModal = false">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Data Treatment Modal -->
    <div x-show="showDataAuthModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div x-show="showDataAuthModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity"
            @click="showDataAuthModal = false"></div>

        <!-- Modal Panel -->
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div x-show="showDataAuthModal" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl">
                <!-- Close Button -->
                <div class="absolute right-0 top-0 pr-4 pt-4 z-10">
                    <button @click="showDataAuthModal = false" type="button"
                        class="rounded-md bg-white text-slate-400 hover:text-slate-500 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2">
                        <span class="sr-only">Cerrar</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Content -->
                <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4 max-h-[80vh] overflow-y-auto">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-left sm:mt-0 sm:text-left w-full">
                            <h3 class="text-2xl font-bold leading-6 text-slate-900 mb-6 text-center" id="modal-title">
                                FORMATO DE AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES – CENTRALES DE RIESGOS
                            </h3>
                            <div class="mt-2 text-sm text-slate-600 space-y-4 leading-relaxed text-justify">
                                <p>
                                    Yo, actuando en nombre propio o en mi calidad de representante legal,
                                    identificado(a) con los datos suministrados en el presente formulario, para efectos
                                    del tratamiento de datos personales, por medio del presente documento, autorizo a
                                    INVERSIONES ZULUAGA SEJIN S.A.S., en adelante, INTALNET TELECOMUNICACIONES,
                                    identificada con NIT. 900.888.246-0, como responsable del tratamiento de mis datos
                                    personales para: procesar, recolectar, almacenar, usar, circular, suprimir,
                                    compartir, actualizar, transferir y/o transmitir dentro o fuera del territorio de la
                                    República de Colombia, mis datos personales, bajo los lineamientos legales
                                    correspondientes y respetando los derechos de los titulares de los datos,
                                    principalmente, para hacer posible la relación de Usuario – Operador/Proveedor de
                                    Servicios de Comunicaciones, según aplique, así como también, para efectuar reportes
                                    a las autoridades de control y vigilancia cuando resulte aplicable, y/o para otros
                                    usos, con fines administrativos, comerciales, publicitarios y para efectos de
                                    contactar a los titulares de los mismos, y en general, para los asuntos relacionados
                                    con el objeto del contrato de prestación de servicios de comunicaciones suscrito
                                    entre el Titular e INTALNET TELECOMUNICACIONES; y, de forma específica según aplique
                                    en cada caso, para:
                                </p>
                                <ol class="list-decimal pl-5 space-y-2">
                                    <li>Ejecutar el Contrato de Prestación de Servicios de Comunicaciones suscrito con
                                        INTALNET TELECOMUNICACIONES.</li>
                                    <li>Realizar el pago de las obligaciones contractuales.</li>
                                    <li>Enviar la información a entidades gubernamentales o de Control y Vigilancia por
                                        solicitud expresa de las mismas.</li>
                                    <li>Soportar procesos de auditoría externa e interna.</li>
                                    <li>Enviar y recibir mensajes con fines comerciales, publicitarios y/o de atención
                                        al cliente.</li>
                                    <li>Registrar la información de los clientes, aliados y proveedores en las bases de
                                        datos de INTALNET TELECOMUNICACIONES, con la finalidad de analizar, evaluar y
                                        generar datos estadísticos, así como indicadores, resultados comerciales,
                                        investigaciones de mercados, variables de sus negocios y/o cualquier otra
                                        consideración relacionada directa o indirectamente con la actividad económica y
                                        comercial que realicen las partes y resulte necesaria para el desarrollo de las
                                        actividades para las cuales tienen una relación contractual o comercial, entre
                                        otras.</li>
                                    <li>Contactar al cliente para el envío de información referida a la relación
                                        contractual, comercial y obligacional a que haya lugar.</li>
                                    <li>Recolectar datos para el cumplimiento de los deberes que, como Responsable de la
                                        información y de los datos personales, le corresponden a INTALNET
                                        TELECOMUNICACIONES.</li>
                                    <li>Contactarlo vía telefónica, vía redes sociales o por correo electrónico, para
                                        atender y dar seguimiento a las solicitudes de servicios y/o productos.</li>
                                    <li>Elaboración de facturación física, facturación electrónica y notas de crédito,
                                        derivadas de la prestación de servicios de INTALNET TELECOMUNICACIONES.</li>
                                    <li>Cualquier otra finalidad que resulte en el desarrollo del contrato o de la
                                        relación que existe entre el Titular e INTALNET TELECOMUNICACIONES.</li>
                                </ol>
                                <p>
                                    En este mismo sentido, manifiesto que, INTALNET TELECOMUNICACIONES me informó sobre
                                    los derechos que me asisten como Titular de mis datos personales, especialmente a:
                                    acceder en forma gratuita a los datos proporcionados que hayan sido objeto de
                                    tratamiento; solicitar la actualización y rectificación de la información frente a
                                    datos parciales, inexactos, incompletos, fraccionados, que induzcan a error, o a
                                    aquellos cuyo tratamiento esté prohibido o no haya sido autorizado; solicitar prueba
                                    de la autorización otorgada y a presentar ante la Superintendencia de Industria y
                                    Comercio (SIC) quejas por infracciones a lo dispuesto en la normatividad vigente;
                                    revocar la autorización y/o solicitar la supresión del dato, a menos que exista un
                                    deber legal o contractual que haga imperativo conservar la información; abstenerse
                                    de responder las preguntas sobre datos sensibles o sobre datos de las niñas y niños
                                    y adolescentes.
                                </p>
                                <p>
                                    Lo anterior conforme a lo establecido en la Constitución Política de Colombia, en la
                                    Ley 1581 de 2012 y demás normas que la modifiquen, complementen o adicionen, así
                                    como también en la Política de Tratamiento de Datos Personales adoptada por INTALNET
                                    TELECOMUNICACIONES, la cual está publicada en la página web
                                    https://intalnettelecomunicaciones.com/.
                                </p>
                                <p>
                                    La presente autorización no impedirá que, el abajo firmante o a su representada,
                                    pueda ejercer el derecho a solicitar actualizar o modificar en cualquier tiempo ante
                                    INTALNET TELECOMUNICACIONES, la información suministrada y a ser informado sobre las
                                    correcciones efectuadas o a solicitar la revocatoria de sus datos, siempre y cuando
                                    no exista un deber legal o contractual que lo obligue a estar en la base de datos de
                                    INTALNET TELECOMUNICACIONES. La atención de requerimientos relacionados con el
                                    tratamiento de sus datos personales o el ejercicio de los derechos mencionados en
                                    esta autorización, serán atendidos en el correo electrónico: pqr@intalnet.com
                                </p>
                                <p>
                                    Igualmente, por medio del presente documento, como Titular de los datos personales,
                                    declaro que conozco la Política de Tratamiento de Datos de INTALNET
                                    TELECOMUNICACIONES, la cual, fue puesta a mi disposición de manera previa a la
                                    recolección de mis datos personales y que se encuentra dispuesta en medio digital en
                                    la página web https://intalnettelecomunicaciones.com/, donde además, también se
                                    encuentra contenido el procedimiento para presentar consultas y reclamos,
                                    relacionados con el tratamiento de mis datos, entre otros aspectos.
                                </p>
                                <p>
                                    De otra parte, por medio del presente documento, autorizo a INTALNET
                                    TELECOMUNICACIONES, en caso de que aplique, a realizar las consultas necesarias,
                                    sobre mi comportamiento crediticio y a efectuar el reporte negativo ante las
                                    Centrales de Riesgo frente a incumplimientos que puedan afectar a INTALNET
                                    TELECOMUNICACIONES.
                                </p>
                                <p>
                                    Finalmente, manifiesto que la presente autorización me fue solicitada y puesta de
                                    presente antes de entregar mis datos personales y que la suscribo de forma libre y
                                    voluntaria una vez leída en su totalidad.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button"
                        class="inline-flex w-full justify-center rounded-xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 transition-all sm:ml-3 sm:w-auto"
                        @click="showDataAuthModal = false; @this.set('data.data_treatment_accepted', true)">
                        Aceptar y Continuar
                    </button>
                    <button type="button"
                        class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-6 py-3 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto transition-all"
                        @click="showDataAuthModal = false">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>