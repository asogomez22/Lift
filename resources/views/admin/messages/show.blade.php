<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Mensaje') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 flex justify-between items-center">
                        <a href="{{ route('messages.index') }}" class="text-gray-500 hover:text-gray-700">← Volver</a>
                        <form action="{{ route('messages.destroy', $message) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Eliminar Mensaje
                            </button>
                        </form>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nombre</p>
                            <p class="text-lg text-gray-900">{{ $message->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Fecha</p>
                            <p class="text-lg text-gray-900">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Email</p>
                            <p class="text-lg text-gray-900">
                                <a href="mailto:{{ $message->email }}" class="text-indigo-600 hover:underline">{{ $message->email }}</a>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Teléfono</p>
                            <p class="text-lg text-gray-900">{{ $message->phone ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Empresa</p>
                            <p class="text-lg text-gray-900">{{ $message->company ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Servicio de interés</p>
                            <p class="text-lg text-gray-900">{{ $message->service ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="border-t pt-6">
                        <p class="text-sm font-medium text-gray-500 mb-2">Asunto</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $message->subject }}</h3>
                        
                        <p class="text-sm font-medium text-gray-500 mb-2">Mensaje</p>
                        <div class="bg-gray-50 p-4 rounded-lg text-gray-800 whitespace-pre-wrap leading-relaxed border">
                            {{ $message->message }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
