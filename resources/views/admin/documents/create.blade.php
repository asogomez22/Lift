<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    {{ __('Subir Nuevo Documento') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Añade un archivo PDF a la biblioteca de recursos</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white overflow-hidden shadow-sm ring-1 ring-slate-900/5 sm:rounded-2xl">
            <div class="p-8">
                
                @if ($errors->any())
                    <div class="mb-8 bg-red-50 border border-red-100 text-red-700 px-4 py-3 rounded-xl">
                        <div class="font-bold flex items-center gap-2 mb-2">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            Por favor corrige los siguientes errores:
                        </div>
                        <ul class="list-disc list-inside text-sm space-y-1 ml-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <!-- Section 1: Basic Info -->
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-2 mb-6 flex items-center gap-2">
                            <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-100 text-slate-500 text-xs">1</span>
                            Información del Documento
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-1 md:col-span-2">
                                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Título del Documento <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="title" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-900 placeholder:text-slate-300 transition-colors py-3" placeholder="Ej: Manual de Seguridad 2024" value="{{ old('title') }}" required>
                            </div>

                            <div>
                                <label for="section" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Sección <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select name="section" id="section" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-900 appearance-none py-3" required>
                                        <option value="" disabled selected>Selecciona una sección...</option>
                                        <option value="formacion" {{ old('section') == 'formacion' ? 'selected' : '' }}>Formación</option>
                                        <option value="proyectos" {{ old('section') == 'proyectos' ? 'selected' : '' }}>Proyectos</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                                        <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                                <p class="text-[10px] text-slate-400 mt-1.5 ml-1">Determina dónde aparecerá este documento en la web.</p>
                            </div>

                            <div>
                                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Descripción Corta</label>
                                <input type="text" name="description" id="description" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-900 placeholder:text-slate-300 transition-colors py-3" placeholder="Ej: Formación técnica avanzada" value="{{ old('description') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: File Upload -->
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-2 mb-6 flex items-center gap-2">
                            <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-100 text-slate-500 text-xs">2</span>
                            Archivo
                        </h3>

                        <div class="relative group">
                            <label for="file" class="block w-full border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center hover:border-(--liftRed) hover:bg-red-50/20 transition-all cursor-pointer group-hover:shadow-sm">
                                <div class="space-y-3">
                                    <div class="h-12 w-12 bg-slate-50 rounded-full flex items-center justify-center mx-auto text-slate-400 group-hover:bg-red-100 group-hover:text-(--liftRed) transition-colors">
                                        <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                    </div>
                                    <div class="text-sm font-medium text-slate-700">
                                        <span class="text-(--liftRed) font-bold group-hover:underline">Haz clic para subir un archivo</span> o arrástralo aquí
                                    </div>
                                    <p class="text-xs text-slate-500">Solo archivos PDF hasta 10MB</p>
                                </div>
                                <input type="file" name="file" id="file" accept="application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required onchange="document.getElementById('file-name').textContent = this.files[0] ? this.files[0].name : ''">
                            </label>
                            <div id="file-name" class="text-center mt-2 text-sm font-bold text-(--liftRed)"></div>
                        </div>
                    </div>

                    <!-- Section 3: Settings -->
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-2 mb-6 flex items-center gap-2">
                            <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-100 text-slate-500 text-xs">3</span>
                            Ajustes
                        </h3>

                        <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                            <label class="flex items-center cursor-pointer justify-between">
                                <div>
                                    <div class="text-sm font-bold text-slate-900">Visibilidad Pública</div>
                                    <div class="text-xs text-slate-500">Si se desactiva, el documento no aparecerá en la web pero seguirá guardado.</div>
                                </div>
                                <div class="relative">
                                    <input type="checkbox" name="is_visible" value="1" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-500"></div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
                        <a href="{{ route('documents.index') }}" class="px-6 py-2.5 rounded-xl text-sm font-bold text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-(--liftRed) hover:bg-red-700 text-white font-bold py-2.5 px-8 rounded-xl shadow-lg shadow-red-500/20 transition-all transform hover:-translate-y-0.5">
                            <i class="fa-solid fa-save mr-2"></i>
                            Guardar Documento
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
