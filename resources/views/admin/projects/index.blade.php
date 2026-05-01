<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    Gestión de Proyectos
                </h2>
                <p class="text-sm text-slate-500 mt-1">Gestiona los proyectos que aparecen en la web</p>
            </div>
            <a href="{{ route('projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-md shadow-sm transition">
                <i class="fa-solid fa-plus"></i>
                Añadir Proyecto
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-check text-xl"></i>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="group bg-white rounded-2xl shadow-sm border border-slate-200 hover:shadow-lg hover:border-(--liftRed)/30 transition-all duration-300 overflow-hidden">
                    <!-- Image -->
                    <div class="aspect-video overflow-hidden bg-slate-100">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-slate-900 mb-2 line-clamp-2">{{ $project->title }}</h3>
                        
                        @if($project->description)
                            <p class="text-sm text-slate-600 mb-3 line-clamp-2">{{ $project->description }}</p>
                        @endif

                        @if($project->tags)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($project->tags_array as $tag)
                                    <span class="px-2 py-1 text-xs font-bold bg-slate-100 text-slate-600 rounded-full">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('projects.edit', $project) }}" class="flex-1 flex items-center justify-center gap-2 px-3 py-2 text-xs font-bold text-indigo-600 hover:text-white hover:bg-indigo-600 border border-indigo-200 hover:border-indigo-600 rounded-lg transition-colors cursor-pointer">
                                <i class="fa-solid fa-edit"></i>
                                Editar
                            </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="flex-1 relative z-10" onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 text-xs font-bold text-red-600 hover:text-white hover:bg-red-600 border border-red-200 hover:border-red-600 rounded-lg transition-colors cursor-pointer">
                                    <i class="fa-solid fa-trash"></i>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-2xl border-2 border-dashed border-slate-200 shadow-sm">
            <div class="h-16 w-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                <i class="fa-solid fa-briefcase text-3xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-1">No hay proyectos</h3>
            <p class="text-slate-500 mb-4">Añade tu primer proyecto para que aparezca en la web</p>
            <a href="{{ route('projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-md shadow-sm transition">
                <i class="fa-solid fa-plus"></i>
                Añadir Proyecto
            </a>
        </div>
    @endif
</x-app-layout>
