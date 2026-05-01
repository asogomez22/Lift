<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    Añadir Cliente
                </h2>
                <p class="text-sm text-slate-500 mt-1">Sube el logotipo de un nuevo cliente</p>
            </div>
            <a href="{{ route('clients.index') }}"
                class="text-sm font-bold text-slate-500 hover:text-(--liftRed) transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-900/5 overflow-hidden p-8">
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" id="client-form">
                @csrf

                <!-- Client Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Nombre del Cliente (Opcional)
                    </label>
                    <input type="text" name="name" id="name" placeholder="Ej: Repsol, BASF, etc."
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Logo Upload -->
                <div class="mb-8">
                    <label for="logo" class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Logotipo <span class="text-red-500">*</span>
                    </label>

                    <!-- Preview -->
                    <div id="preview-container" class="hidden mb-4">
                        <div
                            class="w-72 h-48 mx-auto rounded-xl overflow-hidden border border-slate-200 shadow-sm bg-slate-50 flex items-center justify-center">
                            <img id="preview-image" src="" alt="Preview"
                                class="max-w-full max-h-full object-contain p-4">
                        </div>
                    </div>

                    <!-- Upload Area -->
                    <label for="logo"
                        class="block w-full border-2 border-dashed border-slate-200 rounded-xl p-8 text-center hover:border-(--liftRed) hover:bg-red-50/10 transition-all cursor-pointer">
                        <div class="space-y-2" id="upload-prompt">
                            <i class="fa-regular fa-image text-slate-400 text-4xl"></i>
                            <div class="text-sm font-medium text-slate-600">
                                <span class="text-(--liftRed) font-bold">Selecciona o arrastra el logotipo</span>
                            </div>
                            <p class="text-xs text-slate-400">JPG, PNG, SVG, WebP (Max 2MB)</p>
                        </div>
                        <div class="hidden space-y-2" id="saving-prompt">
                            <i class="fa-solid fa-spinner fa-spin text-slate-400 text-4xl"></i>
                            <div class="text-sm font-medium text-slate-600">Guardando...</div>
                        </div>
                        <input type="file" name="logo" id="logo" accept="image/*,.svg,.gif,.webp" required
                            class="hidden">
                    </label>
                    @error('logo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button (Hidden, will auto-submit) -->
                <button type="submit" id="submit-btn" class="hidden">Guardar</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('logo');
            const form = document.getElementById('client-form');
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');
            const uploadPrompt = document.getElementById('upload-prompt');
            const savingPrompt = document.getElementById('saving-prompt');

            fileInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (!file) return;

                // Show preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(file);

                // Show saving state
                uploadPrompt.classList.add('hidden');
                savingPrompt.classList.remove('hidden');

                // Auto-submit form
                setTimeout(() => {
                    form.submit();
                }, 500);
            });
        });
    </script>
</x-app-layout>