<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    Editar Proyecto
                </h2>
                <p class="text-sm text-slate-500 mt-1">Actualiza la información del proyecto</p>
            </div>
            <a href="{{ route('projects.index') }}"
                class="text-sm font-bold text-slate-500 hover:text-(--liftRed) transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-900/5 p-8">
            <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Título del Proyecto <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" required placeholder="Ej: BASF PDH TARRAGONA"
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3"
                        value="{{ old('title', $project->title) }}">
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
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3">{{ old('description', $project->description) }}</textarea>
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
                        value="{{ old('tags', $project->tags) }}">
                    @error('tags')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Cover Image -->
                <div class="mb-6">
                    <label class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Imagen de Portada Actual
                    </label>
                    <div
                        class="aspect-video max-w-2xl mx-auto rounded-xl overflow-hidden border border-slate-200 shadow-sm bg-slate-50">
                        @if($project->cover_image)
                            <img src="{{ str_starts_with($project->cover_image, 'projects/') ? asset('storage/' . $project->cover_image) : asset($project->cover_image) }}"
                                alt="{{ $project->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                                class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>

                <!-- New Cover Image Upload (Optional) -->
                <div class="mb-6">
                    <label for="cover_image"
                        class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Nueva Imagen de Portada (Opcional)
                    </label>

                    <label for="cover_image"
                        class="block w-full border-2 border-dashed border-slate-200 rounded-xl p-8 text-center hover:border-(--liftRed) hover:bg-red-50/10 transition-all cursor-pointer">
                        <div class="space-y-2">
                            <i class="fa-regular fa-image text-slate-400 text-4xl"></i>
                            <div class="text-sm font-medium text-slate-600">
                                <span class="text-(--liftRed) font-bold">Selecciona nueva imagen de portada</span>
                            </div>
                            <p class="text-xs text-slate-400">JPG, PNG, WebP (Max 5MB) - Recomendado: 1200x800px</p>
                        </div>
                        <input type="file" name="cover_image" id="cover_image" accept="image/*,.svg,.gif,.webp"
                            class="hidden">
                    </label>
                    @error('cover_image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Gallery Images -->
                @if($project->images->count() > 0)
                    <div class="mb-6">
                        <label class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                            Imágenes de Galería Actuales
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($project->images as $image)
                                <div class="relative group">
                                    <img src="{{ $image->image_url }}" alt="Gallery image"
                                        class="w-full aspect-video object-cover rounded-lg border border-slate-200">
                                    <div class="absolute top-2 right-2">
                                        <label
                                            class="flex items-center gap-2 bg-white px-3 py-1 rounded-full shadow-lg cursor-pointer hover:bg-red-50 transition">
                                            <input type="checkbox" name="delete_gallery_images[]" value="{{ $image->id }}"
                                                class="text-red-600 focus:ring-red-500">
                                            <span class="text-xs font-bold text-red-600">Eliminar</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Add New Gallery Images -->
                <div class="mb-8">
                    <label for="gallery_images"
                        class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Añadir Más Imágenes a la Galería (Opcional)
                    </label>

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
                        Actualizar Proyecto
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>