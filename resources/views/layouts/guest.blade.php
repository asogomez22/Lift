<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.favicons')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">

        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/hero/grua1.jpg') }}" class="w-full h-full object-cover" alt="Background">
            <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-[2px]"></div>
            <!-- Grid Pattern Overlay -->
            <div class="absolute inset-0 opacity-10"
                style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;">
            </div>
        </div>

        <div class="relative z-10 w-full flex flex-col items-center">
            <!-- Logo -->
            <div class="mb-8">
                <a href="/">
                    <img src="{{ \App\Models\Page::where('slug', 'global')->first()?->getBlockSrc('logo', 'img/branding/Asset-7-1.png') ?? \App\Models\Page::resolveBlockSrc('img/branding/Asset-7-1.png') }}"
                        alt="Logo" class="h-20 w-auto drop-shadow-lg transition-transform hover:scale-105 duration-300">
                </a>
            </div>

            <!-- Card -->
            <div
                class="w-full sm:max-w-md px-8 py-10 bg-white/95 backdrop-blur-xl shadow-2xl rounded-3xl border border-white/20 sm:rounded-3xl relative overflow-hidden group">
                <!-- Top accent line -->
                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-(--liftRed) to-transparent opacity-80">
                </div>

                {{ $slot }}
            </div>

            <!-- Footer Text -->
            <p class="mt-8 text-slate-400 text-xs font-medium tracking-widest uppercase opacity-80">
                &copy; {{ date('Y') }} Lift Ingeniería S.L.
            </p>
        </div>
    </div>
</body>

</html>
