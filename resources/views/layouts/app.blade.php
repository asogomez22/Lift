<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.favicons')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LIFT Admin') }}</title>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --liftRed: #ff3333;
            --liftDark: #0b1020;
        }

        body {
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .font-heading {
            font-family: Montserrat, system-ui, sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="h-full antialiased text-slate-900 overflow-x-hidden">
    @php
        $linkBase = 'group relative flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl transition-all duration-200 focus:outline-none focus-visible:ring-4 focus-visible:ring-white/10';
        $linkActive = 'bg-white/10 text-white shadow-[0_12px_35px_rgba(0,0,0,.25)]';
        $linkIdle = 'text-slate-300/80 hover:text-white hover:bg-white/5';
    @endphp

    <div x-data="{ sidebarOpen: false }" class="min-h-dvh flex bg-slate-50"
        @keydown.escape.window="sidebarOpen = false">
        <!-- SIDEBAR -->
        <aside x-cloak :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-72 sm:w-64 bg-[var(--liftDark)] text-white transform transition-transform duration-300
               -translate-x-full lg:translate-x-0 lg:static lg:inset-auto flex flex-col
               shadow-2xl shadow-slate-900/25 overflow-hidden" aria-label="Sidebar">
            <!-- Subtle sidebar glow -->
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full blur-3xl opacity-30"
                    style="background: radial-gradient(circle at 30% 30%, rgba(255,51,51,.22), transparent 60%);"></div>
                <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full blur-3xl opacity-25"
                    style="background: radial-gradient(circle at 70% 70%, rgba(255,255,255,.10), transparent 60%);">
                </div>
            </div>

            <!-- Logo -->
            <div class="relative h-20 flex items-center px-6 border-b border-white/5 bg-black/20 shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                    <span class="font-heading font-black text-2xl tracking-tighter text-white">LIFT</span>
                </a>

                <!-- Close on mobile -->
                <button type="button" class="lg:hidden ml-auto p-2 rounded-lg text-white/70 hover:text-white hover:bg-white/5
                       focus:outline-none focus-visible:ring-4 focus-visible:ring-white/10" @click="sidebarOpen=false"
                    aria-label="Cerrar menú">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Nav -->
            <nav class="relative flex-1 overflow-y-auto px-4 py-6 space-y-2">
                <p class="px-4 text-[10px] font-extrabold uppercase tracking-[0.26em] text-slate-500 mb-2">Principal</p>

                <a href="{{ route('dashboard') }}"
                    class="{{ $linkBase }} {{ request()->routeIs('dashboard') ? $linkActive : $linkIdle }}">
                    <span
                        class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-[var(--liftRed)] opacity-0 {{ request()->routeIs('dashboard') ? 'opacity-100' : 'group-hover:opacity-40' }}"></span>
                    <i class="fa-solid fa-chart-pie w-5 text-center opacity-90"></i>
                    <span>Inicio</span>
                </a>

                <p class="px-4 text-[10px] font-extrabold uppercase tracking-[0.26em] text-slate-500 mt-6 mb-2">
                    Contenido</p>

                <a href="{{ route('pages.index') }}"
                    class="{{ $linkBase }} {{ request()->routeIs('pages.*') ? $linkActive : $linkIdle }}">
                    <span
                        class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-[var(--liftRed)] opacity-0 {{ request()->routeIs('pages.*') ? 'opacity-100' : 'group-hover:opacity-40' }}"></span>
                    <i class="fa-solid fa-layer-group w-5 text-center opacity-90"></i>
                    <span>Páginas</span>
                </a>

                <a href="{{ route('documents.index') }}"
                    class="{{ $linkBase }} {{ request()->routeIs('documents.*') ? $linkActive : $linkIdle }}">
                    <span
                        class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-[var(--liftRed)] opacity-0 {{ request()->routeIs('documents.*') ? 'opacity-100' : 'group-hover:opacity-40' }}"></span>
                    <i class="fa-solid fa-file-pdf w-5 text-center opacity-90"></i>
                    <span>Documentos PDF</span>
                </a>

                <a href="{{ route('clients.index') }}"
                    class="{{ $linkBase }} {{ request()->routeIs('clients.*') ? $linkActive : $linkIdle }}">
                    <span
                        class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-[var(--liftRed)] opacity-0 {{ request()->routeIs('clients.*') ? 'opacity-100' : 'group-hover:opacity-40' }}"></span>
                    <i class="fa-solid fa-building w-5 text-center opacity-90"></i>
                    <span>Logotipos Clientes</span>
                </a>

                <a href="{{ route('projects.index') }}"
                    class="{{ $linkBase }} {{ request()->routeIs('projects.*') ? $linkActive : $linkIdle }}">
                    <span
                        class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-[var(--liftRed)] opacity-0 {{ request()->routeIs('projects.*') ? 'opacity-100' : 'group-hover:opacity-40' }}"></span>
                    <i class="fa-solid fa-briefcase w-5 text-center opacity-90"></i>
                    <span>Proyectos</span>
                </a>

                <p class="px-4 text-[10px] font-extrabold uppercase tracking-[0.26em] text-slate-500 mt-6 mb-2">
                    Comunicación</p>

                <a href="{{ route('messages.index') }}"
                    class="{{ $linkBase }} {{ request()->routeIs('messages.*') ? $linkActive : $linkIdle }}">
                    <span
                        class="absolute left-0 top-2 bottom-2 w-1 rounded-r-full bg-[var(--liftRed)] opacity-0 {{ request()->routeIs('messages.*') ? 'opacity-100' : 'group-hover:opacity-40' }}"></span>
                    <i class="fa-solid fa-envelope w-5 text-center opacity-90"></i>
                    <span>Bandeja de Entrada</span>
                </a>

                <div class="h-6"></div>
            </nav>

            <!-- User / Logout -->
            <div class="relative p-4 border-t border-white/5 bg-black/20 shrink-0">
                <div class="flex items-center gap-3 mb-4 px-2">
                    <div class="h-9 w-9 rounded-2xl bg-white/10 flex items-center justify-center text-xs font-black
                            ring-2 ring-white/10 shadow-[inset_0_1px_0_rgba(255,255,255,.10)]">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="text-sm min-w-0">
                        <div class="font-semibold text-white truncate">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-slate-400">Administrador</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-extrabold uppercase tracking-wider
                               text-white/70 hover:text-white hover:bg-white/5 rounded-xl border border-white/10 transition-colors
                               focus:outline-none focus-visible:ring-4 focus-visible:ring-white/10">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Mobile Overlay -->
        <div x-cloak x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black/50 z-40 lg:hidden"
            @click="sidebarOpen=false" aria-hidden="true"></div>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Mobile Header -->
            <header
                class="lg:hidden sticky top-0 z-30 bg-[var(--liftDark)] text-white h-16 flex items-center justify-between px-4 shadow-md">
                <a href="{{ route('dashboard') }}" class="font-heading font-black text-xl">
                    LIFT <span class="font-normal opacity-50">/ ADMIN</span>
                </a>

                <button type="button" class="p-2 rounded-lg text-slate-200 hover:text-white hover:bg-white/5
                       focus:outline-none focus-visible:ring-4 focus-visible:ring-white/10"
                    @click="sidebarOpen = !sidebarOpen" :aria-expanded="sidebarOpen.toString()" aria-controls="sidebar"
                    aria-label="Abrir menú">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </header>

            <!-- Page Content -->
            <main class="flex-1 w-full bg-slate-50 p-4 sm:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto space-y-6">
                    @isset($header)
                        <div class="mb-8">
                            {{ $header }}
                        </div>
                    @endisset

                    {{ $slot }}
                </div>

                <!-- Footer -->
                <div class="mt-12 pt-6 border-t border-slate-200 text-center text-xs text-slate-400">
                    &copy; {{ date('Y') }} LIFT. Panel de Gestión
                </div>
            </main>
        </div>
    </div>
</body>

</html>
