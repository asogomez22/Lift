<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <!-- Top subtle background (optional, safe) -->
            <div class="absolute inset-0 -z-10 rounded-3xl bg-linear-to-r from-white via-white to-slate-50"></div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-2xl bg-slate-900 text-white grid place-items-center shadow-sm">
                            <i class="fa-solid fa-gauge-high"></i>
                        </div>
                        <div>
                            <h2 class="font-heading font-black text-2xl sm:text-3xl text-slate-900 leading-tight">
                                {{ __('Panel de Control') }}
                            </h2>
                            <p class="text-sm text-slate-500 mt-0.5">
                                Bienvenido de nuevo, <span
                                    class="font-semibold text-slate-700">{{ Auth::user()->name }}</span>
                            </p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </x-slot>

    {{-- Page backdrop --}}
    <div class="relative">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full blur-3xl opacity-40"
                style="background: radial-gradient(circle at 30% 30%, rgba(255,51,51,.20), transparent 60%);"></div>
            <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full blur-3xl opacity-50"
                style="background: radial-gradient(circle at 70% 70%, rgba(15,23,42,.12), transparent 60%);"></div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @php
                $messagesCount = \App\Models\ContactMessage::count();
                $unreadCount = \App\Models\ContactMessage::whereNull('read_at')->count();
                $docsCount = \App\Models\Document::count();
                $visibleDocs = \App\Models\Document::where('is_visible', true)->count();
                $pagesCount = \App\Models\Page::count();
                $formulasCount = \App\Models\Formula::count();
                $activeFormulas = \App\Models\Formula::where('is_active', true)->count();
            @endphp

            <!-- Messages Card -->
            <a href="{{ route('messages.index') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition
                      hover:-translate-y-0.5 hover:shadow-md hover:border-slate-300
                      focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-200">
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity"
                    style="background: radial-gradient(circle at 30% 20%, rgba(59,130,246,.10), transparent 45%);">
                </div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-[0.22em] text-slate-400 mb-1">Mensajes
                        </div>
                        <div class="text-3xl font-black text-slate-900 transition-colors group-hover:text-(--liftRed)">
                            {{ $messagesCount }}
                        </div>
                    </div>

                    <div class="relative grid place-items-center h-12 w-12 rounded-2xl bg-blue-50 text-blue-600
                                shadow-[inset_0_1px_0_rgba(255,255,255,.9)] transition
                                group-hover:bg-blue-100 group-hover:scale-[1.03]">
                        <i class="fa-solid fa-envelope text-xl"></i>
                    </div>
                </div>

                <div class="relative mt-5 flex items-center justify-between">
                    <div class="text-xs font-medium text-slate-500">
                        <span class="text-slate-900 font-extrabold">{{ $unreadCount }}</span> por leer
                    </div>
                    @if($unreadCount > 0)
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-amber-50 border border-amber-100 px-2 py-0.5 text-[11px] font-bold text-amber-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                            Atención
                        </span>
                    @else
                        <span
                            class="inline-flex items-center gap-1 rounded-full bg-emerald-50 border border-emerald-100 px-2 py-0.5 text-[11px] font-bold text-emerald-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Al día
                        </span>
                    @endif
                </div>
            </a>

            <!-- Documents Card -->
            <a href="{{ route('documents.index') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition
                      hover:-translate-y-0.5 hover:shadow-md hover:border-slate-300
                      focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-200">
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity"
                    style="background: radial-gradient(circle at 30% 20%, rgba(168,85,247,.12), transparent 45%);">
                </div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-[0.22em] text-slate-400 mb-1">Documentos
                        </div>
                        <div class="text-3xl font-black text-slate-900 transition-colors group-hover:text-(--liftRed)">
                            {{ $docsCount }}
                        </div>
                    </div>

                    <div class="relative grid place-items-center h-12 w-12 rounded-2xl bg-purple-50 text-purple-600
                                shadow-[inset_0_1px_0_rgba(255,255,255,.9)] transition
                                group-hover:bg-purple-100 group-hover:scale-[1.03]">
                        <i class="fa-solid fa-file-pdf text-xl"></i>
                    </div>
                </div>

                <div class="relative mt-5 text-xs font-medium text-slate-500 flex items-center justify-between">
                    <span><span class="text-slate-900 font-extrabold">{{ $visibleDocs }}</span> visibles
                        públicamente</span>
                    <span class="text-[11px] font-bold text-slate-400">
                        <i class="fa-solid fa-eye mr-1"></i> Público
                    </span>
                </div>
            </a>

            <!-- Pages Card -->
            <a href="{{ route('pages.index') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition
                      hover:-translate-y-0.5 hover:shadow-md hover:border-slate-300
                      focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-200">
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity"
                    style="background: radial-gradient(circle at 30% 20%, rgba(249,115,22,.14), transparent 45%);">
                </div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-[0.22em] text-slate-400 mb-1">Páginas
                        </div>
                        <div class="text-3xl font-black text-slate-900 transition-colors group-hover:text-(--liftRed)">
                            {{ $pagesCount }}
                        </div>
                    </div>

                    <div class="relative grid place-items-center h-12 w-12 rounded-2xl bg-orange-50 text-orange-600
                                shadow-[inset_0_1px_0_rgba(255,255,255,.9)] transition
                                group-hover:bg-orange-100 group-hover:scale-[1.03]">
                        <i class="fa-solid fa-layer-group text-xl"></i>
                    </div>
                </div>

                <div class="relative mt-5 text-xs font-medium text-slate-500 flex items-center justify-between">
                    <span>Contenido gestionable</span>
                    <span class="text-[11px] font-bold text-slate-400">
                        <i class="fa-solid fa-sliders mr-1"></i> CMS
                    </span>
                </div>
            </a>

            <!-- Formulas Card -->
            <a href="{{ route('formulas.index') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition
                      hover:-translate-y-0.5 hover:shadow-md hover:border-slate-300
                      focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-200">
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity"
                    style="background: radial-gradient(circle at 30% 20%, rgba(239,68,68,.12), transparent 45%);"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-[0.22em] text-slate-400 mb-1">Fórmulas
                        </div>
                        <div class="text-3xl font-black text-slate-900 transition-colors group-hover:text-(--liftRed)">
                            {{ $formulasCount }}
                        </div>
                    </div>

                    <div class="relative grid place-items-center h-12 w-12 rounded-2xl bg-red-50 text-red-600
                                shadow-[inset_0_1px_0_rgba(255,255,255,.9)] transition
                                group-hover:bg-red-100 group-hover:scale-[1.03]">
                        <i class="fa-solid fa-calculator text-xl"></i>
                    </div>
                </div>

                <div class="relative mt-5 text-xs font-medium text-slate-500 flex items-center justify-between">
                    <span><span class="text-slate-900 font-extrabold">{{ $activeFormulas }}</span> activas</span>
                    <span class="text-[11px] font-bold text-slate-400">
                        <i class="fa-solid fa-check-circle mr-1"></i> Cálculo
                    </span>
                </div>
            </a>
        </div>

        <!-- Quick Actions & Recent -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Acciones Rápidas -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="font-heading font-black text-lg text-slate-900">Acciones Rápidas</h3>
                        <p class="text-sm text-slate-500 mt-1">Atajos para tareas frecuentes</p>
                    </div>

                </div>

                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="{{ route('documents.create') }}" class="group flex items-center gap-4 p-4 rounded-xl border border-slate-100 bg-slate-50
                              hover:bg-white hover:border-slate-300 hover:shadow-sm transition-all text-left
                              focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-200">
                        <div class="h-11 w-11 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center
                                    shadow-[inset_0_1px_0_rgba(255,255,255,.9)]
                                    group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="font-extrabold text-sm text-slate-900 flex items-center gap-2">
                                Subir Documento
                                <i
                                    class="fa-solid fa-arrow-right text-xs text-slate-300 group-hover:text-slate-400 transition-colors"></i>
                            </div>
                            <div class="text-xs text-slate-500">PDF para formación o proyectos</div>
                        </div>
                    </a>

                    <a href="{{ route('pages.index') }}" class="group flex items-center gap-4 p-4 rounded-xl border border-slate-100 bg-slate-50
                              hover:bg-white hover:border-slate-300 hover:shadow-sm transition-all text-left
                              focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-200">
                        <div class="h-11 w-11 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center
                                    shadow-[inset_0_1px_0_rgba(255,255,255,.9)]
                                    group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="font-extrabold text-sm text-slate-900 flex items-center gap-2">
                                Editar Contenido
                                <i
                                    class="fa-solid fa-arrow-right text-xs text-slate-300 group-hover:text-slate-400 transition-colors"></i>
                            </div>
                            <div class="text-xs text-slate-500">Textos e imágenes del sitio</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Últimos Mensajes -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <div>
                        <h3 class="font-heading font-black text-lg text-slate-900">Últimos Mensajes</h3>
                        <p class="text-sm text-slate-500 mt-1">Actividad reciente de contacto</p>
                    </div>
                    <a href="{{ route('messages.index') }}"
                        class="inline-flex items-center gap-2 text-xs font-extrabold text-blue-600 hover:text-blue-700
                              focus:outline-none focus-visible:ring-4 focus-visible:ring-blue-100 rounded-lg px-2 py-1">
                        Ver todos <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="flex-1 overflow-auto">
                    @php
                        $latestMessages = \App\Models\ContactMessage::latest()->take(3)->get();
                    @endphp

                    @if($latestMessages->count() > 0)
                        <div class="divide-y divide-slate-100">
                            @foreach($latestMessages as $msg)
                                <a href="{{ route('messages.show', $msg) }}"
                                    class="group block p-4 hover:bg-slate-50 transition-colors
                                                          focus:outline-none focus-visible:ring-4 focus-visible:ring-slate-200">
                                    <div class="flex justify-between items-start gap-3 mb-1">
                                        <div class="min-w-0">
                                            <div class="font-extrabold text-sm text-slate-900 truncate">
                                                {{ $msg->name }}
                                            </div>
                                            <div class="text-xs text-slate-500 truncate">
                                                {{ $msg->subject }}
                                            </div>
                                        </div>

                                        <div class="flex flex-col items-end gap-2 shrink-0">
                                            <span
                                                class="text-[10px] bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full font-bold">
                                                {{ $msg->created_at->diffForHumans() }}
                                            </span>

                                            @if(is_null($msg->read_at))
                                                <span
                                                    class="inline-flex items-center gap-1 text-[10px] font-extrabold text-amber-700 bg-amber-50 border border-amber-100 px-2 py-0.5 rounded-full">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                                    Nuevo
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-2 text-xs text-slate-400 flex items-center gap-2">
                                        <i class="fa-regular fa-circle-dot"></i>
                                        <span class="group-hover:text-slate-500 transition-colors">Abrir mensaje</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="p-10 text-center">
                            <div
                                class="mx-auto h-12 w-12 rounded-2xl bg-slate-50 border border-slate-200 grid place-items-center text-slate-400">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <p class="mt-4 text-sm font-semibold text-slate-600">No hay mensajes recientes.</p>
                            <p class="mt-1 text-xs text-slate-400">Cuando lleguen, aparecerán aquí.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>