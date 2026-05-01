<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('Página no encontrada – LIFT') }}</title>
    <meta name="theme-color" content="#ff3333" />
    @include('components.favicons')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --liftRed: #ff3333;
            --liftDark: #0b1020;
        }

        .font-heading {
            font-family: "Montserrat", system-ui, -apple-system, sans-serif;
        }

        .font-body {
            font-family: "Roboto", system-ui, -apple-system, sans-serif;
        }

        @keyframes drift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .grad-text {
            background-image: linear-gradient(90deg, #ff3333, #ff6b6b, #ff3333);
            background-size: 200% 200%;
            animation: drift 6s ease infinite;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>

<body
    class="bg-slate-50 text-slate-900 antialiased font-body selection:bg-red-100 selection:text-slate-900 flex flex-col min-h-screen relative">

    <x-header />

    <main class="flex-grow flex flex-col items-center justify-center relative overflow-hidden w-full min-h-[70vh] py-20">
        <!-- BACKDROP NOISE & BLOBS -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <!-- blobs -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] sm:w-[800px] sm:h-[800px] rounded-full blur-[120px] opacity-40"
                style="background: radial-gradient(circle, rgba(255,51,51,.25), transparent 60%);"></div>

            <!-- dot grid -->
            <div class="absolute inset-0 opacity-[0.08]"
                style="background-image: radial-gradient(rgba(15,23,42,.45) 1px, transparent 1px); background-size: 24px 24px;">
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="relative z-10 mx-auto max-w-3xl px-6 text-center">
            <div class="inline-flex items-center justify-center mb-6">
                <span
                    class="inline-block px-4 py-1.5 rounded-full bg-red-100 text-[var(--liftRed)] font-heading font-extrabold text-[11px] tracking-widest uppercase shadow-sm">
                    Error 404
                </span>
            </div>

            <h1
                class="font-heading text-7xl sm:text-9xl font-black tracking-tighter text-slate-200 drop-shadow-sm mb-4 select-none">
                4<span class="grad-text">0</span>4
            </h1>

            <h2 class="font-heading text-2xl sm:text-4xl font-extrabold tracking-tight text-slate-900 mb-6 uppercase">
                {{ __('Página no encontrada') }}
            </h2>

            <p class="text-slate-500 text-lg sm:text-xl max-w-lg mx-auto mb-10 leading-relaxed">
                {{ __('Parece que la página que buscas no existe, ha sido movida o está temporalmente inaccesible.') }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ url('/') }}"
                    class="group inline-flex items-center justify-center px-8 py-4 rounded-xl text-white font-heading font-extrabold text-[12px] tracking-[0.2em] uppercase shadow-xl shadow-red-500/25 hover:shadow-red-500/40 hover:-translate-y-1 transition-all w-full sm:w-auto"
                    style="background: linear-gradient(90deg, #ff3333, #ff5151);">
                    <i class="fa-solid fa-arrow-left mr-3 transition-transform group-hover:-translate-x-1"></i>
                    {{ __('Volver al Inicio') }}
                </a>
                <a href="{{ url('/contacto') }}"
                    class="group inline-flex items-center justify-center px-8 py-4 rounded-xl bg-white border border-slate-200 text-slate-900 font-heading font-extrabold text-[12px] tracking-[0.2em] uppercase hover:bg-slate-50 hover:border-slate-300 hover:-translate-y-1 transition-all w-full sm:w-auto shadow-sm hover:shadow-md">
                    {{ __('Contactar a soporte') }}
                </a>
            </div>
        </div>
    </main>

    <x-footer />

</body>

</html>
