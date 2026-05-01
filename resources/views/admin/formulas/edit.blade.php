<x-app-layout>
    <x-slot name="header">
        <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
            Editar Fórmula: {{ $formula->name }}
        </h2>
        <p class="text-sm text-slate-500 mt-1">Actualiza los campos de la fórmula</p>
    </x-slot>

    <div class="max-w-4xl">
        <form action="{{ route('formulas.update', $formula) }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            @csrf
            @method('PATCH')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nombre *</label>
                    <input type="text" name="name" value="{{ old('name', $formula->name) }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Slug * <span class="font-normal text-slate-500">(identificador único)</span></label>
                    <input type="text" name="slug" value="{{ old('slug', $formula->slug) }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Descripción</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $formula->description) }}</textarea>
                    @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Fórmula * <span class="font-normal text-slate-500">(texto o LaTeX)</span></label>
                    <textarea name="formula" rows="4" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-mono text-sm">{{ old('formula', $formula->formula) }}</textarea>
                    @error('formula')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Parámetros <span class="font-normal text-slate-500">(JSON opcional)</span></label>
                    <textarea name="parameters" rows="5" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-mono text-sm">{{ old('parameters', json_encode($formula->parameters, JSON_PRETTY_PRINT)) }}</textarea>
                    @error('parameters')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Categoría *</label>
                        <input type="text" name="category" value="{{ old('category', $formula->category) }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('category')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Orden</label>
                        <input type="number" name="display_order" value="{{ old('display_order', $formula->display_order) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('display_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex items-end">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $formula->is_active) ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm font-bold text-slate-700">Activa</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex gap-3">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-sm transition">
                    <i class="fa-solid fa-save"></i>
                    Actualizar Fórmula
                </button>
                <a href="{{ route('formulas.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-lg transition">
                    <i class="fa-solid fa-times"></i>
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
