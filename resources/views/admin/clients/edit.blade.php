<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    Editar Cliente
                </h2>
                <p class="text-sm text-slate-500 mt-1">Actualiza el logotipo del cliente</p>
            </div>
            <a href="{{ route('clients.index') }}"
                class="text-sm font-bold text-slate-500 hover:text-(--liftRed) transition-colors flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-900/5 p-8">
            <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Client Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Nombre del Cliente
                    </label>
                    <input type="text" name="name" id="name" placeholder="Ej: Repsol, BASF, etc."
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3"
                        value="{{ old('name', $client->name) }}">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Display Order -->
                <div class="mb-6">
                    <label for="display_order"
                        class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Orden de Visualización
                    </label>
                    <input type="number" name="display_order" id="display_order"
                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-(--liftRed) focus:ring-(--liftRed) font-medium text-slate-700 transition-all py-3"
                        value="{{ old('display_order', $client->display_order) }}">
                </div>

                <!-- Current Logo -->
                <div class="mb-6">
                    <label class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Logotipo Actual
                    </label>
                    <div
                        class="w-48 h-48 mx-auto rounded-xl overflow-hidden border border-slate-200 shadow-sm bg-slate-50 flex items-center justify-center">
                        @if(str_starts_with($client->logo_path, 'clients/'))
                            <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}"
                                class="max-w-full max-h-full object-contain p-4">
                        @else
                            <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}"
                                class="max-w-full max-h-full object-contain p-4">
                        @endif
                    </div>
                </div>

                <!-- New Logo Upload (Optional) -->
                <div class="mb-8">
                    <label for="logo" class="block text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">
                        Nuevo Logotipo (Opcional)
                    </label>

                    <label for="logo"
                        class="block w-full border-2 border-dashed border-slate-200 rounded-xl p-8 text-center hover:border-(--liftRed) hover:bg-red-50/10 transition-all cursor-pointer">
                        <div class="space-y-2">
                            <i class="fa-regular fa-image text-slate-400 text-4xl"></i>
                            <div class="text-sm font-medium text-slate-600">
                                <span class="text-(--liftRed) font-bold">Selecciona un nuevo logotipo</span>
                            </div>
                            <p class="text-xs text-slate-400">JPG, PNG, SVG, WebP (Max 2MB)</p>
                        </div>
                        <input type="file" name="logo" id="logo" accept="image/*,.svg,.gif,.webp" class="hidden">
                    </label>
                    @error('logo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('clients.index') }}"
                        class="text-slate-500 hover:text-slate-700 font-medium">Cancelar</a>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-sm transition">
                        Actualizar Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>