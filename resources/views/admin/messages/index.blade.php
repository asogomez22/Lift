<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    {{ __('Bandeja de Entrada') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Gestiona las consultas recibidas desde la web</p>
            </div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm ring-1 ring-slate-900/5 sm:rounded-2xl">
        <div class="p-6">
            
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3" role="alert">
                    <i class="fa-solid fa-circle-check"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead>
                        <tr class="bg-slate-50">
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Fecha</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Remitente</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Asunto</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($messages as $msg)
                            <tr class="hover:bg-slate-50/50 transition-colors group {{ !$msg->read_at ? 'bg-blue-50/30' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if(!$msg->read_at)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-blue-100 text-blue-700 border border-blue-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                            Nuevo
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-slate-100 text-slate-500 border border-slate-200">
                                            Leído
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 font-medium">
                                    {{ $msg->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-slate-900">{{ $msg->name }}</div>
                                    <div class="text-xs text-slate-500">{{ $msg->email }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ Str::limit($msg->subject, 40) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-3 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('messages.show', $msg) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="Ver Detalle">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <form action="{{ route('messages.destroy', $msg) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este mensaje?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Eliminar">
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
                                        <div class="h-16 w-16 bg-slate-100 rounded-full flex items-center justify-center mb-4 text-slate-300">
                                            <i class="fa-regular fa-envelope-open text-3xl"></i>
                                        </div>
                                        <p class="font-medium text-slate-600">Bandeja de entrada vacía</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $messages->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
