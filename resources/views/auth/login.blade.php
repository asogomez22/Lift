<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.favicons')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased h-screen overflow-hidden">
    <div class="h-screen flex flex-col justify-center items-center relative">

        <!-- Fondo -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/hero/grua1.jpg') }}" class="w-full h-full object-cover" alt="Background">
            <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-[2px]"></div>
            <div class="absolute inset-0 opacity-10"
                style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;">
            </div>
        </div>

        <div class="relative z-10 w-full flex flex-col items-center px-4">

            <!-- Card -->
            <div
                class="w-full sm:max-w-md px-8 py-10 bg-white/95 backdrop-blur-xl shadow-2xl rounded-3xl border border-white/20 relative overflow-hidden">

                <!-- Línea acento superior -->
                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-(--liftRed) to-transparent opacity-80">
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <a href="/">
                        <img src="{{ \App\Models\Page::where('slug', 'global')->first()?->getBlockSrc('logo', 'img/branding/Asset-7-1.png') ?? \App\Models\Page::resolveBlockSrc('img/branding/Asset-7-1.png') }}"
                            alt="Logo"
                            class="h-16 w-auto drop-shadow-md transition-transform hover:scale-105 duration-300">
                    </a>
                </div>

                <!-- Título -->
                <div class="mb-8 text-center">
                    <p class="text-sm text-slate-500 mt-2 font-medium">
                        {{ __('Introduce tus credenciales para acceder') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="space-y-2">
                        <x-input-label for="email" value="{{ __('Correo Electrónico') }}"
                            class="text-slate-700 font-bold text-xs uppercase tracking-wider ml-1" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i
                                    class="fa-regular fa-envelope text-slate-400 text-lg group-focus-within:text-(--liftRed) transition-colors"></i>
                            </div>
                            <input id="email"
                                class="block w-full pl-11 pr-4 py-3.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-(--liftRed)/20 focus:border-(--liftRed) transition-all bg-slate-50/50 hover:bg-white shadow-sm font-medium text-slate-800 placeholder:text-slate-400"
                                type="email" name="email" value="{{ old('email') }}" required autofocus
                                autocomplete="username" placeholder="nombre@empresa.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="space-y-2">
                        <x-input-label for="password" value="{{ __('Contraseña') }}"
                            class="text-slate-700 font-bold text-xs uppercase tracking-wider ml-1" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i
                                    class="fa-solid fa-lock text-slate-400 text-lg group-focus-within:text-(--liftRed) transition-colors"></i>
                            </div>
                            <input id="password"
                                class="block w-full pl-11 pr-4 py-3.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-(--liftRed)/20 focus:border-(--liftRed) transition-all bg-slate-50/50 hover:bg-white shadow-sm font-medium text-slate-800 placeholder:text-slate-400"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Recordarme & Olvidé contraseña -->
                    <div class="flex items-center justify-between pt-1">
                        <label for="remember_me" class="inline-flex items-center group cursor-pointer select-none">
                            <input id="remember_me" type="checkbox"
                                class="peer h-5 w-5 rounded border-slate-300 text-(--liftRed) shadow-sm focus:ring-(--liftRed) cursor-pointer checked:bg-(--liftRed) checked:border-(--liftRed)"
                                name="remember">
                            <span
                                class="ms-2.5 text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">{{ __('Recordarme') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-bold text-slate-500 hover:text-(--liftRed) transition-colors underline decoration-slate-300 hover:decoration-(--liftRed) underline-offset-4"
                                href="{{ route('password.request') }}">
                                {{ __('¿Contraseña olvidada?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Botón -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex justify-center items-center gap-2 py-4 px-4 border border-transparent rounded-xl shadow-lg shadow-(--liftRed)/20 text-sm font-bold text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-(--liftRed) transition-all transform hover:-translate-y-0.5 hover:shadow-xl hover:shadow-(--liftRed)/30 uppercase tracking-widest">
                            <span>{{ __('Iniciar Sesión') }}</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <p class="mt-6 text-slate-400 text-xs font-medium tracking-widest uppercase opacity-80">
                &copy; {{ date('Y') }} Lift Ingeniería S.L.
            </p>
        </div>
    </div>
</body>

</html>
