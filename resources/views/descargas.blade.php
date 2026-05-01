<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('LIFT – Descarga la App') }}</title>

    {{-- SEO Meta --}}
    <meta name="description"
        content="{{ __('Descarga la aplicación de LIFT Ingeniería para Android, macOS y Windows. Herramientas de cálculo y maniobras en tu dispositivo.') }}" />
    <meta name="author" content="LIFT Ingeniería S.L." />
    <meta name="theme-color" content="#ff3333" />
    <link rel="canonical" href="{{ url()->current() }}" />

    {{-- Open Graph --}}
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:site_name" content="LIFT Ingeniería" />
    <meta property="og:title" content="{{ __('LIFT – Descarga la App') }}" />
    <meta property="og:description"
        content="{{ __('Descarga la aplicación de LIFT para cálculos de maniobras e ingeniería de cargas.') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ __('LIFT – Descarga la App') }}" />
    <meta name="twitter:description"
        content="{{ __('Descarga la aplicación de LIFT para cálculos de maniobras e ingeniería de cargas.') }}" />
    <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

    {{-- Favicon --}}
    @include('components.favicons')

    <!-- FontAwesome CDN for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            overflow-x: hidden;
        }

        ::selection {
            background: #ff3333;
            color: white;
        }

        :root {
            --liftRed: #ff3333;
            --liftDark: #0b1020;
            --liftInk: #0f172a;
            --grid-color: rgba(0, 0, 0, 0.04);
        }

        .text-liftRed {
            color: var(--liftRed);
        }

        .ease-spring {
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Blueprint background */
        .bg-blueprint {
            background-color: #ffffff;
            background-image:
                linear-gradient(var(--grid-color) 1px, transparent 1px),
                linear-gradient(90deg, var(--grid-color) 1px, transparent 1px);
            background-size: 50px 50px;
            background-position: center center;
        }

        /* Platform card */
        .platform-card {
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 0, 0, 0.08);
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .platform-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.10), 0 0 0 1px rgba(255, 51, 51, 0.15);
            border-color: rgba(255, 51, 51, 0.25);
        }

        .platform-card .card-icon {
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), color 0.3s ease;
        }

        .platform-card:hover .card-icon {
            transform: scale(1.12) rotate(-3deg);
            color: var(--liftRed);
        }

        /* Glow pulse on hover */
        .platform-card::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: inherit;
            background: linear-gradient(135deg, rgba(255, 51, 51, 0.15), transparent 60%);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: -1;
        }

        .platform-card:hover::before {
            opacity: 1;
        }

        /* Download button */
        .btn-download {
            position: relative;
            overflow: hidden;
        }

        .btn-download::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .btn-download:hover::after {
            left: 100%;
        }
    </style>
</head>

