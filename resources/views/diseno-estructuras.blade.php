<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('Diseño y Cálculo de Estructuras – LIFT') }}</title>

    {{-- SEO Meta --}}
    <meta name="description"
        content="{{ __('Diseño y cálculo de estructuras metálicas y de hormigón. Proyectos de ingeniería estructural para la industria, naves, plataformas y soportes de grúa.') }}" />
    <meta name="author" content="LIFT Ingeniería S.L." />
    <meta name="theme-color" content="#ff3333" />
    <link rel="canonical" href="{{ url()->current() }}" />

    {{-- Open Graph --}}
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:site_name" content="LIFT Ingeniería" />
    <meta property="og:title" content="{{ __('Diseño y Cálculo de Estructuras – LIFT') }}" />
    <meta property="og:description"
        content="{{ __('Diseño y cálculo de estructuras metálicas y de hormigón para la industria.') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ __('Diseño y Cálculo de Estructuras – LIFT') }}" />
    <meta name="twitter:description"
        content="{{ __('Diseño y cálculo de estructuras metálicas y de hormigón para la industria.') }}" />
    <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

    {{-- Favicon --}}
    @include('components.favicons')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --liftRed: #ff3333;
            --ink: #0f172a;
            --muted: #64748b;
            --bg: #ffffff;
            --bgSoft: #f8fafc;
            --ease: cubic-bezier(.16, 1, .3, 1);
            --shadow: 0 18px 55px rgba(2, 6, 23, .10);
            --shadow2: 0 14px 40px rgba(2, 6, 23, .12);

            --container: 80rem;
            --gutter: clamp(1rem, 3vw, 2rem);
            --sectionY: clamp(3.25rem, 6vw, 6rem);
            --radius: clamp(18px, 2vw, 28px);
            --navH: 96px;

            --h1: clamp(2.2rem, 4.2vw, 4.1rem);
            --h2: clamp(1.9rem, 3vw, 2.5rem);
            --h3: clamp(1.35rem, 2vw, 1.8rem);
            --p: clamp(1.02rem, 1.15vw, 1.15rem);
        }

        html,
        body {
            overflow-x: clip;
        }

        #diseno-page {
            font-family: "Roboto", system-ui, -apple-system, Segoe UI, Inter, sans-serif;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            background: var(--bg);
            color: var(--ink);
        }

        #diseno-page .font-heading {
            font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Inter, sans-serif;
        }

        #diseno-page .u-container {
            width: min(100% - (var(--gutter) * 2), var(--container));
            margin-inline: auto;
        }

        #diseno-page .scrollbar {
            position: fixed;
            left: 0;
            top: 0;
            height: 3px;
            width: 0;
            z-index: 70;
            background: linear-gradient(90deg, var(--liftRed), #ff8a8a, var(--liftRed));
            box-shadow: 0 12px 30px rgba(255, 51, 51, .22);
        }

        #diseno-page [id] {
            scroll-margin-top: calc(var(--navH) + 18px);
        }

        /* Animaciones suaves */
        #diseno-page .reveal {
            opacity: 0;
            transform: translateY(14px);
            filter: blur(10px);
        }

        #diseno-page .reveal.is-in {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
            transition: opacity .8s var(--ease), transform .9s var(--ease), filter .9s var(--ease);
        }

        #diseno-page .reveal.is-in[data-delay="1"] {
            transition-delay: 70ms;
        }

        #diseno-page .reveal.is-in[data-delay="2"] {
            transition-delay: 130ms;
        }

        #diseno-page .reveal.is-in[data-delay="3"] {
            transition-delay: 200ms;
        }

        #diseno-page .reveal.is-in[data-delay="4"] {
            transition-delay: 270ms;
        }

        @media (max-width: 640px) {
            #diseno-page .reveal {
                opacity: 1 !important;
                transform: none !important;
                filter: none !important;
            }

            #diseno-page .reveal.is-in {
                transition: none !important;
            }
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

        #diseno-page .grad-text {
            background-image: linear-gradient(90deg, var(--liftRed), #ff7a7a, var(--liftRed));
            background-size: 200% 200%;
            animation: drift 6s ease infinite;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        #diseno-page .btn {
            transition: all .35s var(--ease);
            will-change: transform, background-color, box-shadow;
        }

        #diseno-page .btn:active {
            transform: translateY(2px) scale(.98);
        }

        /* Cards */
        #diseno-page .card {
            border-radius: var(--radius);
            border: 1px solid rgba(226, 232, 240, .95);
            background: #fff;
            overflow: hidden;
            transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s var(--ease);
        }

        #diseno-page .card:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 51, 51, .18);
            box-shadow: var(--shadow);
        }

        /* Imagen elegante */
        #diseno-page .img-zoom {
            transform: scale(1.01);
            transition: transform .9s var(--ease), filter .9s var(--ease);
            will-change: transform;
            object-fit: cover !important;
            object-position: center !important;
        }

        #diseno-page .card:hover .img-zoom {
            transform: scale(1.07);
            filter: saturate(1.04) contrast(1.02);
        }

        #diseno-page .soft-grid {
            background-image:
                radial-gradient(rgba(15, 23, 42, 0.06) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        @media (prefers-reduced-motion: reduce) {

            #diseno-page .reveal,
            #diseno-page .reveal.is-in {
                transition: none !important;
                opacity: 1 !important;
                transform: none !important;
                filter: none !important;
            }

            #diseno-page .grad-text {
                animation: none !important;
            }

            #diseno-page .img-zoom {
                transition: none !important;
                transform: none !important;
            }
        }
    </style>
