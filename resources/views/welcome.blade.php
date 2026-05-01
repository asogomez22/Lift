<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('LIFT – Ingeniería, Formación y Supervisión') }}</title>

  {{-- SEO Meta --}}
  <meta name="description"
    content="{{ __('Ingeniería de grúas, formación técnica y supervisión industrial para movimientos mecánicos de cargas en la gran industria.') }}" />
  <meta name="author" content="LIFT Ingeniería S.L." />
  <meta name="theme-color" content="#ff3333" />
  <link rel="canonical" href="{{ url('/') }}" />

  {{-- Open Graph --}}
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:site_name" content="LIFT Ingeniería" />
  <meta property="og:title" content="{{ __('LIFT – Ingeniería, Formación y Supervisión') }}" />
  <meta property="og:description"
    content="{{ __('Expertos en movimiento mecánico de cargas, ingeniería de grúas, formación técnica especializada y supervisión industrial.') }}" />
  <meta property="og:url" content="{{ url('/') }}" />
  <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ __('LIFT – Ingeniería, Formación y Supervisión') }}" />
  <meta name="twitter:description"
    content="{{ __('Expertos en movimiento mecánico de cargas, ingeniería de grúas, formación técnica especializada y supervisión industrial.') }}" />
  <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Robots --}}
  <meta name="robots" content="index, follow" />

  {{-- Favicon --}}
  @include('components.favicons')

  {{-- Preconnect (early, before CSS) --}}
  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin />

  {{-- Preload LCP hero image --}}
  <link rel="preload" as="image" href="{{ asset($page->getBlockSrc('home_hero_bg', 'img/hero/grua1.jpg')) }}" fetchpriority="high" />

  {{-- JSON-LD Structured Data --}}
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "ProfessionalService",
    "name": "LIFT Ingeniería S.L.",
    "url": "{{ url('/') }}",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('img/branding/Asset-7-1.png') }}"
    },
    "image": "{{ asset('img/hero/grua1.jpg') }}",
    "description": "Expertos en movimiento mecánico de cargas con grúas, elementos de tracción y transportes especiales para la gran industria. Ingeniería, formación técnica y supervisión industrial.",
    "address": {
      "@@type": "PostalAddress",
      "addressCountry": "ES"
    },
    "areaServed": {
      "@@type": "Country",
      "name": "España"
    },
    "knowsAbout": [
      "Movimiento mecánico de cargas",
      "Ingeniería de grúas",
      "Lifting Plans",
      "Transporte especial",
      "Formación técnica industrial",
      "Supervisión de maniobras",
      "Diseño de estructuras auxiliares"
    ],
    "contactPoint": {
      "@@type": "ContactPoint",
      "contactType": "customer service",
      "url": "{{ url('/contacto') }}",
      "availableLanguage": ["Spanish"]
    },
    "sameAs": []
  }
  </script>
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "WebSite",
    "name": "LIFT Ingeniería",
    "url": "{{ url('/') }}",
    "description": "Ingeniería, formación y supervisión en movimientos mecánicos de cargas para la gran industria.",
    "inLanguage": "es"
  }
  </script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* Composited ping animation (avoids layout-triggering width/height changes) */
    @keyframes composited-ping {
      0% {
        transform: scale(1);
        opacity: 0.75;
      }

      75%,
      100% {
        transform: scale(2);
        opacity: 0;
      }
    }

    .animate-composited-ping {
      animation: composited-ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
      will-change: transform, opacity;
    }

    body {
      overflow-x: hidden;
    }

    /* Selección personalizada */
    ::selection {
      background: #ff3333;
      color: white;
    }

    :root {
      --liftRed: #ff3333;
    }

    .text-liftRed {
      color: var(--liftRed);
    }

    .shadow-liftRed\/10 {
      --tw-shadow-color: rgba(255, 51, 51, 0.1);
    }

    .hotspot {
      position: absolute;
      z-index: 30;
      cursor: pointer;
      background: transparent !important;
      border-radius: 0 !important;
      border: none !important;
      box-shadow: none !important;
      -webkit-tap-highlight-color: transparent;
    }

    .hotspot:hover,
    .hotspot:focus {
      background: transparent !important;
      border: none !important;
      box-shadow: none !important;
    }

    .pop-img {
      position: absolute;
      z-index: 50;
      opacity: 0;
      pointer-events: none;
      transition: all 0.3s ease;
    }

    .target-camion,
    .target-camion img {
      filter: none !important;
      box-shadow: none !important;
      -webkit-filter: none !important;
    }

    /* --- MÓVIL --- */
    @media (max-width: 768px) {
      .hotspot {
        border: none !important;
        background: transparent !important;
        animation: none !important;
      }

      .pop-img {
        width: auto !important;
        height: auto !important;
        background: transparent !important;
        transform: translateY(10px);
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 200px;
      }

      .peer\/grua:focus~.target-grua,
      .peer\/gruaDerecha:focus~.target-gruaDerecha,
      .peer\/grupo:focus~.target-grupo,
      .peer\/personas:focus~.target-personas,
      .peer\/camion:focus~.target-camion,
      .peer\/andamios:focus~.target-andamios,
      .peer\/revision:focus~.target-revision,
      .peer\/elevador:focus~.target-elevador {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
        z-index: 100;
      }

      .pop-img img,
      .close-btn {
        display: none !important;
      }

      .glass-p {
        position: relative !important;
        background: rgba(18, 20, 30, 0.95) !important;
        backdrop-filter: blur(10px) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-left: 3px solid var(--liftRed) !important;
        border-radius: 6px !important;
        color: #fff !important;
        padding: 12px !important;
        font-size: 0.85rem !important;
        line-height: 1.4 !important;
        text-align: left !important;
        width: 220px !important;
        max-width: 90vw !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6) !important;
        top: auto !important;
        left: auto !important;
        right: auto !important;
        bottom: auto !important;
        margin: 0 !important;
        transform: none !important;
      }

      .target-gruaDerecha,
      .target-andamios,
      .target-elevador,
      .target-camion {
        align-items: flex-end !important;
        right: 5% !important;
        left: auto !important;
      }

      .target-grua,
      .target-personas,
      .target-grupo,
      .target-revision {
        align-items: flex-start !important;
        left: 5% !important;
      }

      .group {
        aspect-ratio: auto !important;
        height: auto !important;
        max-height: 80vh !important;
      }

      .group>img {
        object-fit: contain !important;
        width: 100% !important;
        height: auto !important;
        max-height: 80vh !important;
      }
    }

    /* --- ESCRITORIO --- */
    @media (min-width: 769px) {
      .pop-img {
        background: transparent;
        display: flex;
        flex-direction: column;
        transform: translateY(10px);
        filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.6));
      }

      .pop-img img {
        border-radius: 12px;
        width: 100%;
        display: block;
        height: auto;
      }

      .glass-p {
        position: absolute;
        top: 100%;
        margin-top: 12px;
        width: max-content;
        min-width: 200px;
        max-width: 280px;
        background: rgba(18, 20, 30, 0.85);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-left: 3px solid var(--liftRed);
        border-radius: 8px;
        color: #f1f5f9;
        padding: 12px 16px;
        font-size: clamp(11px, 0.9vw, 14px);
        line-height: 1.4;
        text-align: left;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        left: 50%;
        transform: translateX(-50%);
        z-index: 60;
      }

      .target-grua .glass-p,
      .target-personas .glass-p,
      .target-grupo .glass-p {
        left: 0;
        transform: none;
        text-align: left;
      }

      .target-gruaDerecha .glass-p,
      .target-andamios .glass-p,
      .target-elevador .glass-p,
      .target-camion .glass-p {
        left: auto;
        right: 0;
        transform: none;
        text-align: left;
      }

      .target-grupo .glass-p,
      .target-personas .glass-p,
      .target-camion .glass-p {
        top: auto;
        bottom: 100%;
        margin-top: 0;
        margin-bottom: 12px;
      }

      .close-btn {
        display: none;
      }

      .peer\/grua:hover~.target-grua,
      .peer\/gruaDerecha:hover~.target-gruaDerecha,
      .peer\/grupo:hover~.target-grupo,
      .peer\/personas:hover~.target-personas,
      .peer\/camion:hover~.target-camion,
      .peer\/andamios:hover~.target-andamios,
      .peer\/revision:hover~.target-revision,
      .peer\/elevador:hover~.target-elevador {
        opacity: 1;
        transform: translateY(-10px);
        z-index: 60;
      }

      .target-camion {
        transform: translateY(-15px) !important;
        transition: transform 0.25s ease, opacity 0.2s ease !important;
        opacity: 0;
      }

      .peer\/camion:hover~.target-camion {
        transform: translateY(0) !important;
        filter: none !important;
        box-shadow: none !important;
        opacity: 1 !important;
        z-index: 80 !important;
      }
    }

    /* ========== CSS HERO INDUSTRIAL ========== */
    :root {
      --lift-dark: #0f1322;
      --grid-color: rgba(0, 0, 0, 0.04);
    }

    /* Animación de entrada para el texto */
    .char-entry {
      display: inline-block;
      opacity: 0;
      transform: translateY(20px);
      animation: revealChar 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    @keyframes revealChar {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Fondo de cuadrícula técnica dinámica */
    .bg-blueprint {
      background-color: #ffffff;
      background-image:
        linear-gradient(var(--grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--grid-color) 1px, transparent 1px);
      background-size: 50px 50px;
      background-position: center center;
    }

    /* Animación de dibujo de líneas SVG */
    .draw-line {
      stroke-dasharray: 1000;
      stroke-dashoffset: 1000;
      animation: draw 3s ease-in-out forwards;
    }

    @keyframes draw {
      to {
        stroke-dashoffset: 0;
      }
    }

    /* Imágenes con máscara angular profesional */
    .mask-industrial {
      clip-path: polygon(0 0, 100% 0, 100% 85%, 85% 100%, 0 100%);
    }

    .mask-industrial-reverse {
      clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%, 0 15%);
    }

    /* Hover effect en botones */
    .btn-lift-primary::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: -100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
      transition: 0.5s;
    }

    .btn-lift-primary:hover::after {
      left: 100%;
    }

    /* ========== ESTILOS TARJETAS SERVICIOS ========== */
    /* Tarjeta con background en :before para poder aplicar filtros sin tocar el contenido */
    .lift-bg-card {
      position: relative;
      overflow: hidden;
      isolation: isolate;
      min-height: 220px;
      /* móvil: suficiente para que no "corte" */
    }

    @media (min-width: 768px) {
      .lift-bg-card {
        min-height: 260px;
      }
    }

    /* Imagen + filtros (B/N + más suave para legibilidad) */
    .lift-bg-card::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: var(--bg);
      background-size: cover;
      background-position: center;
      transform: scale(1.02);
      filter: grayscale(1) saturate(.7) contrast(.95) brightness(1.05);
      opacity: .95;
      z-index: -2;
      transition: filter .4s ease, transform .4s ease;
    }

    /* Hover: recuperar color */
    .lift-bg-card:hover::before {
      filter: grayscale(.3) saturate(1) contrast(1) brightness(1.08);
      transform: scale(1.04);
    }

    /* Overlay editorial (blanco translúcido) */
    .lift-bg-card::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom right, rgba(255, 255, 255, .82), rgba(255, 255, 255, .40));
      z-index: -1;
    }

    /* Variante dark (para tarjetas oscuras con foto; aquí ya no la usamos en la 07, pero te lo dejo) */
    .lift-bg-card.dark::after {
      background: linear-gradient(to bottom right, rgba(15, 19, 34, .72), rgba(15, 19, 34, .25));
    }

    /* Grano sutil */
    .lift-grain {
      position: absolute;
      inset: 0;
      pointer-events: none;
      opacity: .14;
      /* menos agresivo */
      mix-blend-mode: multiply;
      z-index: -1;
      /* por encima de bg pero debajo del contenido */
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='180' height='180'%3E%3Cfilter id='n'%3E%3CfeTurbulance type='fractalNoise' baseFrequency='.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='180' height='180' filter='url(%23n)' opacity='.35'/%3E%3C/svg%3E");
      background-size: 180px 180px;
    }
  </style>
