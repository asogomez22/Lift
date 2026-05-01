<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
                    {{ __('Gestión de Páginas') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Edita el contenido de las secciones públicas</p>
            </div>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($pages as $page)
            <a href="{{ route('pages.edit', $page) }}" class="group relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg hover:border-(--liftRed)/30 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                    <i class="fa-solid fa-code text-6xl transform rotate-12"></i>
                </div>
                
                <div class="flex items-center justify-between mb-4">
                    <div class="h-12 w-12 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-red-50 group-hover:text-(--liftRed) transition-colors">
                        @if($page->slug == 'welcome' || $page->slug == '/')
                            <i class="fa-solid fa-house text-xl"></i>
                        @elseif($page->slug == 'ingenieria')
                            <i class="fa-solid fa-gears text-xl"></i>
                        @elseif($page->slug == 'formacion')
                            <i class="fa-solid fa-graduation-cap text-xl"></i>
                        @elseif($page->slug == 'proyectos')
                            <i class="fa-solid fa-briefcase text-xl"></i>
                        @elseif($page->slug == 'contacto')
                            <i class="fa-solid fa-envelope text-xl"></i>
                        @else
                            <i class="fa-regular fa-file-lines text-xl"></i>
                        @endif
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide bg-slate-100 text-slate-500 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors">
                        Estático
                    </span>
                </div>

                <h5 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-(--liftRed) transition-colors">{{ $page->name }}</h5>
                <p class="text-sm text-slate-500 line-clamp-2 mb-4">
                    Gestión de textos e imágenes para la sección {{ strtolower($page->name) }}.
                </p>

                <div class="flex items-center text-sm font-bold text-slate-400 group-hover:text-(--liftRed) transition-colors">
                    Editar Contenido <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
