<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    {{ __('Documentos') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Gestiona los archivos PDF disponibles para descarga</p>
            </div>
            <a href="{{ route('documents.create') }}"
                class="inline-flex items-center gap-2 bg-(--liftRed) hover:bg-red-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg shadow-red-500/30 transition-all transform hover:-translate-y-0.5">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                Subir Documento
            </a>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm ring-1 ring-slate-900/5 sm:rounded-2xl">
        <div class="p-6">

            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3"
                    role="alert">
                    <i class="fa-solid fa-circle-check"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead>
                        <tr class="bg-slate-50">
                            <th scope="col"
                                class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Documento</th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Sección</th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Archivo</th>
                            <th scope="col"
                                class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Estado</th>
                            <th scope="col"
                                class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($documents as $doc)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="h-10 w-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                            <i class="fa-solid fa-file-pdf text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-slate-900">{{ $doc->title }}</div>
                                            <div class="text-xs text-slate-500 line-clamp-1">
                                                {{ $doc->description ?? 'Sin descripción' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide {{ $doc->section === 'formacion' ? 'bg-purple-50 text-purple-700 border border-purple-100' : 'bg-orange-50 text-orange-700 border border-orange-100' }}">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full {{ $doc->section === 'formacion' ? 'bg-purple-500' : 'bg-orange-500' }}"></span>
                                        {{ ucfirst($doc->section) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                        class="text-slate-500 hover:text-(--liftRed) font-medium transition-colors flex items-center gap-2">
                                        <i class="fa-regular fa-eye"></i>
                                        Ver PDF
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <form action="{{ route('documents.toggle', $doc) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none {{ $doc->is_visible ? 'bg-emerald-500' : 'bg-slate-200' }}"
                                            role="switch" aria-checked="{{ $doc->is_visible }}">
                                            <span class="sr-only">Toggle visibility</span>
                                            <span aria-hidden="true"
                                                class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $doc->is_visible ? 'translate-x-5' : 'translate-x-0' }}"></span>
                                        </button>
                                    </form>
                                    <span
                                        class="text-[10px] font-bold uppercase tracking-wider mt-1 block {{ $doc->is_visible ? 'text-emerald-600' : 'text-slate-400' }}">
                                        {{ $doc->is_visible ? 'Visible' : 'Oculto' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex items-center justify-end gap-3 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('documents.edit', $doc) }}"
                                            class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all"
                                            title="Editar">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('documents.destroy', $doc) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('¿Eliminar este documento permanentemente?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all"
                                                title="Eliminar">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="h-16 w-16 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-300">
                                            <i class="fa-regular fa-folder-open text-3xl"></i>
                                        </div>
                                        <p class="font-medium text-slate-600">No hay documentos subidos</p>
                                        <p class="text-sm mt-1">Sube el primero para empezar.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $documents->links() }}
            </div>

        </div>
    </div>
</x-app-layout>