<body class="bg-blueprint text-gray-800 antialiased" id="main-body">
    {{-- Background orbs --}}
    <div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden">
        <div
            class="absolute -top-32 -right-32 w-72 h-72 md:w-[500px] md:h-[500px] rounded-full bg-linear-to-br from-liftRed/8 via-purple-500/5 to-transparent blur-3xl">
        </div>
        <div
            class="absolute -top-48 left-1/4 w-80 h-80 md:w-[600px] md:h-[600px] rounded-full bg-linear-to-bl from-blue-500/6 via-liftRed/4 to-transparent blur-3xl">
        </div>
        <div
            class="absolute top-1/3 -left-40 w-64 h-64 md:w-96 md:h-96 rounded-full bg-linear-to-r from-blue-500/4 to-transparent blur-3xl">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-72 h-72 md:w-[500px] md:h-[500px] rounded-full bg-linear-to-tl from-liftRed/5 via-orange-500/3 to-transparent blur-3xl">
        </div>
    </div>

    <x-header />

    <main>
        {{-- HERO --}}
        <section class="relative py-6 sm:py-16 md:py-12 lg:py-16 overflow-hidden">
            <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 mb-6">
                        <span class="h-[2px] w-6 sm:w-8 bg-liftRed"></span>
                        <p
                            class="text-[9px] sm:text-[10px] md:text-xs font-extrabold tracking-[0.2em] sm:tracking-[0.3em] text-liftRed uppercase">
                            {{ __('Disponible en 4 plataformas') }}
                        </p>
                        <span class="h-[2px] w-6 sm:w-8 bg-liftRed"></span>
                    </div>

                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black tracking-tight text-[var(--liftDark)] leading-[1.1] sm:leading-[0.95]">
                        {{ __('Descarga la') }}
                        <span class="text-liftRed block sm:inline mt-2 sm:mt-0">App</span>
                    </h1>

                    <p
                        class="mt-6 text-sm sm:text-base md:text-lg text-gray-500 font-light leading-relaxed max-w-2xl mx-auto px-2 sm:px-0">
                        {{ __('Herramientas de cálculo para maniobras de izaje, eslingas, volteo y grúas. Disponible en Android, iPhone, macOS y Windows.') }}
                    </p>
                </div>
            </div>
        </section>

        {{-- DOWNLOAD CARDS --}}
        <section class="relative pb-16 sm:pb-28 lg:pb-36 overflow-hidden">
            <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 max-w-7xl mx-auto pt-4">

                    {{-- ANDROID --}}
                    <div
                        class="platform-card rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[#3DDC84]/10 border border-[#3DDC84]/20 grid place-items-center mb-4 sm:mb-6">
                            <i class="fab fa-android text-3xl sm:text-4xl text-[#3DDC84] card-icon"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-extrabold text-[var(--liftDark)] tracking-tight"
                            style="font-family: Montserrat, system-ui">
                            Android
                        </h3>
                        <p class="mt-2 text-xs sm:text-sm text-gray-500 leading-relaxed">
                            {{ __('Compatible con Android 8.0 o superior.') }}
                        </p>
                        <div class="mt-auto pt-6 sm:pt-8 w-full">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn-download w-full inline-flex items-center justify-center gap-2 sm:gap-3 px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-extrabold text-xs sm:text-sm whitespace-nowrap
                       bg-[var(--liftDark)] text-white hover:bg-[var(--liftRed)]
                       shadow-[0_10px_30px_rgba(0,0,0,0.12)] sm:shadow-[0_14px_40px_rgba(0,0,0,0.12)] hover:shadow-[0_20px_50px_rgba(255,51,51,0.20)]
                       transition-all duration-300 ease-spring active:scale-95">
                                <i class="fab fa-google-play text-base sm:text-lg"></i>
                                Google Play
                                <i class="fas fa-external-link-alt text-[10px] sm:text-xs ml-1 opacity-60"></i>
                            </a>
                        </div>
                    </div>

                    {{-- iPHONE --}}
                    <div
                        class="platform-card rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gray-100 border border-gray-200 grid place-items-center mb-4 sm:mb-6">
                            <i class="fab fa-apple text-3xl sm:text-4xl text-[var(--liftDark)] card-icon"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-extrabold text-[var(--liftDark)] tracking-tight"
                            style="font-family: Montserrat, system-ui">
                            iPhone
                        </h3>
                        <p class="mt-2 text-xs sm:text-sm text-gray-500 leading-relaxed">
                            {{ __('Compatible con iOS 15 o superior.') }}
                        </p>
                        <div class="mt-auto pt-6 sm:pt-8 w-full">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn-download w-full inline-flex items-center justify-center gap-2 sm:gap-3 px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-extrabold text-xs sm:text-sm whitespace-nowrap
                       bg-[var(--liftDark)] text-white hover:bg-[var(--liftRed)]
                       shadow-[0_10px_30px_rgba(0,0,0,0.12)] sm:shadow-[0_14px_40px_rgba(0,0,0,0.12)] hover:shadow-[0_20px_50px_rgba(255,51,51,0.20)]
                       transition-all duration-300 ease-spring active:scale-95">
                                <i class="fab fa-app-store-ios text-base sm:text-lg"></i>
                                App Store
                                <i class="fas fa-external-link-alt text-[10px] sm:text-xs ml-1 opacity-60"></i>
                            </a>
                        </div>
                    </div>

                    {{-- macOS --}}
                    <div
                        class="platform-card rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gray-100 border border-gray-200 grid place-items-center mb-4 sm:mb-6">
                            <i class="fas fa-laptop text-3xl sm:text-4xl text-[var(--liftDark)] card-icon"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-extrabold text-[var(--liftDark)] tracking-tight"
                            style="font-family: Montserrat, system-ui">
                            macOS
                        </h3>
                        <p class="mt-2 text-xs sm:text-sm text-gray-500 leading-relaxed">
                            {{ __('Compatible con macOS 12 o superior.') }}
                        </p>
                        <div class="mt-auto pt-6 sm:pt-8 w-full">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn-download w-full inline-flex items-center justify-center gap-2 sm:gap-3 px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-extrabold text-xs sm:text-sm whitespace-nowrap
                       bg-[var(--liftDark)] text-white hover:bg-[var(--liftRed)]
                       shadow-[0_10px_30px_rgba(0,0,0,0.12)] sm:shadow-[0_14px_40px_rgba(0,0,0,0.12)] hover:shadow-[0_20px_50px_rgba(255,51,51,0.20)]
                       transition-all duration-300 ease-spring active:scale-95">
                                <i class="fab fa-app-store-ios text-base sm:text-lg"></i>
                                Descargar APP
                                <i class="fas fa-external-link-alt text-[10px] sm:text-xs ml-1 opacity-60"></i>
                            </a>
                        </div>
                    </div>

                    {{-- WINDOWS --}}
                    <div
                        class="platform-card rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex flex-col items-center text-center group">
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[#0078D4]/10 border border-[#0078D4]/20 grid place-items-center mb-4 sm:mb-6">
                            <i class="fab fa-windows text-3xl sm:text-4xl text-[#0078D4] card-icon"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-extrabold text-[var(--liftDark)] tracking-tight"
                            style="font-family: Montserrat, system-ui">
                            Windows
                        </h3>
                        <p class="mt-2 text-xs sm:text-sm text-gray-500 leading-relaxed">
                            {{ __('Compatible con Windows 10 y 11.') }}
                        </p>
                        <div class="mt-auto pt-6 sm:pt-8 w-full">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="btn-download w-full inline-flex items-center justify-center gap-2 sm:gap-3 px-4 sm:px-6 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-extrabold text-xs sm:text-sm whitespace-nowrap
                       bg-[var(--liftDark)] text-white hover:bg-[var(--liftRed)]
                       shadow-[0_10px_30px_rgba(0,0,0,0.12)] sm:shadow-[0_14px_40px_rgba(0,0,0,0.12)] hover:shadow-[0_20px_50px_rgba(255,51,51,0.20)]
                       transition-all duration-300 ease-spring active:scale-95">
                                <i class="fab fa-microsoft text-base sm:text-lg"></i>
                                Descargar APP
                                <i class="fas fa-external-link-alt text-[10px] sm:text-xs ml-1 opacity-60"></i>
                            </a>
                        </div>
                    </div>

                </div>

                {{-- Feature highlights --}}
                <div class="mt-12 sm:mt-16 md:mt-20 max-w-4xl mx-auto">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 gap-8 sm:gap-6 text-center max-w-2xl mx-auto px-4 sm:px-0">
                        <div class="flex flex-col items-center gap-3">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-liftRed/10 border border-liftRed/15 grid place-items-center">
                                <i class="fas fa-calculator text-liftRed"></i>
                            </div>
                            <h4
                                class="font-extrabold text-xs sm:text-sm text-[var(--liftDark)] uppercase tracking-wider">
                                {{ __('Cálculos precisos') }}
                            </h4>
                            <p class="text-xs text-gray-500 leading-relaxed max-w-[250px] sm:max-w-none">
                                {{ __('Eslingas, velocidad máxima, volteo y capacidad de grúas.') }}
                            </p>
                        </div>
                        <div class="flex flex-col items-center gap-3">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-liftRed/10 border border-liftRed/15 grid place-items-center">
                                <i class="fas fa-tower-broadcast text-liftRed"></i>
                            </div>
                            <h4
                                class="font-extrabold text-xs sm:text-sm text-[var(--liftDark)] uppercase tracking-wider">
                                {{ __('Sin conexión') }}
                            </h4>
                            <p class="text-xs text-gray-500 leading-relaxed max-w-[250px] sm:max-w-none">
                                {{ __('Funciona completamente offline, ideal para obra y campo.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />

    {{-- WhatsApp flotante --}}
    <a href="https://wa.me/34608824788" target="_blank" rel="noopener noreferrer"
        class="fixed bottom-4 right-4 md:bottom-8 md:right-8 bg-[#25D366] w-12 h-12 md:w-14 md:h-14 rounded-full flex items-center justify-center text-white text-xl md:text-2xl shadow-xl shadow-green-500/30 z-[200] hover:scale-110 hover:rotate-12 transition-all"
        aria-label="WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
</body>

</html>
