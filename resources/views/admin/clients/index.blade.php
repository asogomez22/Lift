<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    {{ __('Gestión de Clientes') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Gestiona los logotipos que aparecen en la web</p>
            </div>
            <a href="{{ route('clients.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-md shadow-sm transition">
                <i class="fa-solid fa-plus"></i>
                Añadir Cliente
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm"
            role="alert">
            <i class="fa-solid fa-circle-check text-xl"></i>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    @if($clients->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach($clients as $client)
                <div
                    class="group relative bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-lg hover:border-(--liftRed)/30 transition-all duration-300">
                    <!-- Logo Preview -->
                    <div
                        class="aspect-[3/2] flex items-center justify-center mb-4 bg-slate-50 rounded-xl overflow-hidden border border-slate-100 p-4 relative">
                        <span
                            class="absolute top-2 right-2 text-[10px] font-bold text-slate-400 bg-white px-1.5 py-0.5 rounded border border-slate-200">
                            #{{ $client->display_order }}
                        </span>
                        @if(str_starts_with($client->logo_path, 'clients/'))
                            <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}"
                                class="max-w-full max-h-full object-contain">
                        @else
                            <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}"
                                class="max-w-full max-h-full object-contain">
                        @endif
                    </div>

                    <!-- Client Name -->
                    @if($client->name)
                        <p class="text-xs font-semibold text-slate-700 text-center mb-3 truncate">{{ $client->name }}</p>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('clients.edit', $client) }}"
                            class="flex-1 flex items-center justify-center gap-2 px-3 py-2 text-xs font-bold text-indigo-600 hover:text-white hover:bg-indigo-600 border border-indigo-200 hover:border-indigo-600 rounded-lg transition-colors cursor-pointer">
                            <i class="fa-solid fa-edit"></i>
                            Editar
                        </a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="flex-1 relative z-10"
                            onsubmit="return confirm('¿Estás seguro de eliminar este cliente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-2 px-3 py-2 text-xs font-bold text-red-600 hover:text-white hover:bg-red-600 border border-red-200 hover:border-red-600 rounded-lg transition-colors cursor-pointer">
                                <i class="fa-solid fa-trash"></i>
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-2xl border-2 border-dashed border-slate-200 shadow-sm">
            <div class="h-16 w-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                <i class="fa-solid fa-building text-3xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-1">No hay clientes</h3>
            <p class="text-slate-500 mb-4">Añade tu primer cliente para que aparezca en la web</p>
            <a href="{{ route('clients.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-md shadow-sm transition">
                <i class="fa-solid fa-plus"></i>
                Añadir Cliente
            </a>
        </div>
    @endif
</x-app-layout>