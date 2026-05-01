<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    {{ $page->name }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Personaliza textos e imágenes</p>
            </div>
            <a href="{{ route('pages.index') }}"
                class="text-sm font-bold text-slate-500 hover:text-(--liftRed) transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto pb-12">

        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm"
                role="alert">
                <i class="fa-solid fa-circle-check text-xl"></i>
                <div>
                    <span class="font-bold block">¡Cambios guardados!</span>
                    <span class="text-sm">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <form action="{{ route('pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if($page->contentBlocks->isEmpty())
                <div class="text-center py-16 bg-white rounded-2xl border-2 border-dashed border-slate-200 shadow-sm">
                    <div
                        class="h-16 w-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                        <i class="fa-solid fa-layer-group text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Sin Contenido Editable</h3>
                    <p class="text-slate-500">Esta página no tiene bloques de contenido configurados.</p>
                </div>
            @else
                @php
                    $blocks = $page->contentBlocks;

                    // 1. FILTER: Restrict to IMAGES ONLY for ALL pages
                    $blocks = $blocks->filter(function ($block) use ($page) {
                        // Global rule: Only images
                        if ($block->type !== 'image')
                            return false;

                        // Home page specific rule: Only Hero and Bento
                        if ($page->slug === 'home') {
                            return Str::contains($block->key, ['hero', 'bento']);
                        }

                        // Diseño de Estructuras specific rule
                        if ($page->slug === 'diseno-estructuras') {
                            $allowed = [
                                'hero_main_image',
                                'gallery_1_image',
                                'gallery_2_image',
                                'gallery_3_image',
                                'gallery_4_image',
                                'gallery_5_image',
                                'gallery_6_image',
                            ];
                            return in_array($block->key, $allowed);
                        }

                        return true;
                    });

                    // 2. GROUPING
                    $groups = $blocks->sortBy('key')->groupBy(function ($block) {
                        // Home Page Specific Groups
                        if (Str::contains($block->key, 'bento'))
                            return 'Mosaico de Servicios';
                        if (Str::contains($block->key, 'hero'))
                            return 'Portada Principal';

                        // Standard Patterns
                        if (preg_match('/^p(\d+)_/', $block->key, $m))
                            return 'Proyecto ' . $m[1];
                        if (preg_match('/^hotspot_(\d+)_/', $block->key, $m))
                            return 'Punto Interactivo ' . $m[1];
                        if (preg_match('/^card_(\d+)_/', $block->key, $m))
                            return 'Tarjeta ' . $m[1];
                        if (str_starts_with($block->key, 'hero_'))
                            return 'Sección Principal';
                        if (str_starts_with($block->key, 'header_'))
                            return 'Encabezado';
                        return 'Contenido General';
                    })->sortKeys();
                @endphp

                <div class="space-y-8">
                    @foreach($groups as $groupName => $blocks)
                        <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-900/5 overflow-hidden">
                            <div class="bg-slate-50/50 px-6 py-4 border-b border-slate-100 flex items-center gap-3">
                                <div class="w-1.5 h-6 bg-(--liftRed) rounded-full"></div>
                                <h3 class="text-lg font-bold text-slate-800 tracking-tight">
                                    {{ $groupName }}
                                </h3>
                            </div>

                            <div class="p-8 grid grid-cols-1 gap-8">
                                @foreach($blocks as $block)

                                    @php
                                        // Cleaner labels
                                        $humanKey = $block->key;
                                        $humanKey = preg_replace('/^(p\d+|hotspot_\d+|card_\d+|hero_|header_|_)/', '', $humanKey);

                                        // Traducir keys comunes
                                        $translations = [
                                            'title' => 'Título',
                                            'subtitle' => 'Subtítulo',
                                            'description' => 'Descripción',
                                            'image' => 'Imagen',
                                            'img' => 'Imagen',
                                            'content' => 'Contenido',
                                            'link' => 'Enlace',
                                            'button_text' => 'Texto del Botón',
                                            'tags' => 'Etiquetas (separadas por comas)',
                                            'logo' => 'Logotipo',
                                            'phone' => 'Teléfono',
                                            'email' => 'Correo Electrónico',
                                            'address' => 'Dirección',
                                            'video_thumbnail' => 'Miniatura de Video',
                                            'main_image' => 'Imagen de Fondo Principal',
                                        ];

                                        $label = $translations[$humanKey] ?? ucwords(str_replace(['_', '-'], ' ', $humanKey));
                                    @endphp

                                    <div class="relative group"
                                        data-upload-url="{{ route('pages.blocks.image.upload', [$page, $block]) }}"
                                        data-delete-url="{{ route('pages.blocks.image.delete', [$page, $block]) }}">
                                        <label for="block_{{ $block->id }}"
                                            class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2 group-hover:text-(--liftRed) transition-colors">
                                            {{ $label }}
                                        </label>

                                        @if($block->type === 'image')
                                            <!-- Image Block -->
                                            <div class="flex flex-col sm:flex-row gap-6 items-start">
                                                @if($block->value)
                                                    <div class="shrink-0">
                                                        <div
                                                            class="relative w-32 h-32 rounded-xl border-2 border-slate-200 shadow-sm hover:shadow-md transition-shadow bg-slate-100">
                                                            <img src="{{ $page->getBlockSrc($block->key, $block->value) }}"
                                                                class="w-full h-full object-cover rounded-xl" alt="Preview">
                                                            <div
                                                                class="absolute inset-x-0 bottom-0 bg-black/50 text-white text-[10px] py-1 text-center backdrop-blur-sm rounded-b-xl">
                                                                Actual
                                                            </div>
                                                            <button type="button" onclick="deleteImage({{ $block->id }})"
                                                                title="Eliminar imagen"
                                                                class="absolute -top-3 -right-3 bg-red-600 hover:bg-red-700 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-xl transition-all hover:scale-110 z-10 border-2 border-white">
                                                                <i class="fa-solid fa-trash text-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="flex-1 w-full">
                                                    <label
                                                        class="block w-full border-2 border-dashed border-slate-200 rounded-xl p-4 text-center hover:border-(--liftRed) hover:bg-red-50/10 transition-all cursor-pointer">
                                                        <div class="space-y-2">
                                                            <i
                                                                class="fa-regular fa-image text-slate-400 text-xl group-hover:text-(--liftRed) transition-colors"></i>
                                                            <div class="text-sm font-medium text-slate-600">
                                                                <span class="text-(--liftRed) font-bold group-hover:underline">Subir
                                                                    nueva imagen</span>
                                                            </div>
                                                            <p class="text-xs text-slate-400">JPG, PNG, WebP (Max 5MB)</p>
                                                        </div>
                                                        <input type="file" name="blocks[{{ $block->id }}]" accept="image/*"
                                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                                    </label>
                                                </div>
                                            </div>
                                        @elseif($block->type === 'text')
                                            <!-- Text Block -->
                                            <textarea name="blocks[{{ $block->id }}]" rows="3"
                                                class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 leading-relaxed transition-all py-3">{{ $block->value }}</textarea>
                                        @else
                                            <!-- Default Input -->
                                            <input type="text" name="blocks[{{ $block->id }}]" value="{{ $block->value }}"
                                                class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3">
                                        @endif
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="flex items-center justify-end gap-4 mt-6">
                <a href="{{ route('pages.index') }}" class="text-gray-500 hover:text-gray-700">Cancelar</a>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md shadow-sm transition">
                    Guardar Cambios
                </button>
            </div>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all file inputs
            const fileInputs = document.querySelectorAll('input[type="file"][name^="blocks["]');

            fileInputs.forEach(input => {
                input.addEventListener('change', async function (e) {
                    const file = e.target.files[0];
                    if (!file) return;

                    // Get the container and URLs from data attributes
                    const container = e.target.closest('.group');
                    const uploadUrl = container.dataset.uploadUrl;
                    const token = document.querySelector('input[name="_token"]').value;

                    // Create FormData with the image file
                    const formData = new FormData();
                    formData.append('image', file);
                    formData.append('_token', token);

                    // Find the preview container for this block
                    const previewContainer = container.querySelector('.shrink-0');

                    // Show loading state
                    const label = e.target.closest('label');
                    const originalContent = label.innerHTML;
                    label.innerHTML = '<div class="space-y-2"><i class="fa-solid fa-spinner fa-spin text-slate-400 text-xl"></i><div class="text-sm font-medium text-slate-600">Guardando...</div></div>';

                    try {
                        // Send AJAX request to dedicated upload endpoint
                        const response = await fetch(uploadUrl, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': token
                            }
                        });

                        if (response.ok) {
                            // Get the URL from the response
                            const data = await response.json();
                            const imageUrl = data.url + '?t=' + Date.now(); // Cache buster

                            if (previewContainer) {
                                // Update existing preview
                                const img = previewContainer.querySelector('img');
                                if (img) {
                                    img.src = imageUrl;
                                }
                            } else {
                                // Create new preview if it doesn't exist
                                const newPreview = document.createElement('div');
                                newPreview.className = 'shrink-0';
                                newPreview.innerHTML = `
                                    <div class="relative w-32 h-32 rounded-xl border-2 border-slate-200 shadow-sm hover:shadow-md transition-shadow bg-slate-100">
                                        <img src="${imageUrl}" class="w-full h-full object-cover rounded-xl" alt="Preview">
                                        <div class="absolute inset-x-0 bottom-0 bg-black/50 text-white text-[10px] py-1 text-center backdrop-blur-sm rounded-b-xl">
                                            Actual
                                        </div>
                                    </div>
                                `;
                                container.querySelector('.flex-col').insertBefore(newPreview, container.querySelector('.flex-1'));
                            }

                            // Show success message
                            label.innerHTML = '<div class="space-y-2"><i class="fa-solid fa-check text-green-500 text-xl"></i><div class="text-sm font-medium text-green-600">¡Guardado!</div></div>';
                            setTimeout(() => {
                                label.innerHTML = originalContent;
                            }, 2000);
                        } else {
                            throw new Error('Error al guardar');
                        }
                    } catch (error) {
                        console.error('Upload error:', error);
                        label.innerHTML = '<div class="space-y-2"><i class="fa-solid fa-exclamation-triangle text-red-500 text-xl"></i><div class="text-sm font-medium text-red-600">Error al guardar</div></div>';
                        setTimeout(() => {
                            label.innerHTML = originalContent;
                        }, 2000);
                    }
                });
            });

            // Delete image function
            window.deleteImage = async function (blockId) {
                if (!confirm('¿Eliminar esta imagen?')) return;

                // Find the container for this block
                const deleteButton = document.querySelector(`button[onclick="deleteImage(${blockId})"]`);
                const container = deleteButton ? deleteButton.closest('.group') : null;

                if (!container) {
                    alert('Error: no se pudo encontrar el contenedor del bloque');
                    return;
                }

                const deleteUrl = container.dataset.deleteUrl;
                const token = document.querySelector('input[name="_token"]').value;

                try {
                    const response = await fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                    });

                    if (response.ok) {
                        // Reload page to show changes
                        location.reload();
                    } else {
                        const text = await response.text();
                        console.error('Delete failed:', response.status, text);
                        alert('Error al eliminar la imagen');
                    }
                } catch (error) {
                    console.error('Delete error:', error);
                    alert('Error al eliminar la imagen');
                }
            };
        });
    </script>
</x-app-layout>