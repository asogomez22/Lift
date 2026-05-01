<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    Gestión de Fórmulas
                </h2>
                <p class="text-sm text-slate-500 mt-1">Gestiona las fórmulas del módulo de cálculo</p>
            </div>
            <a href="{{ route('formulas.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-md shadow-sm transition">
                <i class="fa-solid fa-plus"></i>
                Añadir Fórmula
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-check text-xl"></i>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    @if($formulas->count() > 0)
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-extrabold text-slate-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-extrabold text-slate-500 uppercase tracking-wider">Categoría</th>
                        <th class="px-6 py-3 text-left text-xs font-extrabold text-slate-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-extrabold text-slate-500 uppercase tracking-wider">Orden</th>
                        <th class="px-6 py-3 text-right text-xs font-extrabold text-slate-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @foreach($formulas as $formula)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-slate-900">{{ $formula->name }}</div>
                                <div class="text-xs text-slate-500">{{ $formula->slug }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-bold bg-slate-100 text-slate-600 rounded-full">{{ $formula->category }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('formulas.toggle', $formula) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center gap-1 px-2 py-1 text-xs font-bold {{ $formula->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }} rounded-full">
                                        <span class="h-1.5 w-1.5 rounded-full {{ $formula->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                        {{ $formula->is_active ? 'Activa' : 'Inactiva' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                {{ $formula->display_order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('formulas.edit', $formula) }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-bold text-indigo-600 hover:text-white hover:bg-indigo-600 border border-indigo-200 hover:border-indigo-600 rounded-lg transition-colors">
                                        <i class="fa-solid fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('formulas.destroy', $formula) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta fórmula?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-bold text-red-600 hover:text-white hover:bg-red-600 border border-red-200 hover:border-red-600 rounded-lg transition-colors">
                                            <i class="fa-solid fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-2xl border-2 border-dashed border-slate-200 shadow-sm">
            <div class="h-16 w-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                <i class="fa-solid fa-calculator text-3xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-1">No hay fórmulas</h3>
            <p class="text-slate-500 mb-4">Añade tu primera fórmula para el módulo de cálculo</p>
            <a href="{{ route('formulas.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-md shadow-sm transition">
                <i class="fa-solid fa-plus"></i>
                Añadir Fórmula
            </a>
        </div>
    @endif
</x-app-layout>