</head>

<body class="bg-blueprint text-gray-800 antialiased" id="main-body">
  <!-- Degradado de fondo global fijo con siluetas redondeadas -->
  <div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden">
    <!-- Siluetas redondeadas degradadas en la parte superior -->
    <div
      class="absolute -top-32 -right-32 w-[500px] h-[500px] rounded-full bg-linear-to-br from-liftRed/8 via-purple-500/5 to-transparent blur-3xl">
    </div>
    <div
      class="absolute -top-48 left-1/4 w-[600px] h-[600px] rounded-full bg-linear-to-bl from-blue-500/6 via-liftRed/4 to-transparent blur-3xl">
    </div>
    <div
      class="absolute top-20 right-1/3 w-[400px] h-[400px] rounded-full bg-linear-to-tr from-liftRed/5 via-pink-500/3 to-transparent blur-2xl">
    </div>

    <!-- Orbes adicionales para profundidad -->
    <div
      class="absolute top-1/3 -left-40 w-96 h-96 rounded-full bg-linear-to-r from-blue-500/4 to-transparent blur-3xl">
    </div>
    <div
      class="absolute bottom-0 right-1/4 w-[500px] h-[500px] rounded-full bg-linear-to-tl from-liftRed/5 via-orange-500/3 to-transparent blur-3xl">
    </div>
  </div>

  <x-header />

  <main class="">
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
      <!-- CONTENEDOR PRINCIPAL -->
      <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10 pt-16 sm:pt-20 lg:-mt-20 pb-12">
        <div class="flex flex-col lg:flex-row items-center gap-10 sm:gap-14 lg:gap-24">

          <!-- BLOQUE DE TEXTO (IZQUIERDA) -->
          <div class="w-full lg:w-6/12 flex flex-col items-start">

            <!-- Título Principal (móvil más compacto, PC igual) -->
            <h1 class="font-black text-liftDark tracking-tight mb-6 sm:mb-8 leading-none">
              <!-- Bloque Servicios -->
              <span class="block text-xl sm:text-2xl md:text-3xl lg:text-4xl text-liftRed mb-3 tracking-wide">
                {{ __('INGENIERÍA, FORMACIÓN Y ASESORAMIENTO TÉCNICO') }}
              </span>
              <!-- Bloque Dominio -->
              <span class="block text-2xl sm:text-4xl md:text-5xl lg:text-6xl mt-1">
                {{ __('EN MOVIMIENTOS') }} <span class="text-liftRed">{{ __('MECÁNICOS DE') }}</span> {{ __('CARGAS') }}
              </span>
            </h1>

            <!-- Subtítulo / Descripción -->
            <div class="relative pl-5 sm:pl-8 mb-8 sm:mb-10 border-l-2 border-gray-100">
              <p class="text-base sm:text-lg text-gray-500 font-light leading-relaxed max-w-lg">
                {{ __('Expertos en el movimiento mecánico de cargas con grúas, elementos de tracción y transportes especiales para la gran industria.') }}
              </p>

              <!-- SVG decorativo de línea técnica -->
              <svg class="absolute -left-[2px] top-0 h-full w-2 overflow-visible" preserveAspectRatio="none">
                <line x1="0" y1="0" x2="0" y2="100" stroke="#ff3333" stroke-width="4" class="draw-line" />
              </svg>
            </div>

            <!-- CTAs (móvil: a ancho completo; PC igual) -->
            <div class="flex flex-col sm:flex-row flex-wrap gap-4 sm:gap-6 items-start sm:items-center w-full">
              <a href="#servicios"
                class="btn-lift-primary relative w-full sm:w-auto px-8 lg:px-10 py-4 lg:py-5 bg-liftDark text-white font-bold rounded-none overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-2xl flex items-center justify-center sm:justify-start gap-3">
                <span class="relative z-10 uppercase tracking-widest text-xs">{{ __('Explorar Servicios') }}</span>
                <i
                  class="fas fa-arrow-right text-liftRed relative z-10 group-hover:translate-x-2 transition-transform"></i>
                <div class="absolute bottom-0 right-0 w-2 h-2 bg-liftRed"></div>
              </a>

              <a href="{{ route('calculadora') }}" class="group inline-flex items-center gap-4 rounded-full px-3 py-2
                        text-xs font-bold uppercase tracking-[0.25em]
                        text-slate-700 hover:text-liftRed transition-colors">
                <span class="relative grid place-items-center w-12 h-12 rounded-full">
                  <span
                    class="absolute inset-0 rounded-full bg-liftRed/20 blur-md opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                  <span
                    class="absolute inset-0 rounded-full ring-1 ring-slate-900/10 group-hover:ring-liftRed/30 transition-colors"></span>

                  <span
                    class="relative grid place-items-center w-12 h-12 rounded-full bg-white/80 backdrop-blur border border-slate-900/10 shadow-[0_12px_30px_rgba(0,0,0,0.08)] group-hover:border-liftRed/30 transition-colors">
                    <i
                      class="fas fa-calculator text-liftRed text-base group-hover:scale-110 transition-transform duration-300"></i>
                  </span>
                </span>

                <span class="relative">
                  {{ __('Calculadora Maniobras') }}
                  <span
                    class="absolute left-0 -bottom-1 h-[2px] w-0 bg-liftRed/70 rounded-full group-hover:w-full transition-all duration-300"></span>
                </span>

                <span
                  class="text-slate-400 group-hover:text-liftRed transition-transform duration-300 group-hover:translate-x-1"
                  aria-hidden="true">→</span>
              </a>
            </div>
          </div>

          <!-- COMPOSICIÓN VISUAL (DERECHA) -->
          <div class="w-full lg:w-6/12 relative">
            <div class="relative w-full max-w-[450px] mx-auto">

              <!-- IMAGEN PRINCIPAL (móvil: altura adaptada; PC: 600px igual) -->
              <div class="relative z-20 mask-industrial shadow-2xl overflow-hidden group">
                <div class="absolute inset-0 bg-liftDark/10 group-hover:bg-transparent transition-colors duration-700">
                </div>
                <img src="{{ $page->getBlockSrc('home_hero_bg', 'img/hero/grua1.jpg') }}" alt="Ingeniería de movimiento mecánico de cargas con grúa"
                  width="800" height="450" fetchpriority="high" loading="eager" decoding="sync"
                  class="w-full h-[280px] sm:h-[360px] lg:h-[450px] object-cover object-[50%_35%] lg:object-center scale-110 group-hover:scale-100 transition-transform duration-[2s] ease-out" />

                <div
                  class="absolute bottom-10 right-10 text-white z-30 text-right pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
              </div>

              <!-- SEGUNDA IMAGEN (desde md en adelante; PC igual, solo ordeno por breakpoints) -->
              <div
                class="absolute md:-bottom-8 md:-left-8 md:w-48 md:h-48 z-30 mask-industrial-reverse shadow-2xl border-3 border-white/60 hidden md:block group/small">
                <img src="{{ $page->getBlockSrc('home_hero_bg_2', 'img/hero/hero2.png') }}" alt="Detalle técnico de maniobra industrial"
                  width="200" height="200" loading="lazy" decoding="async"
                  class="w-full h-full object-cover group-hover/small:scale-110 transition-transform duration-700" />
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>


    <!-- SECCIÓN VIDEO (rendimiento top: poster + carga bajo demanda al click) -->
    <section class="relative isolate py-12 sm:py-16 lg:py-24 overflow-hidden">

      <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:gap-16 lg:grid-cols-12">

          <!-- TEXTO (izquierda) -->
          <div class="lg:col-span-5">

            <h2 class="mt-4 text-3xl sm:text-4xl lg:text-5xl font-bold font-heading tracking-tight text-liftDark ">
              {{ __('Así trabajamos en') }} <span class="text-liftRed tracking-wide">LIFT</span>
            </h2>

            <p class="mt-4 text-base sm:text-lg leading-relaxed text-gray-600 max-w-prose">
              {{ __('Ingeniería aplicada a izados y maniobras: asesoramiento técnico, planificación y formación para ejecutar trabajos con criterio, seguridad y control de cargas.') }}
            </p>
            <div class="mt-8 flex flex-wrap items-center gap-3">


              <!-- Botón secundario: dispara el play del vídeo -->
              <button type="button" class="group inline-flex items-center gap-4 rounded-full px-3 py-2
                       text-xs font-bold uppercase tracking-[0.25em]
                       text-slate-700 hover:text-liftRed transition-colors cursor-pointer"
                data-video-play="#lift-video-shell">
                <span class="relative grid place-items-center w-12 h-12 rounded-full">
                  <span
                    class="absolute inset-0 rounded-full bg-liftRed/20 blur-md opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                  <span
                    class="absolute inset-0 rounded-full ring-1 ring-slate-900/10 group-hover:ring-liftRed/30 transition-colors"></span>

                  <span
                    class="relative grid place-items-center w-12 h-12 rounded-full bg-white/80 backdrop-blur border border-slate-900/10 shadow-[0_12px_30px_rgba(0,0,0,0.08)] group-hover:border-liftRed/30 transition-colors">
                    <svg class="w-4 h-4 ml-[2px] text-liftRed group-hover:scale-110 transition-transform duration-300"
                      viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                      <path d="M8 5v14l11-7z" />
                    </svg>
                  </span>
                </span>

                <span class="relative">
                  {{ __('Ver Video') }}
                  <span
                    class="absolute left-0 -bottom-1 h-[2px] w-0 bg-liftRed/70 rounded-full group-hover:w-full transition-all duration-300"></span>
                </span>

                <span
                  class="text-slate-400 group-hover:text-liftRed transition-transform duration-300 group-hover:translate-x-1"
                  aria-hidden="true">→</span>
              </button>
            </div>
          </div>

          <!-- VIDEO (derecha) -->
          <div class="lg:col-span-7">
            <div class="group relative">
              <!-- Glow al hover -->
              <div aria-hidden="true" class="absolute -inset-3 sm:-inset-5 rounded-[28px] sm:rounded-[36px]
                   bg-linear-to-r from-liftRed/15 via-blue-900/10 to-liftRed/15
                   blur-2xl opacity-0 transition-opacity duration-700 group-hover:opacity-100"></div>

              <!-- Shell: empieza ligero (solo poster). El <video> se inyecta al click -->
              <div id="lift-video-shell"
                class="relative overflow-hidden rounded-2xl sm:rounded-3xl bg-gray-100 ring-1 ring-black/5
                   shadow-[0_14px_40px_rgba(0,0,0,0.10)] transition duration-500 group-hover:shadow-[0_24px_70px_rgba(0,0,0,0.14)]"
                data-video-src="{{ asset('videos/VIDEO_FINAL_ES-CANVIS.mp4') }}"
                data-video-poster="{{ asset('img/posters/video.png') }}">
                <div class="relative aspect-video">
                  <!-- Poster (lo único que carga al inicio) -->
                  <img src="{{ asset('img/posters/video.png') }}" alt="Vídeo LIFT" width="1280" height="720"
                    class=" cursor-pointer absolute inset-0 h-full w-full object-cover transition-transform duration-1400 ease-out group-hover:scale-[1.03]"
                    loading="lazy" decoding="async" />

                  <!-- Overlay -->
                  <div class="absolute inset-0 bg-black/10 transition-colors duration-700 group-hover:bg-black/0">
                  </div>

                  <!-- Botón play -->
                  <button type="button" class=" cursor-pointer absolute inset-0 z-10 grid place-items-center"
                    aria-label="Reproducir vídeo" data-video-activate>
                    <span class="relative grid place-items-center">
                      <span
                        class="absolute inline-flex h-20 w-20 sm:h-24 sm:w-24 rounded-full bg-white/35 opacity-70 animate-composited-ping"></span>
                      <span
                        class="grid place-items-center h-16 w-16 sm:h-20 sm:w-20 rounded-full bg-white/90 backdrop-blur-md shadow-lg transition-transform duration-300 group-hover:scale-110">
                        <i class="fa-solid fa-play text-liftRed text-xl sm:text-2xl translate-x-px"></i>
                      </span>
                    </span>
                  </button>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>


    <section id="servicios" class="relative py-16 sm:py-20 md:py-28 overflow-hidden snap-start select-none">
      <!-- fondo muy sutil (sobrio) -->
      <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-80 -right-24 h-80 w-80 rounded-full bg-liftRed/5 blur-3xl"></div>
        <div class="absolute -bottom-28 -left-28 h-96 w-96 rounded-full bg-black/5 blur-3xl"></div>
      </div>

      <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <!-- Header (más editorial / sobrio) -->
        <div class="max-w-5xl">
          <div class="flex items-center gap-3 mb-5">
            <span class="h-[2px] w-12 bg-liftRed"></span>
            <p class="text-[10px] md:text-xs font-semibold tracking-[0.28em] text-liftRed uppercase">
              {{ __('Capacidades & Soluciones') }}
            </p>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 lg:gap-10 items-end">
            <div class="lg:col-span-7">
              <h2
                class="text-3xl sm:text-4xl md:text-6xl lg:text-7xl font-black tracking-tighter text-liftDark leading-[0.95] uppercase">
                {{ __('Servicios') }}<br />
                <span class="text-liftRed tracking-normal">{{ __('Técnicos') }}</span>
              </h2>
            </div>

            <div class="lg:col-span-5">
              <p class="text-sm md:text-base text-gray-600 leading-relaxed border-l-4 border-liftRed pl-5 sm:pl-6">
                {{ __('Soluciones de ingeniería para maniobras de alta complejidad, con enfoque en seguridad, control y validación técnica en cada fase.') }}
              </p>
            </div>
          </div>
        </div>

        <!-- Bento grid (BENTO TAMBIÉN EN MÓVIL) -->
        <div class="mt-10 sm:mt-12 md:mt-16 grid grid-cols-2 lg:grid-cols-12 gap-3 sm:gap-4 md:gap-6">

          <!-- 01 -->
          <a href="{{ route('ingenieria') }}#ingenieria" class="group col-span-2 lg:col-span-7 cursor-pointer lift-bg-card rounded-3xl border border-black/10
               p-5 sm:p-6 md:p-8
               hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 hover:border-liftRed/30
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-white
               transition"
            style="--bg: url('{{ $page->getBlockSrc('home_bento_01', 'img/welcome_grid/ingenieria.jpg') }}');">
            <span class="lift-grain" aria-hidden="true"></span>

            <div class="relative z-10 flex items-start justify-between gap-5 md:gap-6">
              <div class="min-w-0">
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.22em] text-gray-500 uppercase mb-2 md:mb-3">
                  {{ __('01 · Ingeniería') }}
                </p>
                <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-liftDark tracking-tight">
                  {{ __('Diseño y cálculos de movimientos mecánicos de cargas') }}
                </h3>
                <p class="mt-3 text-sm md:text-base text-gray-600 leading-relaxed max-w-2xl line-clamp-3">
                  {{ __('Elaboramos Lifting Plans completos: viabilidad técnica, selección de medios, secuencias de maniobra y control de riesgos. Cálculo estructural en 3D y estudios de viabilidad geométrica para transportes especiales.') }}
                </p>

                <div class="mt-5 md:mt-6 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.18em] uppercase
                        text-liftRed underline underline-offset-4 decoration-liftRed/40
                        group-hover:decoration-liftRed group-hover:translate-x-0.5 transition">
                  {{ __('Ver más') }}
                  <i
                    class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
                </div>
              </div>

              <div
                class="shrink-0 w-11 h-11 sm:w-12 sm:h-12 md:w-14 md:h-14 rounded-2xl grid place-items-center bg-liftDark text-white shadow-sm">
                <i class="fas fa-drafting-compass text-base sm:text-lg md:text-xl"></i>
              </div>
            </div>
          </a>

          <!-- 02 -->
          <a href="{{ route('ingenieria') }}#supervision" class="group col-span-2 lg:col-span-5 cursor-pointer lift-bg-card rounded-3xl border border-black/10
               p-5 sm:p-6 md:p-8
               hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 hover:border-liftRed/30
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-white
               transition"
            style="--bg: url('{{ $page->getBlockSrc('home_bento_02', 'img/welcome_grid/supervision.jpg') }}');">
            <span class="lift-grain" aria-hidden="true"></span>

            <div class="relative z-10">
              <div class="flex items-center justify-between gap-4">
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.22em] text-gray-500 uppercase">
                  {{ __('02 · Supervisión') }}
                </p>
                <div
                  class="w-10 h-10 md:w-11 md:h-11 rounded-2xl grid place-items-center bg-white/80 border border-black/10 text-liftDark backdrop-blur">
                  <i class="fas fa-hard-hat"></i>
                </div>
              </div>

              <h3 class="mt-3 md:mt-4 text-lg md:text-xl font-bold text-liftDark tracking-tight">
                {{ __('Asesoramiento técnico y supervisión de trabajos en campo') }}
              </h3>
              <p class="mt-2 text-sm md:text-base text-gray-600 leading-relaxed line-clamp-3">
                {{ __('Apoyo técnico in situ en movimientos mecánicos de cargas: aprobación de Lifting Plans, coordinación de recursos, gestión de equipos pesados y asesoramiento durante la ejecución.') }}
              </p>

              <div class="mt-5 md:mt-6 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.18em] uppercase
                      text-liftRed underline underline-offset-4 decoration-liftRed/40
                      group-hover:decoration-liftRed group-hover:translate-x-0.5 transition">
                Ver más
                <i
                  class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
              </div>
            </div>
          </a>

          <!-- 03 -->
          <a href="{{ route('ingenieria') }}#revision" class="group col-span-1 lg:col-span-4 cursor-pointer lift-bg-card rounded-3xl border border-black/10
               p-5 sm:p-6 md:p-7
               hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 hover:border-liftRed/30
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-white
               transition"
            style="--bg: url('{{ $page->getBlockSrc('home_bento_03', 'img/welcome_grid/inspeccion.png') }}');">
            <span class="lift-grain" aria-hidden="true"></span>

            <div class="relative z-10">
              <div class="flex items-center justify-between gap-4">
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.22em] text-gray-500 uppercase">
                  {{ __('03 · Inspección') }}
                </p>
                <div
                  class="w-10 h-10 md:w-11 md:h-11 rounded-2xl grid place-items-center bg-white/80 border border-black/10 text-liftDark backdrop-blur">
                  <i class="fas fa-search"></i>
                </div>
              </div>

              <h3 class="mt-3 md:mt-4 text-lg font-bold text-liftDark tracking-tight">
                {{ __('Revisión y validación de equipos y útiles') }}
              </h3>
              <p class="mt-2 text-sm text-gray-600 leading-relaxed line-clamp-3">
                {{ __('Control, marcado y certificado anual del material de izado según RD 1215/1997. Pruebas de carga a polipastos mediante banco móvil en las instalaciones del cliente.') }}
              </p>

              <div class="mt-5 md:mt-6 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.18em] uppercase
                      text-liftRed underline underline-offset-4 decoration-liftRed/40
                      group-hover:decoration-liftRed group-hover:translate-x-0.5 transition">
                Ver más
                <i
                  class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
              </div>
            </div>
          </a>

          <!-- 04 -->
          <a href="{{ route('ingenieria') }}#realizacion" class="group col-span-1 lg:col-span-4 cursor-pointer lift-bg-card rounded-3xl border border-black/10
               p-5 sm:p-6 md:p-7
               hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 hover:border-liftRed/30
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-white
               transition"
            style="--bg: url('{{ $page->getBlockSrc('home_bento_04', 'img/welcome_grid/maniobras.jpg') }}');">
            <span class="lift-grain" aria-hidden="true"></span>

            <div class="relative z-10">
              <div class="flex items-center justify-between gap-4">
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.22em] text-gray-500 uppercase">
                  {{ __('04 · Maniobras') }}
                </p>
                <div
                  class="w-10 h-10 md:w-11 md:h-11 rounded-2xl grid place-items-center bg-white/80 border border-black/10 text-liftDark backdrop-blur">
                  <i class="fas fa-bullseye"></i>
                </div>
              </div>

              <h3 class="mt-3 md:mt-4 text-lg font-bold text-liftDark tracking-tight">
                {{ __('Maniobras de precisión con tecnología') }}
              </h3>
              <p class="mt-2 text-sm text-gray-600 leading-relaxed line-clamp-3">
                {{ __('Para trabajos de alto riesgo, sustituimos personas por equipos de alta precisión: cámaras y láser para seguir movimientos desde ángulos peligrosos y evitar atrapamientos.') }}
              </p>

              <div class="mt-5 md:mt-6 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.18em] uppercase
                      text-liftRed underline underline-offset-4 decoration-liftRed/40
                      group-hover:decoration-liftRed group-hover:translate-x-0.5 transition">
                Ver más
                <i
                  class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
              </div>
            </div>
          </a>

          <!-- 05 -->
          <a href="{{ route('ingenieria') }}#auditorias" class="group col-span-2 lg:col-span-4 cursor-pointer lift-bg-card rounded-3xl border border-black/10
               p-5 sm:p-6 md:p-7
               hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 hover:border-liftRed/30
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-white
               transition"
            style="--bg: url('{{ $page->getBlockSrc('home_bento_05', 'img/welcome_grid/auditorias.jpg') }}');">
            <span class="lift-grain" aria-hidden="true"></span>

            <div class="relative z-10">
              <div class="flex items-center justify-between gap-4">
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.22em] text-gray-500 uppercase">
                  {{ __('05 · Auditorías') }}
                </p>
                <div
                  class="w-10 h-10 md:w-11 md:h-11 rounded-2xl grid place-items-center bg-white/80 border border-black/10 text-liftDark backdrop-blur">
                  <i class="fas fa-clipboard-check"></i>
                </div>
              </div>

              <h3 class="mt-3 md:mt-4 text-lg font-bold text-liftDark tracking-tight">
                {{ __('Auditorías de ejecución') }}
              </h3>
              <p class="mt-2 text-sm text-gray-600 leading-relaxed line-clamp-3">
                {{ __('Informe detallado sobre seguridad y eficiencia durante la ejecución: procedimientos, elementos utilizados, incidencias y propuestas de mejora preventiva para próximas operaciones.') }}
              </p>

              <div class="mt-5 md:mt-6 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.18em] uppercase
                      text-liftRed underline underline-offset-4 decoration-liftRed/40
                      group-hover:decoration-liftRed group-hover:translate-x-0.5 transition">
                Ver más
                <i
                  class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
              </div>
            </div>
          </a>

          <!-- 06 -->
          <a href="{{ route('diseno-estructuras') }}" class="group col-span-2 lg:col-span-5 cursor-pointer lift-bg-card rounded-3xl border border-black/10
               p-5 sm:p-6 md:p-8
               hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 hover:border-liftRed/30
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-white
               transition" style="--bg: url('{{ $page->getBlockSrc('home_bento_06', 'img/mecanico.jpg') }}');">
            <span class="lift-grain" aria-hidden="true"></span>

            <div class="relative z-10">
              <div class="flex items-center justify-between gap-4">
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.22em] text-gray-500 uppercase">
                  {{ __('06 · Mecánicos') }}
                </p>
                <div
                  class="w-10 h-10 md:w-11 md:h-11 rounded-2xl grid place-items-center bg-white/80 border border-black/10 text-liftDark backdrop-blur">
                  <i class="fas fa-truck-loading"></i>
                </div>
              </div>

              <h3 class="mt-3 md:mt-4 text-lg md:text-xl font-bold text-liftDark tracking-tight">
                {{ __('Estándar de Movimientos Mecánicos de Cargas') }}
              </h3>
              <p class="mt-2 text-sm md:text-base text-gray-600 leading-relaxed line-clamp-3">
                {{ __('Categorización de maniobras, medidas preventivas por tipo, metodología de trabajo y requisitos mínimos de ejecución. Incorporamos los requisitos legales para el cumplimiento de todos los intervinientes.') }}
              </p>

              <div class="mt-5 md:mt-6 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.18em] uppercase
                      text-liftRed underline underline-offset-4 decoration-liftRed/40
                      group-hover:decoration-liftRed group-hover:translate-x-0.5 transition">
                Ver más
                <i
                  class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
              </div>
            </div>
          </a>

          <!-- 07 - Destacado sobrio (oscuro) SIN FOTO -->
          <a href="{{ route('ingenieria') }}#ejecucion" class="group col-span-2 lg:col-span-7 cursor-pointer rounded-3xl border border-white/10 text-white
               p-5 sm:p-6 md:p-8
               bg-gradient-to-br from-[#0f1322] via-[#121a33] to-[#0f1322]
               hover:-translate-y-0.5 hover:shadow-2xl hover:shadow-black/20 hover:border-liftRed/30
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-[#0f1322]
               transition relative overflow-hidden">
            <!-- detalle sutil -->
            <div aria-hidden="true" class="absolute -top-28 -right-28 h-80 w-80 rounded-full bg-liftRed/12 blur-3xl">
            </div>
            <span class="lift-grain" aria-hidden="true"></span>

            <div class="relative z-10 flex items-start justify-between gap-6">
              <div class="min-w-0">
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.22em] text-white/55 uppercase mb-2 md:mb-3">
                  {{ __('07 · Equipo') }}
                </p>
                <h3 class="text-lg sm:text-xl md:text-2xl font-bold tracking-tight">
                  {{ __('Personal de ejecución de maniobras') }}
                </h3>
                <p class="mt-3 text-sm md:text-base text-white/70 leading-relaxed max-w-2xl line-clamp-3">
                  {{ __('Jefes de maniobra, señalistas, eslingadores y controladores de tráfico de vehículos pesados. Cada rol con la formación, experiencia y certificaciones necesarias para garantizar la seguridad en cada operación.') }}
                </p>

                <div class="mt-5 md:mt-6 inline-flex items-center gap-2 text-xs font-semibold tracking-[0.18em] uppercase
                        text-liftRed underline underline-offset-4 decoration-liftRed/40
                        group-hover:decoration-liftRed group-hover:translate-x-0.5 transition">
                  Ver más
                  <i
                    class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
                </div>
              </div>

              <div
                class="shrink-0 w-11 h-11 sm:w-12 sm:h-12 md:w-14 md:h-14 rounded-2xl grid place-items-center bg-liftRed text-white">
                <i class="fas fa-users text-base sm:text-lg md:text-xl"></i>
              </div>
            </div>
          </a>

        </div>

        <!-- CTA (sobria) -->
        <div class="mt-10 sm:mt-12 md:mt-16 flex justify-center">
          <a href="{{ route('ingenieria') }}"
            class=" bg-white/50 backdrop-blur-sm group inline-flex items-center justify-center gap-3 rounded-full border border-black/15 px-8 sm:px-10 py-4
               text-xs font-semibold tracking-[0.22em] uppercase text-liftDark
               hover:border-liftRed/30 hover:text-liftRed transition-colors duration-300
               focus:outline-none focus-visible:ring-2 focus-visible:ring-liftRed/40 focus-visible:ring-offset-2 focus-visible:ring-offset-white">
            {{ __('Más información') }}
            <i class="fas fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1"></i>
          </a>
        </div>
      </div>
    </section>





    <!-- SECCION Soluciones -->
    <section
      class="w-full bg-liftDark relative flex flex-col items-center justify-center md:min-h-screen overflow-hidden py-12 pb-20 md:py-12">

      <!-- ENCABEZADO -->
      <div
        class="w-full px-6 py-4 text-center relative z-20 shrink-0 bg-[#0f1322]/80 backdrop-blur-sm md:bg-transparent">
        <h2 class="text-xl md:text-3xl font-heading font-bold text-white uppercase tracking-widest mb-1">
          {{ __('Nuestras Soluciones') }}
        </h2>
        <div class="mt-2 text-[10px] text-gray-300 uppercase tracking-widest animate-pulse">
          <span class="md:hidden"><i class="fas fa-hand-pointer text-liftRed mr-1"></i>
            {{ __('Toca un punto para leer la información.') }}</span>
          <span class="hidden md:inline"><i class="fas fa-mouse-pointer text-liftRed mr-1"></i>
            {{ __('Pasa el ratón sobre un punto para ver la tarjeta.') }}</span>
        </div>
      </div>

      <div class="w-full flex justify-center items-center h-full p-2 md:p-0">
        <div
          class="relative w-full md:w-fit md:h-[80vh] aspect-video md:aspect-auto shadow-2xl shadow-liftRed/10 rounded-2xl bg-black border border-white/10 group">
          <!-- ZONAS CALIENTES (HOTSPOTS) -->
          <div role="button" tabindex="0" class="peer/grua hotspot top-[20%] left-[16%] w-[12%] h-[52%]"
            aria-label="Lifting Plan">
            <span class="relative flex size-3 top-[70%] left-[19%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500"></span>
            </span>
          </div>
          <div role="button" tabindex="0" class="peer/grua hotspot top-[15%] left-[27%] w-[12%] h-[52%]"
            aria-label="Operativa de grúa"></div>

          <div role="button" tabindex="0" class="peer/gruaDerecha hotspot top-[20%] right-[30%] w-[12%] h-[52%]"
            aria-label="Estudios técnicos">
            <span class="relative flex size-3 top-[90%] left-[65%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500"></span>
            </span>
          </div>
          <div role="button" tabindex="0"
            class="peer/gruaDerecha hotspot top-[-10%] right-[37%] w-[15%] h-[52%] rotate-[300deg]">
          </div>
          <div role="button" tabindex="0"
            class="peer/gruaDerecha hotspot top-[50%] right-[30%] w-[10%] h-[28%] rotate-[60deg]">
          </div>

          <div role="button" tabindex="0" class="peer/grupo hotspot top-[79%] left-[26%] w-[8%] h-[12%]"
            aria-label="Formación">
            <span class="relative flex size-3 top-[90%] left-[65%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500"></span>
            </span>
          </div>

          <div role="button" tabindex="0" class="peer/personas hotspot top-[70%] left-[29%] w-[7%] h-[9%]"
            aria-label="Supervisión">
            <span class="relative flex size-3 top-[80%] left-[65%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500"></span>
            </span>
          </div>

          <div role="button" tabindex="0"
            class="peer/camion hotspot top-[75%] right-[21%] w-[30%] h-[15%] -rotate-[30deg]" aria-label="Transportes">
            <span class="relative flex size-3 top-[90%] left-[65%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500 opacity-50"></span>
            </span>
          </div>

          <div role="button" tabindex="0" class="peer/andamios hotspot top-[30%] right-[12%] w-[12%] h-[40%]"
            aria-label="Andamios">
            <span class="relative flex size-3 top-[65%] left-[80%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500 opacity-50"></span>
            </span>
          </div>

          <div role="button" tabindex="0" class="peer/revision hotspot top-[35%] left-[37%] w-[8%] h-[36%]"
            aria-label="Revisión">
            <span class="relative flex size-3 top-[90%] left-[65%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500 opacity-50"></span>
            </span>
          </div>

          <div role="button" tabindex="0" class="peer/elevador hotspot top-[35%] right-[43%] w-[11%] h-[30%]"
            aria-label="Operadores">
            <span class="relative flex size-3 top-[20%] left-[55%]">
              <span
                class="absolute inline-flex h-full w-full animate-composited-ping rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex size-3 rounded-full bg-sky-500 opacity-50"></span>
            </span>
          </div>

          <!-- POP-UPS -->

          <!-- 1. GRÚA -->
          <div class="target-grua absolute top-[15%] left-[14%] pop-img w-[28%]">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_1_image', 'img/slider/SLIDER-HOME-maniobra-grua-1.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-maniobra-grua-1.png') }}"
              alt="Lifting Plan – maniobra con grúa" class="order-1" loading="lazy" decoding="async" />
            <p class="glass-p order-2">
              {{ __('Auditorías de ejecución, verificación de procedimientos y elaboración de lifting plans con controles y recomendaciones para operaciones seguras con grúas.') }}
            </p>
          </div>

          <!-- 2. GRÚA DERECHA -->
          <div class="target-gruaDerecha absolute top-[2.5%] right-[22%] pop-img w-[40%]">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_2_image', 'img/slider/SLIDER-HOME-estudios-maniobras-grua-3-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-estudios-maniobras-grua-3-2.png') }}"
              alt="Estudios técnicos de maniobras con grúa" class="order-1" loading="lazy" decoding="async" />
            <p class="glass-p order-2">
              {{ __('Estudios técnicos completos: cálculo estructural, selección de elementos de elevación y planos de maniobra para cargas complejas.') }}
            </p>
          </div>

          <!-- 3. GRUPO -->
          <div class="target-grupo absolute bottom-[-2%] left-[20%] pop-img w-[20%]">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_3_image', 'img/slider/SLIDER-HOME-formacion-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-formacion-2.png') }}"
              alt="Formación técnica de personal" class="order-1" loading="lazy" decoding="async" />
            <p class="glass-p order-2">
              {{ __('Programas de formación personalizados para supervisores y equipos: teoría, prácticas dirigidas, protocolos de seguridad y certificación final para garantizar competencia operativa.') }}
            </p>
          </div>

          <!-- 4. PERSONAS -->
          <div class="target-personas absolute bottom-[16%] left-[26%] pop-img w-[11%]">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_4_image', 'img/slider/SLIDER-HOME-supervision-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-supervision-2.png') }}"
              alt="Supervisión y coordinación de maniobras" class="order-1" loading="lazy" decoding="async" />
            <p class="glass-p order-2">
              {{ __('Servicios de supervisión y coordinación in situ: planificación de maniobras, gestión del personal y asesoramiento técnico durante la ejecución para minimizar riesgos.') }}
            </p>
          </div>

          <!-- 5. CAMIÓN -->
          <div class="target-camion absolute top-[69%] right-[24%] pop-img w-[30%] !flex flex-col">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>

            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_5_image', 'img/slider/SLIDER-HOME-camio-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-camio-2.png') }}"
              alt="Transporte especial de cargas" class="w-full h-auto block order-2 md:order-1" loading="lazy" decoding="async" />

            <p class="glass-p !absolute top-0 right-[-10%] w-[100%] z-50 md:static md:w-auto md:order-2 md:top-auto md:right-auto md:z-auto"
              style="margin-top: -30px">
              {{ __('Análisis de viabilidad para transportes especiales: evaluación de cargas, diseño de estructuras de soporte recomendaciones operativas.') }}
            </p>
          </div>

          <!-- 6. ANDAMIOS -->
          <div class="target-andamios absolute top-[30%] right-[8%] pop-img w-[20%]">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_6_image', 'img/slider/SLIDER-HOME-estructuras-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-estructuras-2.png') }}"
              alt="Estructuras auxiliares y andamios" class="order-1" loading="lazy" decoding="async" />
            <p class="glass-p order-2">
              {{ __('Diseño y cálculo de estructuras auxiliares y andamios para maniobras de volteo o extracción; supervisión de montaje y controles de seguridad.') }}
            </p>
          </div>

          <!-- 7. REVISIÓN -->
          <div class="target-revision absolute top-[33%] left-[36%] pop-img w-[13%]">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_7_image', 'img/slider/SLIDER-HOME-REVISION-MATERIAL-IZADO.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-REVISION-MATERIAL-IZADO.png') }}"
              alt="Revisión de material de izado" class="order-1" loading="lazy" decoding="async" />
            <p class="glass-p order-2">
              {{ __('Inspección y revisión periódica del material de izado conforme al RD1215/1997, con informe de conformidad y plan de mantenimiento preventivo.') }}
            </p>
          </div>

          <!-- 8. ELEVADOR -->
          <div class="target-elevador absolute top-[35%] right-[40%] pop-img w-[18%]">
            <button class="close-btn" aria-label="Cerrar tarjeta" onclick="document.activeElement.blur()">
              <i class="fas fa-times" aria-hidden="true"></i>
            </button>
            <img
              src="{{ optional($page ?? null)->getBlockSrc('hotspot_8_image', 'img/slider/SLIDER-HOME-formaciones-2.png') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-formaciones-2.png') }}"
              alt="Formación de operadores de maquinaria" class="order-1" loading="lazy" decoding="async" />
            <p class="glass-p order-2">
              {{ __('Formación práctica y evaluada para operadores de PEMP, carretillas, puente grúa y camión grúa; incluye prácticas reales, checklist y certificación.') }}
            </p>
          </div>

          <img
            src="{{ optional($page ?? null)->getBlockSrc('home_map_image', 'img/slider/SLIDER-HOME-2.jpg') ?? \App\Models\Page::resolveBlockSrc('img/slider/SLIDER-HOME-2.jpg') }}"
            class="h-full w-full object-cover md:object-contain rounded-2xl opacity-90 block"
            alt="Soluciones de ingeniería para maniobras industriales" loading="lazy" decoding="async" />
        </div>
      </div>
    </section>

    <x-clientes />

    <div class="fixed bottom-0 left-0 w-full h-20 bg-linear-to-b from-transparent to-liftRed/15 z-50 back"
      aria-hidden="true"></div>

  </main>

  <x-footer />
  <a href="https://wa.me/34608824788" target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp"
    class="fixed bottom-8 right-8 bg-[#25D366] w-14 h-14 rounded-full flex items-center justify-center text-white text-2xl shadow-xl shadow-green-500/30 z-[200] hover:scale-110 hover:rotate-12 transition-all">
    <i class="fab fa-whatsapp"></i>
  </a>

  <!-- ========== SCRIPTS ========== -->
  <script>
    // ====================
    // VIDEO LAZY LOAD
    // ====================
    (function () {
      const activate = (shell) => {
        if (!shell || shell.dataset.loaded === "1") return;

        const src = shell.getAttribute("data-video-src");
        const poster = shell.getAttribute("data-video-poster");

        shell.dataset.loaded = "1";
        shell.innerHTML = `
            <div class="relative aspect-video">
              <video
                class="absolute inset-0 h-full w-full object-cover"
                controls
                playsinline
                preload="none"
                poster="${poster}"
              >
                <source src="${src}" type="video/mp4" />
                Tu navegador no soporta vídeo HTML5.
              </video>
            </div>
          `;

        const video = shell.querySelector("video");
        if (video) {
          const p = video.play();
          if (p && typeof p.catch === "function") p.catch(() => { });
        }
      };

      // Click en el overlay del vídeo
      document.addEventListener("click", (e) => {
        const btn = e.target.closest("[data-video-activate]");
        if (!btn) return;
        const shell = btn.closest("[data-video-src]");
        activate(shell);
      });

      // Botón "Ver vídeo" del bloque texto
      document.addEventListener("click", (e) => {
        const trigger = e.target.closest("[data-video-play]");
        if (!trigger) return;
        const sel = trigger.getAttribute("data-video-play");
        const shell = document.querySelector(sel);
        activate(shell);
        shell?.scrollIntoView({ behavior: "smooth", block: "center" });
      });
    })();
  </script>

</body>

</html>
