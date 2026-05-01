<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    Añadir Proyecto
                </h2>
                <p class="text-sm text-slate-500 mt-1">Crea un nuevo proyecto para mostrar en la web</p>
            </div>
            <a href="{{ route('projects.index') }}"
                class="text-sm font-bold text-slate-500 hover:text-(--liftRed) transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-900/5 p-8">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Título del Proyecto <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" required placeholder="Ej: BASF PDH TARRAGONA"
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description"
                        class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Descripción
                    </label>
                    <textarea name="description" id="description" rows="3"
                        placeholder="Breve descripción del proyecto..."
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tags -->
                <div class="mb-6">
                    <label for="tags" class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Etiquetas
                    </label>
                    <input type="text" name="tags" id="tags"
                        placeholder="Tarragona, Planta, Izaje (separadas por comas)"
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3"
                        value="{{ old('tags') }}">
                    @error('tags')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cover Image Upload -->
                <div class="mb-6">
                    <label for="cover_image"
                        class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Imagen de Portada <span class="text-red-500">*</span>
                    </label>

                    <label for="cover_image"
                        class="block w-full border-2 border-dashed border-slate-200 rounded-xl p-8 text-center hover:border-(--liftRed) hover:bg-red-50/10 transition-all cursor-pointer">
                        <div class="space-y-2">
                            <i class="fa-regular fa-image text-slate-400 text-4xl"></i>
                            <div class="text-sm font-medium text-slate-600">
                                <span class="text-(--liftRed) font-bold">Selecciona la imagen de portada</span>
                            </div>
                            <p class="text-xs text-slate-400">JPG, PNG, WebP (Max 5MB) - Recomendado: 1200x800px</p>
                        </div>
                        <input type="file" name="cover_image" id="cover_image" accept="image/*,.svg,.gif,.webp" required
                            class="hidden">
                    </label>
                    @error('cover_image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gallery Images Upload -->
                <div class="mb-8">
                    <label for="gallery_images"
                        class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Imágenes de Galería (Opcional)
                    </label>
                    <p class="text-xs text-slate-500 mb-3">Estas imágenes se mostrarán dentro de la vista del proyecto
                    </p>

                    <label for="gallery_images"
                        class="block w-full border-2 border-dashed border-slate-200 rounded-xl p-8 text-center hover:border-(--liftRed) hover:bg-red-50/10 transition-all cursor-pointer">
                        <div class="space-y-2">
                            <i class="fa-regular fa-images text-slate-400 text-4xl"></i>
                            <div class="text-sm font-medium text-slate-600">
                                <span class="text-(--liftRed) font-bold">Selecciona múltiples imágenes</span>
                            </div>
                            <p class="text-xs text-slate-400">Puedes seleccionar varias imágenes a la vez (Max 5MB cada
                                una)</p>
                        </div>
                        <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                            class="hidden">
                    </label>
                    @error('gallery_images.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('projects.index') }}"
                        class="text-slate-500 hover:text-slate-700 font-medium">Cancelar</a>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-sm transition">
                        Crear Proyecto
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>