</head>

<body class="antialiased selection:bg-red-100 selection:text-slate-900">
    <div class="scrollbar" id="scrollbar"></div>

    <x-header />

    <main id="diseno-page">

        <!-- HERO (menos fotos, más elegante) -->
        <section class="relative overflow-hidden -mt-20"
            style="padding-top: calc(var(--navH) + clamp(1.5rem, 4vw, 2.5rem)); padding-bottom: clamp(3rem, 6vw, 5rem);">
            <div class="absolute inset-0 soft-grid opacity-[0.55] pointer-events-none"></div>

            <div class="u-container relative">
                <div class="grid lg:grid-cols-12 gap-8 items-center">
                    <!-- Texto -->
                    <div class="lg:col-span-5">
                        <div class="reveal inline-flex items-center gap-3 mb-6" data-delay="1">
                            <span class="h-px w-10 bg-[var(--liftRed)]"></span>
                            <span
                                class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-[var(--liftRed)]">
                                {{ __('Ingeniería Estructural') }}
                            </span>
                        </div>

                        <h1 class="reveal font-heading font-black tracking-tight leading-[1.05] text-slate-900"
                            data-delay="2" style="font-size: clamp(2rem, 3.8vw, 3.8rem)">
                            {{ __('Diseño, cálculos') }} <br />
                            <span class="grad-text">{{ __('y marcado CE') }}</span>
                        </h1>

                        <p class="reveal mt-6 text-slate-700 leading-relaxed font-medium" data-delay="3"
                            style="font-size: clamp(1.15rem, 1.6vw, 1.3rem); max-width: 50ch">
                            {{ __('De estructuras, útiles de izado y herramientas especiales necesarias para realizar movimientos de cargas.') }}
                        </p>

                        <p class="reveal mt-3 text-slate-500 leading-relaxed" data-delay="3"
                            style="font-size: 1.05rem; max-width: 55ch">
                            {{ __('Modelado 3D, planos de detalle y memorias de cálculo con acompañamiento integral.') }}
                        </p>

                        <div class="reveal mt-9 flex flex-col sm:flex-row gap-3" data-delay="4">
                            <a href="#proyectos"
                                class="btn inline-flex items-center justify-center gap-2 rounded-full bg-[var(--liftRed)] px-7 py-3.5 text-white shadow-[0_18px_55px_rgba(255,51,51,.18)] hover:brightness-[1.15] hover:scale-[1.02] font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase">
                                {{ __('Ver proyectos') }}
                                <i class="fa-solid fa-arrow-down text-xs"></i>
                            </a>

                            <a href="{{ route('contacto') }}"
                                class="btn inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-7 py-3.5 text-slate-900 hover:bg-slate-50 hover:scale-[1.02] font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase">
                                {{ __('Solicitar presupuesto') }}
                                <i class="fa-solid fa-arrow-right text-xs text-slate-500"></i>
                            </a>
                        </div>

                    </div>

                    <!-- Imagen principal (SOLO UNA) -->
                    <div class="lg:col-span-7">
                        <div class="reveal card" data-delay="2">
                            <div class="relative aspect-16/10 overflow-hidden rounded-3xl">
                                <img src="{{ optional($page ?? null)->getBlockSrc('hero_main_image', 'img/slider/SLIDER-HOME-estructuras-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-estructuras-2.png') }}"
                                    alt="Proyecto estructural LIFT"
                                    class="absolute inset-0 w-full h-full object-cover img-zoom" loading="eager" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent">
                                </div>
                                <div class="absolute left-8 bottom-8 right-8">
                                    <p
                                        class="font-heading text-[11px] tracking-[0.32em] uppercase font-extrabold text-white/90">
                                        {{ __('Proyecto destacado') }}
                                    </p>
                                    <p class="text-white font-heading font-black text-2xl mt-2">
                                        {{ __('Estructura metálica · montaje controlado') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BLOQUE TEXTO HERO ("Qué hacemos") - Centrado y limpio -->
                <div class="reveal mt-16 max-w-4xl mx-auto" data-delay="4">
                    <div
                        class="rounded-3xl border border-slate-200 bg-white p-8 md:p-10 shadow-[0_12px_40px_rgba(2,6,23,.06)] text-center relative overflow-hidden">

                        <!-- decorative detail -->
                        <div
                            class="absolute top-0 left-0 w-full h-1 bg-linear-to-r from-transparent via-(--liftRed) to-transparent opacity-20">
                        </div>

                        <p class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-(--liftRed)">
                            {{ __('Qué hacemos') }}
                        </p>
                        <h2 class="font-heading font-black text-slate-900 mt-3 mx-auto max-w-2xl"
                            style="font-size: var(--h3)">
                            {{ __('Ingeniería de diseño y constructiva') }}
                        </h2>
                        <p class="text-slate-600 mt-4 leading-relaxed max-w-2xl mx-auto">
                            {{ __('Separadores, balancines, carrileras, enganches de izado, estructuras de tracción y cualquier otro elemento necesario para el desplazamiento de cargas en el espacio.') }}
                        </p>

                        <div class="mt-8 flex flex-wrap justify-center gap-6 sm:gap-12">
                            <div class="flex flex-col items-center gap-2">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center text-(--liftRed)">
                                    <i class="fa-solid fa-layer-group text-lg"></i>
                                </div>
                                <p class="font-heading font-bold text-slate-900 text-sm">{{ __('Coordinación 3D') }}</p>
                            </div>

                            <div class="flex flex-col items-center gap-2">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center text-(--liftRed)">
                                    <i class="fa-solid fa-file-lines text-lg"></i>
                                </div>
                                <p class="font-heading font-bold text-slate-900 text-sm">
                                    {{ __('Documentación Ejecutiva') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <!-- SERVICIOS (bonito sin foto) -->
        <section id="servicios" class="bg-white relative"
            style="padding-block: var(--sectionY); border-top: 1px solid #e2e8f0;">
            <div class="u-container">
                <div class="mb-12 max-w-2xl">
                    <div class="reveal" data-delay="1">
                        <p
                            class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-[var(--liftRed)]">
                            {{ __('Servicios') }}
                        </p>
                        <h2 class="font-heading font-black text-slate-900 mt-2" style="font-size: var(--h2)">
                            {{ __('Soluciones integradas') }}
                        </h2>
                        <p class="text-slate-600 mt-4 leading-relaxed">
                            {{ __('Integramos en un mismo estudio lifting-plan, diseño estructural, planos de diseño, planos de detalle y memoria de calculo.') }}
                        </p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <div class="reveal card p-7" data-delay="1">
                        <div
                            class="w-12 h-12 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center mb-5">
                            <i class="fa-solid fa-cube text-[var(--liftRed)] text-lg"></i>
                        </div>
                        <h3 class="font-heading font-black text-slate-900 mb-2" style="font-size: var(--h3)">
                            {{ __('Modelado 3D / BIM') }}
                        </h3>
                        <p class="text-slate-600 leading-relaxed">
                            {{ __('Modelos precisos para coordinación, validación con cliente y decisiones rápidas.') }}
                        </p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Coordinación') }}</span>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Interferencias') }}</span>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">Renders</span>
                        </div>
                    </div>

                    <div class="reveal card p-7" data-delay="2">
                        <div
                            class="w-12 h-12 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center mb-5">
                            <i class="fa-solid fa-drafting-compass text-[var(--liftRed)] text-lg"></i>
                        </div>
                        <h3 class="font-heading font-black text-slate-900 mb-2" style="font-size: var(--h3)">
                            {{ __('Planos de detalle') }}
                        </h3>
                        <p class="text-slate-600 leading-relaxed">
                            {{ __('Planos de fabricación y montaje, con detalles constructivos para ejecución sin dudas.') }}
                        </p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Fabricación') }}</span>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Montaje') }}</span>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Listados') }}</span>
                        </div>
                    </div>

                    <div class="reveal card p-7" data-delay="3">
                        <div
                            class="w-12 h-12 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center mb-5">
                            <i class="fa-solid fa-calculator text-[var(--liftRed)] text-lg"></i>
                        </div>
                        <h3 class="font-heading font-black text-slate-900 mb-2" style="font-size: var(--h3)">
                            {{ __('Memoria de cálculo') }}
                        </h3>
                        <p class="text-slate-600 leading-relaxed">
                            {{ __('Justificación normativa y verificación de resistencia/estabilidad con informes claros.') }}
                        </p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Cargas') }}</span>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Combinaciones') }}</span>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">{{ __('Verificación') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- GALERÍA (solo 6 fotos, en grid bonito) -->
        <section id="galeria" class="bg-white relative"
            style="padding-block: var(--sectionY); border-top: 1px solid #e2e8f0;">
            <div class="u-container">
                <div class="mb-10 max-w-2xl">
                    <div class="reveal" data-delay="1">
                        <p
                            class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-[var(--liftRed)]">
                            {{ __('Galería') }}
                        </p>
                        <h2 class="font-heading font-black text-slate-900 mt-2" style="font-size: var(--h2)">
                            {{ __('Proyectos realizados') }}
                        </h2>
                        <p class="text-slate-600 mt-4">
                            {{ __('Aquí puedes ver algunos de los proyectos que hemos realizado.') }}
                        </p>
                    </div>
                </div>

                <div class="reveal grid md:grid-cols-12 gap-4" data-delay="2">
                    <figure class="card md:col-span-7 overflow-hidden relative">
                        <div class="w-full aspect-[16/10]"></div>
                        <img src="{{ optional($page ?? null)->getBlockSrc('gallery_1_image', 'img/hero/grua1.jpg') ?? \App\Models\Page::resolveBlockSrc('img/hero/grua1.jpg') }}"
                            alt="Galería 01" class="absolute inset-0 w-full h-full object-cover img-zoom"
                            loading="lazy">
                    </figure>

                    <figure class="card md:col-span-5 overflow-hidden relative">
                        <div class="w-full aspect-[16/10]"></div>
                        <img src="{{ optional($page ?? null)->getBlockSrc('gallery_2_image', 'img/hero/grua2.jpg') ?? \App\Models\Page::resolveBlockSrc('img/hero/grua2.jpg') }}"
                            alt="Galería 02" class="absolute inset-0 w-full h-full object-cover img-zoom"
                            loading="lazy">
                    </figure>

                    <figure class="card md:col-span-4 overflow-hidden relative">
                        <div class="w-full aspect-[4/3]"></div>
                        <img src="{{ optional($page ?? null)->getBlockSrc('gallery_3_image', 'img/hero/hero1.jpg') ?? \App\Models\Page::resolveBlockSrc('img/hero/hero1.jpg') }}"
                            alt="Galería 03" class="absolute inset-0 w-full h-full object-cover img-zoom"
                            loading="lazy">
                    </figure>

                    <figure class="card md:col-span-4 overflow-hidden relative">
                        <div class="w-full aspect-[4/3]"></div>
                        <img src="{{ optional($page ?? null)->getBlockSrc('gallery_4_image', 'img/slider/SLIDER-HOME-supervision-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-supervision-2.png') }}"
                            alt="Galería 04" class="absolute inset-0 w-full h-full object-cover img-zoom"
                            loading="lazy">
                    </figure>

                    <figure class="card md:col-span-4 overflow-hidden relative">
                        <div class="w-full aspect-[4/3]"></div>
                        <img src="{{ optional($page ?? null)->getBlockSrc('gallery_5_image', 'img/slider/SLIDER-HOME-formacion-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-formacion-2.png') }}"
                            alt="Galería 05" class="absolute inset-0 w-full h-full object-cover img-zoom"
                            loading="lazy">
                    </figure>

                    <figure class="card md:col-span-12 overflow-hidden relative">
                        <div class="w-full aspect-[21/7]"></div>
                        <img src="{{ optional($page ?? null)->getBlockSrc('gallery_6_image', 'img/slider/SLIDER-HOME-camio-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-camio-2.png') }}"
                            alt="Galería 06" class="absolute inset-0 w-full h-full object-cover img-zoom"
                            loading="lazy">
                    </figure>
                </div>

                <div class="reveal mt-8 flex flex-col sm:flex-row gap-3" data-delay="3">
                    <a href="{{ route('contacto') }}"
                        class="btn inline-flex items-center justify-center gap-2 rounded-full bg-[var(--liftRed)] px-8 py-4 text-white shadow-[0_18px_55px_rgba(255,51,51,.18)] hover:brightness-[1.15] hover:scale-[1.02] font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase">
                        {{ __('Solicitar presupuesto') }}
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('ingenieria') }}"
                        class="btn inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-8 py-4 text-slate-900 hover:bg-slate-50 hover:scale-[1.02] font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase">
                        {{ __('Ver más servicios') }}
                        <i class="fa-solid fa-arrow-right text-xs text-slate-500"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="bg-white relative" style="padding-block: var(--sectionY); border-top: 1px solid #e2e8f0;">
            <div class="u-container">
                <div class="mb-10 max-w-2xl">
                    <div class="reveal" data-delay="1">
                        <p
                            class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-[var(--liftRed)]">
                            {{ __('Preguntas frecuentes') }}
                        </p>
                        <h2 class="font-heading font-black text-slate-900 mt-2" style="font-size: var(--h2)">
                            {{ __('Dudas típicas antes de empezar') }}
                        </h2>
                        <p class="text-slate-600 mt-4">
                            {{ __('Respuestas rápidas para que tengas toda la información antes de contactarnos.') }}
                        </p>
                    </div>
                </div>

                <div class="reveal grid lg:grid-cols-2 gap-4" data-delay="2">
                    <details class="card p-6">
                        <summary class="cursor-pointer font-heading font-black text-slate-900">
                            {{ __('¿Qué información necesitáis para presupuestar?') }}
                        </summary>
                        <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                            {{ __('Fotos, medidas aproximadas, planos si existen, ubicación y objetivo (nueva estructura, refuerzo, ampliación, etc.).') }}
                            refuerzo, ampliación, etc.).
                        </p>
                    </details>

                    <details class="card p-6">
                        <summary class="cursor-pointer font-heading font-black text-slate-900">
                            {{ __('¿Entregáis documentación para obra?') }}
                        </summary>
                        <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                            {{ __('Sí: planos de detalle y memoria de cálculo. El paquete exacto se ajusta al alcance del proyecto.') }}
                            proyecto.
                        </p>
                    </details>

                    <details class="card p-6">
                        <summary class="cursor-pointer font-heading font-black text-slate-900">
                            {{ __('¿Podéis revisar una estructura existente?') }}
                        </summary>
                        <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                            {{ __('Sí: comprobación de capacidad portante, refuerzos puntuales y adaptación a requisitos actuales.') }}
                            actuales.
                        </p>
                    </details>

                    <details class="card p-6">
                        <summary class="cursor-pointer font-heading font-black text-slate-900">
                            {{ __('¿Cómo se gestionan cambios durante el proyecto?') }}
                        </summary>
                        <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                            {{ __('Se registran y se valida el impacto en modelo, planos y cálculo antes de incorporar cambios a la entrega final.') }}
                            a la entrega final.
                        </p>
                    </details>
                </div>
            </div>
        </section>

        <!-- CTA FINAL -->
        <section class="bg-white relative" style="padding-block: var(--sectionY); border-top: 1px solid #e2e8f0;">
            <div class="u-container">
                <div
                    class="max-w-4xl mx-auto rounded-3xl border border-slate-200 bg-gradient-to-br from-slate-50 to-red-50/30 p-8 md:p-12 text-center">
                    <h2 class="font-heading font-black text-slate-900 mb-4" style="font-size: var(--h2)">
                        {{ __('¿Necesitas diseño estructural?') }}
                    </h2>
                    <p class="text-slate-600 leading-relaxed max-w-2xl mx-auto mb-8">
                        {{ __('Te ayudamos desde el concepto hasta obra. Contacta y cuéntanos tu caso.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contacto') }}"
                            class="btn inline-flex items-center justify-center gap-2 rounded-full bg-[var(--liftRed)] px-8 py-4 text-white shadow-[0_18px_55px_rgba(255,51,51,.18)] hover:brightness-[1.15] hover:scale-[1.02] font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase">
                            {{ __('Solicitar presupuesto') }}
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="#proyectos"
                            class="btn inline-flex items-center justify-center gap-2 rounded-full border border-slate-300 bg-white px-8 py-4 text-slate-900 hover:bg-slate-50 hover:scale-[1.02] font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase">
                            {{ __('Ver proyectos') }}
                            <i class="fa-solid fa-arrow-up text-xs text-slate-500"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <x-footer />

    <script>
        // Scroll progress bar
        window.addEventListener('scroll', () => {
            const scrollbar = document.getElementById('scrollbar');
            if (scrollbar) {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                scrollbar.style.width = ((winScroll / height) * 100) + '%';
            }
        });

        // Reveal on scroll
        const reveals = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('is-in');
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        reveals.forEach(el => revealObserver.observe(el));
    </script>
</body>

</html>
