<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('FORMACIÓN – LIFT') }}</title>

  {{-- SEO Meta --}}
  <meta name="description"
    content="{{ __('Formación técnica especializada en movimientos mecánicos de cargas. Programas dinámicos y participativos con más de 20 años de experiencia en la industria.') }}" />
  <meta name="author" content="LIFT Ingeniería S.L." />
  <meta name="theme-color" content="#ff3333" />
  <link rel="canonical" href="{{ url()->current() }}" />

  {{-- Open Graph --}}
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
  <meta property="og:site_name" content="LIFT Ingeniería" />
  <meta property="og:title" content="{{ __('FORMACIÓN – LIFT') }}" />
  <meta property="og:description"
    content="{{ __('Formación técnica especializada en movimientos mecánicos de cargas para la gran industria.') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ __('FORMACIÓN – LIFT') }}" />
  <meta name="twitter:description"
    content="{{ __('Formación técnica especializada en movimientos mecánicos de cargas para la gran industria.') }}" />
  <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Favicon --}}
  @include('components.favicons')

  <!-- Tailwind (si ya lo tienes en tu build, elimina este script) -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root {
      --liftRed: #ff3333;
      --liftDark: #0b1020;
      --liftInk: #0f172a;
    }

    .font-heading {
      font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial,
        sans-serif;
    }

    .font-body {
      font-family: "Roboto", system-ui, -apple-system, Segoe UI, Roboto, Arial,
        sans-serif;
    }

    /* ---- Motion safety ---- */
    @media (prefers-reduced-motion: reduce) {
      * {
        animation: none !important;
        transition: none !important;
        scroll-behavior: auto !important;
      }
    }

    /* ---- Subtle top progress bar ---- */
    .scrollbar {
      position: fixed;
      left: 0;
      top: 0;
      height: 3px;
      width: 0%;
      z-index: 60;
      background: linear-gradient(90deg, #ff3333, #ff6b6b, #ff3333);
      box-shadow: 0 10px 28px rgba(255, 51, 51, 0.25);
      transform-origin: left;
    }

    /* ---- Animated gradient drift ---- */
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

    /* ---- Glow pulse ---- */
    @keyframes glowPulse {
      0% {
        transform: translate3d(0, 0, 0) scale(1);
        opacity: .55;
      }

      50% {
        transform: translate3d(0, -8px, 0) scale(1.03);
        opacity: .85;
      }

      100% {
        transform: translate3d(0, 0, 0) scale(1);
        opacity: .55;
      }
    }

    /* ---- Marquee ---- */
    @keyframes marquee {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    /* ---- Shine sweep (hover/focus only) ---- */
    @keyframes shine {
      0% {
        transform: translateX(-130%) skewX(-18deg);
        opacity: 0;
      }

      28% {
        opacity: .55;
      }

      100% {
        transform: translateX(230%) skewX(-18deg);
        opacity: 0;
      }
    }

    /* ---- Reveal on scroll ---- */
    .reveal {
      opacity: 0;
      transform: translateY(16px);
      filter: blur(10px);
    }

    .reveal.is-in {
      opacity: 1;
      transform: translateY(0);
      filter: blur(0);
      transition:
        opacity .85s cubic-bezier(.2, .8, .2, 1),
        transform .95s cubic-bezier(.2, .8, .2, 1),
        filter .95s cubic-bezier(.2, .8, .2, 1);
    }

    .reveal.is-in[data-delay="1"] {
      transition-delay: 80ms;
    }

    .reveal.is-in[data-delay="2"] {
      transition-delay: 140ms;
    }

    .reveal.is-in[data-delay="3"] {
      transition-delay: 210ms;
    }

    .reveal.is-in[data-delay="4"] {
      transition-delay: 280ms;
    }

    /* ---- Gradient border wrapper ---- */
    .g-border {
      position: relative;
    }

    .g-border::before {
      content: "";
      position: absolute;
      inset: -1px;
      background: linear-gradient(120deg,
          rgba(255, 51, 51, .58),
          rgba(15, 23, 42, .28),
          rgba(255, 51, 51, .30));
      border-radius: 2rem;
      z-index: -1;
      filter: blur(.15px);
    }

    /* ---- Noise overlay ---- */
    .noise::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='140' height='140' filter='url(%23n)' opacity='.22'/%3E%3C/svg%3E");
      mix-blend-mode: overlay;
      opacity: .10;
      pointer-events: none;
    }

    /* ---- Buttons: shine + micro-press + focus ---- */
    .btn-shine {
      position: relative;
      overflow: hidden;
      isolation: isolate;
      transform: translateZ(0);
    }

    .btn-shine::after {
      content: "";
      position: absolute;
      top: -25%;
      left: 0;
      width: 46%;
      height: 150%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .55), transparent);
      transform: translateX(-130%) skewX(-18deg);
      opacity: 0;
      pointer-events: none;
    }

    .btn-shine:hover::after,
    .btn-shine:focus-visible::after {
      animation: shine 1.05s ease;
    }

    .btn-press:active {
      transform: translateY(1px) scale(.99);
    }

    .focus-ring:focus-visible {
      outline: none;
      box-shadow:
        0 0 0 3px rgba(255, 51, 51, .22),
        0 0 0 1px rgba(255, 51, 51, .35);
    }

    /* ---- Magnetic hover (subtle) ---- */
    .mag {
      will-change: transform;
    }

    /* ---- Card tilt (mouse only; JS) ---- */
    .tilt {
      transform-style: preserve-3d;
      will-change: transform;
    }

    .tilt .tilt-pop {
      transform: translateZ(18px);
    }

    /* ---- Soft glass ---- */
    .glass {
      background: rgba(255, 255, 255, .72);
      -webkit-backdrop-filter: blur(14px);
      backdrop-filter: blur(14px);
    }

    /* ---- Mobile menu animation ---- */
    .menu-panel {
      transform: translateY(-6px);
      opacity: 0;
      pointer-events: none;
      transition: transform .22s ease, opacity .22s ease;
    }

    .menu-panel[data-open="true"] {
      transform: translateY(0);
      opacity: 1;
      pointer-events: auto;
    }

    /* ---- Gradient text ---- */
    .grad-text {
      background-image: linear-gradient(90deg, #ff3333, #ff6b6b, #ff3333);
      background-size: 200% 200%;
      animation: drift 6s ease infinite;
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    /* ---- Better anchor offset for sticky header ---- */
    [id] {
      scroll-margin-top: 88px;
    }

    /* =========================
       MOBILE PATCH (<= 640px)
       ========================= */

    /* Evita scroll horizontal por blur/blobs */
    html,
    body {
      overflow-x: hidden;
    }

    /* iOS: alturas más estables (ya usas svh/dvh, pero esto ayuda) */
    @@supports (-webkit-touch-callout: none) {
      .ios-h-fix {
        min-height: 100svh !important;
      }
    }

    /* Botones y targets táctiles */
    a,
    button {
      -webkit-tap-highlight-color: transparent;
    }

    .tap-44 {
      min-height: 44px;
    }

    /* HERO: compactar un poco en móvil */
    @media (max-width: 640px) {

      /* Reduce el "hueco" vertical */
      .hero-pad {
        padding-top: 88px !important;
        /* deja espacio al header sticky */
        padding-bottom: 28px !important;
      }

      /* Título más controlado (evita saltos feos) */
      .hero-title {
        font-size: 2.15rem !important;
        line-height: 1.05 !important;
        letter-spacing: -0.02em !important;
      }

      /* Texto */
      .hero-lead {
        font-size: 1rem !important;
        line-height: 1.7 !important;
      }

      /* CTAs: full width en móvil */
      .hero-ctas {
        flex-direction: column !important;
      }

      .hero-ctas>a {
        width: 100% !important;
        justify-content: center !important;
      }

      /* Imagen hero: altura un poco menor para no "comerse" la pantalla */
      .hero-square {
        height: clamp(280px, 42vh, 440px) !important;
      }

      /* Ajusta paddings del contenido sobre la imagen */
      .hero-img-inset {
        left: 14px !important;
        right: 14px !important;
        bottom: 14px !important;
      }

      /* Chips de features: más compactas */
      .hero-chips {
        gap: 10px !important;
        font-size: 12px !important;
      }
    }

    /* =========================
       TABLE -> CARDS (mobile)
       ========================= */

    /* En móvil convertimos la tabla en cards */
    @media (max-width: 640px) {
      .docs-table-wrap {
        overflow: visible !important;
      }

      table.docs-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
      }

      table.docs-table thead {
        display: none;
      }

      table.docs-table tbody tr {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        border: 1px solid rgba(148, 163, 184, .25);
        border-radius: 20px;
        overflow: hidden;
        background: rgba(255, 255, 255, .9);
        box-shadow: 0 8px 24px rgba(15, 23, 42, .04);
        margin-bottom: 16px;
        padding: 20px;
        gap: 16px;
      }

      table.docs-table tbody td {
        display: block;
        padding: 0 !important;
        border: none !important;
      }

      /* Botón descargar full width */
      .doc-download {
        width: 100% !important;
        justify-content: center !important;
        border-radius: 16px !important;
        padding: 12px 14px !important;
      }

      /* Alineación: ya no hace falta "text-right" */
      .doc-right {
        text-align: left !important;
      }
    }
  </style>
</head>

<body class="bg-white text-slate-900 antialiased font-body selection:bg-red-100 selection:text-slate-900">
  <!-- top progress -->
  <div class="scrollbar" id="scrollbar"></div>

  <!-- HEADER -->
  <x-header />

  <main>
    <!-- HERO -->
    <section class="relative overflow-hidden min-h-[100svh] ios-h-fix">
      <!-- BACKDROP -->
      <div class="absolute inset-0 noise pointer-events-none">
        <!-- blobs -->
        <div
          class="absolute -top-40 -left-40 w-[680px] h-[680px] rounded-full blur-[130px] animate-[glow_7s_ease-in-out_infinite]"
          style="background: radial-gradient(circle at 30% 30%, rgba(255,51,51,.34), transparent 62%);"
          data-parallax="0.22"></div>
        <div
          class="absolute -bottom-44 -right-44 w-[740px] h-[740px] rounded-full blur-[150px] animate-[glow_9s_ease-in-out_infinite]"
          style="background: radial-gradient(circle at 70% 70%, rgba(15,23,42,.22), transparent 62%);"
          data-parallax="0.16"></div>

        <!-- dot grid -->
        <div class="absolute inset-0 opacity-[0.12]"
          style="background-image: radial-gradient(rgba(15,23,42,.45) 0.75px, transparent 0.75px); background-size: 26px 26px;">
        </div>
        <div class="absolute inset-0 bg-linear-to-b from-white via-white/70 to-transparent"></div>

        <!-- soft vignette -->
        <div
          class="absolute inset-0 bg-[radial-gradient(1200px_520px_at_50%_30%,rgba(255,255,255,.65),transparent_60%)]">
        </div>
      </div>

      <!-- CONTENT (centrado vertical + sin huecos raros en pantallas altas) -->
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 min-h-[100svh] ios-h-fix flex items-center">
        <div class="w-full py-12 sm:py-14 lg:py-16 hero-pad">
          <div class="grid lg:grid-cols-12 gap-10 items-center">
            <!-- LEFT -->
            <div class="lg:col-span-6">
              <div class="reveal inline-flex items-center gap-3 mb-6" data-delay="1">
                <span class="h-px w-10 bg-(--liftRed)"></span>
                <span class="font-heading text-[10px] tracking-[0.35em] uppercase font-extrabold text-(--liftRed)">
                  Formación Técnica Especializada
                </span>
              </div>

              <h1
                class="reveal font-heading text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-[1.02] hero-title uppercase"
                data-delay="2">
                {{ $page->getBlock('header_title_1', 'FORMACIONES TÉCNICAS') }}
                <span class="block">{{ $page->getBlock('header_title_2', 'EN MOVIMIENTOS') }}</span>
                <span class="block grad-text">{{ $page->getBlock('header_title_3', 'MECÁNICOS DE CARGAS') }}</span>
              </h1>

              <p class="reveal mt-5 text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl hero-lead"
                data-delay="3">
                {{ $page->getBlock('header_subtitle_1', 'Programas dinámicos y participativos para equipos de trabajo en') }}
                <span
                  class="font-semibold text-slate-900">{{ $page->getBlock('header_subtitle_bold', 'movimientos mecánicos de cargas') }}</span>{{ $page->getBlock('header_subtitle_2', ', con foco en ejecución segura, criterios técnicos y reducción de incidentes.') }}
              </p>

              <div class="reveal mt-8 flex flex-col sm:flex-row gap-3 hero-ctas" data-delay="4">
                <a href="#descargas"
                  class="group btn-press focus-ring inline-flex items-center justify-center px-7 py-3.5 rounded-xl text-white font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase shadow-lg shadow-red-500/25 hover:shadow-red-500/35 hover:-translate-y-0.5 transition-all tap-44"
                  style="background: linear-gradient(90deg, #ff3333, #ff5151);" data-mag="8">
                  <span class="relative">
                    Ver fichas
                    <span
                      class="absolute -bottom-1 left-0 right-0 h-px bg-white/40 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                  </span>
                </a>

                <a href="https://lift-es.com/contacto/"
                  class="group btn-press focus-ring inline-flex items-center justify-center px-7 py-3.5 rounded-xl bg-white/80 backdrop-blur border border-slate-200 text-slate-900 font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase hover:border-slate-300 hover:bg-white transition-all tap-44">
                  Solicitar información

                </a>
              </div>

              <div
                class="reveal mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 text-xs font-semibold text-slate-500 hero-chips"
                data-delay="3">
                <div class="inline-flex items-center gap-2">
                  <span class="h-2 w-2 rounded-full bg-(--liftRed) shadow-[0_0_0_3px_rgba(255,51,51,.12)]"></span>
                  Protocolos PRL
                </div>
                <div class="inline-flex items-center gap-2">
                  <span class="h-2 w-2 rounded-full bg-slate-900 shadow-[0_0_0_3px_rgba(15,23,42,.10)]"></span>
                  Checklists operativos
                </div>
                <div class="inline-flex items-center gap-2">
                  <span class="h-2 w-2 rounded-full bg-slate-400 shadow-[0_0_0_3px_rgba(148,163,184,.18)]"></span>
                  Formación en campo
                </div>
              </div>
            </div>

            <!-- RIGHT -->
            <div class="lg:col-span-6">
              <div class="relative">
                <!-- outer glow -->
                <div class="absolute -inset-4 rounded-[2.2rem] blur-2xl"
                  style="background: linear-gradient(90deg, rgba(255,51,51,.22), rgba(15,23,42,.10), rgba(255,51,51,.18));"
                  data-parallax="0.12"></div>

                <div
                  class="reveal g-border group relative rounded-4xl overflow-hidden bg-slate-100 shadow-2xl shadow-slate-900/10 transition-shadow duration-500 ease-out hover:shadow-slate-900/20"
                  data-delay="2">
                  <!-- ✅ CUADRADO + crece más en pantallas grandes -->
                  <div class="relative w-full hero-square"
                    style="aspect-ratio: 1 / 1; height: clamp(340px, 52vh, 640px);">
                    <img src="{{ $page->getBlockSrc('hero_image', 'uploads/2022/06/20220425_134917-2.jpg') }}"
                      alt="Formaciones técnicas"
                      class="absolute inset-0 w-full h-full object-cover will-change-transform transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)] group-hover:scale-[1.04]"
                      loading="lazy" decoding="async" />

                    <!-- overlay fijo -->
                    <div class="absolute inset-0 bg-linear-to-t from-slate-950/60 via-slate-950/12 to-transparent">
                    </div>

                    <!-- bottom content -->
                    <div class="absolute left-6 bottom-6 right-6 hero-img-inset">
                      <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                        <div>
                          <div
                            class="inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-4 py-2 text-white backdrop-blur">
                            <span class="h-2 w-2 rounded-full bg-(--liftRed)"></span>
                            <span class="font-heading font-extrabold text-[10px] tracking-[0.28em] uppercase">
                              Formación en campo
                            </span>
                          </div>
                          <p class="mt-3 text-white/90 font-semibold leading-snug max-w-sm">
                            Seguridad, técnica y método para maniobras críticas.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /hero-square -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- CSS mínimo (glow + ajuste de tamaño en pantallas grandes + accesibilidad) -->
      <style>
        @keyframes glow {

          0%,
          100% {
            transform: translate3d(0, 0, 0) scale(1);
            opacity: .9;
          }

          50% {
            transform: translate3d(0, -12px, 0) scale(1.03);
            opacity: 1;
          }
        }

        /* ✅ En pantallas algo más grandes, que el cuadrado crezca más */
        @media (min-width: 1024px) {
          .hero-square {
            height: clamp(420px, 60vh, 760px) !important;
          }
        }

        @media (min-width: 1280px) {
          .hero-square {
            height: clamp(480px, 62vh, 820px) !important;
          }
        }

        @media (prefers-reduced-motion: reduce) {
          [data-parallax] {
            transform: none !important;
          }

          .animate-\[glow_7s_ease-in-out_infinite\],
          .animate-\[glow_9s_ease-in-out_infinite\] {
            animation: none !important;
          }
        }
      </style>
    </section>

    <!-- BENEFICIOS -->
    <section id="beneficios" class="relative py-16 sm:py-20 bg-white overflow-hidden">
      <!-- decor sutil -->
      <!-- decor sutil: Flow (Hero BR -> This TR / This BL -> Descargas TL) -->
      <div class="pointer-events-none absolute inset-0">
        <!-- Top Right: Blue (follows Hero) -->
        <div
          class="absolute -top-40 -right-40 h-[600px] w-[600px] rounded-full blur-[100px] animate-[glow_8s_ease-in-out_infinite]"
          style="background: radial-gradient(circle at 70% 30%, rgba(15,23,42,.14), transparent 62%);"
          data-parallax="0.10"></div>
        <!-- Bottom Left: Red (leads to Descargas) -->
        <div
          class="absolute -bottom-40 -left-40 h-[600px] w-[600px] rounded-full blur-[100px] animate-[glow_10s_ease-in-out_infinite]"
          style="background: radial-gradient(circle at 30% 70%, rgba(255,51,51,.14), transparent 62%);"
          data-parallax="0.10"></div>
      </div>

      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-10 items-end">
          <!-- heading -->
          <div class="lg:col-span-7 max-w-3xl">
            <div class="reveal inline-flex items-center gap-3" data-delay="1">
              <span class="h-[1px] w-10 bg-[color:var(--liftRed)]"></span>
              <span
                class="font-heading text-[10px] tracking-[0.35em] uppercase font-extrabold text-[color:var(--liftRed)]">
                Qué incluye
              </span>
            </div>

            <h2
              class="reveal mt-4 font-heading text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-[1.05]"
              data-delay="2">
              Una formación pensada para
              <span class="relative inline-block">
                <span class="relative z-10 text-[color:var(--liftRed)]">operar mejor</span>
                <span class="absolute -bottom-1 left-0 right-0 h-2 rounded-full bg-[color:var(--liftRed)]/15"></span>
              </span>
            </h2>

            <p class="reveal mt-4 text-slate-600 leading-relaxed text-base sm:text-lg" data-delay="3">
              Técnica + práctica + seguridad + acreditación. Con ritmo y enfoque en el trabajo real.
            </p>
          </div>
        </div>

        <div class="mt-10 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- CARD 1 -->
          <div class="reveal h-full" data-delay="1">
            <article
              class="group relative h-full rounded-3xl border border-slate-200/70 bg-white overflow-hidden shadow-sm transition-all duration-500 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-1 hover:shadow-2xl hover:shadow-slate-900/10">
              <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                <img
                  src="{{ $page->getBlockSrc('card_1_image', 'https://lift-es.com/wp-content/uploads/2022/03/1-Copia%20de%20FORMACIÓN%203.jpg') }}"
                  alt="Formadores"
                  class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)] group-hover:scale-[1.06]"
                  loading="lazy" decoding="async" />
                <div
                  class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-slate-950/10 to-transparent opacity-90">
                </div>

                <div
                  class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-3 py-1.5 text-white backdrop-blur">
                  <span class="h-2 w-2 rounded-full bg-[color:var(--liftRed)]"></span>
                  <span
                    class="font-heading font-extrabold text-[10px] tracking-[0.28em] uppercase">{{ $page->getBlock('card_1_badge', 'Experiencia') }}</span>
                </div>
              </div>

              <div class="p-6">
                <h3 class="font-heading font-extrabold text-lg">{{ $page->getBlock('card_1_title', 'Formadores') }}</h3>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                  {{ $page->getBlock('card_1_description', 'Más de 20 años de experiencia y dominio técnico en maniobras.') }}
                </p>

                <div class="mt-4 flex items-center justify-between">
                  <div
                    class="inline-flex flex-wrap items-center gap-2 text-[10px] sm:text-[11px] font-heading font-extrabold tracking-wider sm:tracking-[0.2em] uppercase text-slate-500 leading-tight">
                    <span class="h-1.5 w-1.5 rounded-full shrink-0 bg-[color:var(--liftRed)]"></span>
                    {{ $page->getBlock('card_1_bottom', 'Experiencia real') }}
                  </div>

                </div>
              </div>

              <div
                class="absolute inset-x-0 bottom-0 h-[3px] bg-gradient-to-r from-[color:var(--liftRed)]/0 via-[color:var(--liftRed)]/70 to-[color:var(--liftRed)]/0 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
              </div>
            </article>
          </div>

          <!-- CARD 2 -->
          <div class="reveal h-full" data-delay="2">
            <article
              class="group relative h-full rounded-3xl border border-slate-200/70 bg-white overflow-hidden shadow-sm transition-all duration-500 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-1 hover:shadow-2xl hover:shadow-slate-900/10">
              <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                <img
                  src="{{ $page->getBlockSrc('card_2_image', 'https://lift-es.com/wp-content/uploads/2022/03/20211125_104556.jpg') }}"
                  alt="Cursos dinámicos"
                  class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)] group-hover:scale-[1.06]"
                  loading="lazy" decoding="async" />
                <div
                  class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-slate-950/10 to-transparent opacity-90">
                </div>

                <div
                  class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-3 py-1.5 text-white backdrop-blur">
                  <span class="h-2 w-2 rounded-full bg-[color:var(--liftRed)]"></span>
                  <span
                    class="font-heading font-extrabold text-[10px] tracking-[0.28em] uppercase">{{ $page->getBlock('card_2_badge', 'Metodología') }}</span>
                </div>
              </div>

              <div class="p-6">
                <h3 class="font-heading font-extrabold text-lg">
                  {{ $page->getBlock('card_2_title', 'Cursos dinámicos') }}
                </h3>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                  {{ $page->getBlock('card_2_description', 'Aprender importa más que "cubrir temario". Participativo y efectivo.') }}
                </p>

                <div class="mt-4 flex items-center justify-between">
                  <div
                    class="inline-flex flex-wrap items-center gap-2 text-[10px] sm:text-[11px] font-heading font-extrabold tracking-wider sm:tracking-[0.2em] uppercase text-slate-500 leading-tight">
                    <span class="h-1.5 w-1.5 rounded-full shrink-0 bg-[color:var(--liftRed)]"></span>
                    {{ $page->getBlock('card_2_bottom', 'Alta retención') }}
                  </div>

                </div>
              </div>

              <div
                class="absolute inset-x-0 bottom-0 h-[3px] bg-gradient-to-r from-[color:var(--liftRed)]/0 via-[color:var(--liftRed)]/70 to-[color:var(--liftRed)]/0 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
              </div>
            </article>
          </div>

          <!-- CARD 3 -->
          <div class="reveal h-full" data-delay="3">
            <article
              class="group relative h-full rounded-3xl border border-slate-200/70 bg-white overflow-hidden shadow-sm transition-all duration-500 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-1 hover:shadow-2xl hover:shadow-slate-900/10">
              <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                <img
                  src="{{ $page->getBlockSrc('card_3_image', 'https://lift-es.com/wp-content/uploads/2022/03/IMG_20180704_111806169-003.jpg') }}"
                  alt="Prácticas"
                  class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)] group-hover:scale-[1.06]"
                  loading="lazy" decoding="async" />
                <div
                  class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-slate-950/10 to-transparent opacity-90">
                </div>

                <div
                  class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-3 py-1.5 text-white backdrop-blur">
                  <span class="h-2 w-2 rounded-full bg-[color:var(--liftRed)]"></span>
                  <span
                    class="font-heading font-extrabold text-[10px] tracking-[0.28em] uppercase">{{ $page->getBlock('card_3_badge', 'Práctica') }}</span>
                </div>
              </div>

              <div class="p-6">
                <h3 class="font-heading font-extrabold text-lg">{{ $page->getBlock('card_3_title', 'Prácticas') }}</h3>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                  {{ $page->getBlock('card_3_description', 'Prácticas dirigidas por técnicos especialistas en maniobras y PRL.') }}
                </p>

                <div class="mt-4 flex items-center justify-between">
                  <div
                    class="inline-flex flex-wrap items-center gap-2 text-[10px] sm:text-[11px] font-heading font-extrabold tracking-wider sm:tracking-[0.2em] uppercase text-slate-500 leading-tight">
                    <span class="h-1.5 w-1.5 rounded-full shrink-0 bg-[color:var(--liftRed)]"></span>
                    {{ $page->getBlock('card_3_bottom', 'En entorno real') }}
                  </div>

                </div>
              </div>

              <div
                class="absolute inset-x-0 bottom-0 h-[3px] bg-gradient-to-r from-[color:var(--liftRed)]/0 via-[color:var(--liftRed)]/70 to-[color:var(--liftRed)]/0 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
              </div>
            </article>
          </div>

          <!-- CARD 4 -->
          <div class="reveal h-full" data-delay="4">
            <article
              class="group relative h-full rounded-3xl border border-slate-200/70 bg-white overflow-hidden shadow-sm transition-all duration-500 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-1 hover:shadow-2xl hover:shadow-slate-900/10">
              <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
                <img
                  src="{{ $page->getBlockSrc('card_4_image', 'https://lift-es.com/wp-content/uploads/2022/03/diploma-.jpg') }}"
                  alt="Título"
                  class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(.16,1,.3,1)] group-hover:scale-[1.06]"
                  loading="lazy" decoding="async" />
                <div
                  class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-slate-950/10 to-transparent opacity-90">
                </div>

                <div
                  class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-3 py-1.5 text-white backdrop-blur">
                  <span class="h-2 w-2 rounded-full bg-[color:var(--liftRed)]"></span>
                  <span
                    class="font-heading font-extrabold text-[10px] tracking-[0.28em] uppercase">{{ $page->getBlock('card_4_badge', 'Acreditación') }}</span>
                </div>
              </div>

              <div class="p-6">
                <h3 class="font-heading font-extrabold text-lg">{{ $page->getBlock('card_4_title', 'Título') }}</h3>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                  {{ $page->getBlock('card_4_description', 'Obtención de título acreditativo al finalizar el curso.') }}
                </p>

                <div class="mt-4 flex items-center justify-between">
                  <div
                    class="inline-flex flex-wrap items-center gap-2 text-[10px] sm:text-[11px] font-heading font-extrabold tracking-wider sm:tracking-[0.2em] uppercase text-slate-500 leading-tight">
                    <span class="h-1.5 w-1.5 rounded-full shrink-0 bg-[color:var(--liftRed)]"></span>
                    {{ $page->getBlock('card_4_bottom', 'Certificación') }}
                  </div>

                </div>
              </div>

              <div
                class="absolute inset-x-0 bottom-0 h-[3px] bg-gradient-to-r from-[color:var(--liftRed)]/0 via-[color:var(--liftRed)]/70 to-[color:var(--liftRed)]/0 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>


    <!-- DESCARGAS -->
    <section id="descargas" class="relative py-20 sm:py-24 border-t overflow-hidden"
      :class="theme === 'dark' ? 'border-white/10 bg-slate-950' : 'border-slate-200 bg-white'">
      <!-- decor sutil -->
      <div class="pointer-events-none absolute inset-0">
        <div class="absolute -top-32 -left-32 h-[520px] w-[520px] rounded-full blur-[120px]"
          style="background: radial-gradient(circle at 30% 30%, rgba(255,51,51,.16), transparent 60%);"></div>
        <div class="absolute -bottom-40 -right-40 h-[560px] w-[560px] rounded-full blur-[140px]"
          style="background: radial-gradient(circle at 70% 70%, rgba(15,23,42,.18), transparent 62%);"></div>
      </div>

      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8">
          <div class="max-w-2xl">
            <div class="reveal inline-flex items-center gap-3" data-delay="1">
              <span class="h-[1px] w-10 bg-[color:var(--liftRed)]"></span>
              <p class="text-[10px] font-extrabold tracking-[0.35em] uppercase text-[color:var(--liftRed)]">Descargas
              </p>
            </div>

            <h2
              class="reveal mt-4 font-heading text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-[1.05]"
              data-delay="2" :class="theme === 'dark' ? 'text-white' : 'text-slate-900'">
              Fichas PDF de formación
            </h2>

            <p class="reveal mt-4 text-base sm:text-lg leading-relaxed" data-delay="3"
              :class="theme === 'dark' ? 'text-white/65' : 'text-slate-600'">
              Descarga las fichas disponibles. Si alguna aparece como <b>Próximamente</b>, pídela y te la preparamos.
            </p>

          </div>

        </div>

        <!-- TABLE CARD -->
        <div class="mt-10 rounded-[28px] border overflow-hidden shadow-sm"
          :class="theme === 'dark' ? 'bg-white/5 border-white/10' : 'bg-white border-slate-200'">
          <!-- top bar -->
          <div class="flex items-center justify-between px-6 py-4 border-b"
            :class="theme === 'dark' ? 'border-white/10 bg-black/10' : 'border-slate-200 bg-slate-50'">
            <div class="flex items-center gap-2">
              <span class="h-2 w-2 rounded-full bg-[color:var(--liftRed)]"></span>
              <p class="text-[11px] font-extrabold uppercase tracking-[0.22em]"
                :class="theme === 'dark' ? 'text-white/70' : 'text-slate-600'">
                Listado de fichas
              </p>
            </div>

          </div>

          <div class="overflow-x-auto docs-table-wrap">
            <table class="min-w-full text-left docs-table">
              <thead :class="theme === 'dark' ? 'bg-black/10' : 'bg-white'">
                <tr>
                  <th class="px-6 py-4 text-[11px] font-extrabold uppercase tracking-[0.22em]"
                    :class="theme === 'dark' ? 'text-white/55' : 'text-slate-500'">
                    Ficha
                  </th>

                </tr>
              </thead>

              <tbody :class="theme === 'dark' ? 'divide-y divide-white/10' : 'divide-y divide-slate-200'">
                @forelse($documents as $doc)
                  <tr :class="theme === 'dark' ? 'hover:bg-white/5' : 'hover:bg-slate-50'" class="transition-colors">
                    <td class="px-6 py-5 w-full">
                      <div class="flex items-center gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center shrink-0"
                          :class="theme === 'dark' ? 'bg-red-500/10 text-red-400' : 'bg-red-50 text-[color:var(--liftRed)]'">
                          <i class="fa-solid fa-file-pdf text-lg"></i>
                        </div>
                        <div class="flex-grow">
                          <div class="font-heading font-extrabold text-sm sm:text-base leading-tight"
                            :class="theme === 'dark' ? 'text-white' : 'text-slate-900'">
                            {{ $doc->title }}
                          </div>
                          <div
                            class="mt-1 flex items-center gap-2 text-[11px] sm:text-xs font-semibold uppercase tracking-wider"
                            :class="theme === 'dark' ? 'text-white/55' : 'text-slate-500'">
                            <span
                              class="px-2 py-0.5 rounded-md bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-white/70">PDF</span>
                            <span>{{ $doc->description ?? 'Formación técnica' }}</span>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-5 sm:text-right w-full sm:w-auto doc-right flex-shrink-0">
                      <a href="{{ Str::startsWith($doc->file_path, ['http', 'https']) ? $doc->file_path : asset('storage/' . $doc->file_path) }}"
                        target="_blank" rel="noopener"
                        class="group inline-flex items-center justify-center gap-2 rounded-2xl px-5 py-3 sm:py-2.5 w-full sm:w-auto text-[11px] font-extrabold uppercase tracking-[0.18em] text-white transition-all duration-500 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-0.5 shadow-lg shadow-red-500/20 doc-download"
                        style="background: linear-gradient(90deg, #ff3333, #ff5151);">
                        <i class="fa-solid fa-cloud-arrow-down"></i>
                        Descargar
                        <span class="opacity-80 transition-transform duration-500 group-hover:translate-x-0.5">↗</span>
                      </a>
                    </td>

                  </tr>
                @empty
                  <tr>
                    <td class="px-6 py-10 text-center text-slate-500"
                      :class="theme === 'dark' ? 'text-white/55' : 'text-slate-500'">
                      No hay documentos disponibles en este momento.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>


        </div>
      </div>
    </section>


  </main>

  <x-footer />

  <!-- JS: Reveal, Parallax, Tilt, Counters, Mobile menu, Progress, Magnetic -->
  <script>
    (function () {
      const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

      // ---- 0) Top scroll progress ----
      const bar = document.getElementById("scrollbar");
      const updateBar = () => {
        const h = document.documentElement;
        const max = (h.scrollHeight - h.clientHeight) || 1;
        const p = Math.min(1, Math.max(0, (h.scrollTop || window.scrollY) / max));
        bar.style.width = (p * 100).toFixed(2) + "%";
      };
      window.addEventListener("scroll", updateBar, { passive: true });
      window.addEventListener("resize", updateBar);
      updateBar();

      // ---- 1) Mobile menu ----
      const btn = document.getElementById("menuBtn");
      const panel = document.getElementById("mobileMenu");
      const icon = document.getElementById("menuIcon");
      const setOpen = (open) => {
        panel.dataset.open = open ? "true" : "false";
        btn.setAttribute("aria-expanded", open ? "true" : "false");
        icon.innerHTML = open
          ? '<path d="M18.3 5.71 12 12l6.3 6.29-1.41 1.42L10.59 13.4 4.29 19.71 2.88 18.29 9.17 12 2.88 5.71 4.29 4.29l6.3 6.31 6.3-6.31z"/>'
          : '<path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"/>';
      };
      btn?.addEventListener("click", () => {
        const isOpen = panel.dataset.open === "true";
        setOpen(!isOpen);
      });
      document.addEventListener("click", (e) => {
        if (!panel || !btn) return;
        const isOpen = panel.dataset.open === "true";
        if (!isOpen) return;
        const target = e.target;
        if (!panel.contains(target) && !btn.contains(target)) setOpen(false);
      });
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && panel?.dataset.open === "true") setOpen(false);
      });

      // ---- 2) Reveal on scroll ----
      const revealEls = Array.from(document.querySelectorAll(".reveal"));
      if (!reduceMotion && "IntersectionObserver" in window) {
        const io = new IntersectionObserver((entries) => {
          entries.forEach((e) => {
            if (e.isIntersecting) {
              e.target.classList.add("is-in");
              io.unobserve(e.target);
            }
          });
        }, { threshold: 0.16 });
        revealEls.forEach((el) => io.observe(el));
      } else {
        revealEls.forEach((el) => el.classList.add("is-in"));
      }

      // ---- 3) Parallax (suave) ----
      const parallaxEls = Array.from(document.querySelectorAll("[data-parallax]"));
      if (!reduceMotion && parallaxEls.length) {
        let ticking = false;
        const onScroll = () => {
          if (ticking) return;
          ticking = true;
          requestAnimationFrame(() => {
            const y = window.scrollY || 0;
            parallaxEls.forEach((el) => {
              const s = parseFloat(el.getAttribute("data-parallax")) || 0.1;
              el.style.transform = `translate3d(0, ${y * s * -0.12}px, 0)`;
            });
            ticking = false;
          });
        };
        window.addEventListener("scroll", onScroll, { passive: true });
        onScroll();
      }

      // ---- 4) Tilt 3D (mouse only) ----
      const tiltEls = Array.from(document.querySelectorAll(".tilt"));
      if (!reduceMotion && tiltEls.length && matchMedia("(pointer:fine)").matches) {
        const clamp = (n, min, max) => Math.max(min, Math.min(max, n));
        tiltEls.forEach((card) => {
          let rect = null;
          const highlight = card.querySelector("[data-highlight]");

          const onMove = (ev) => {
            rect = rect || card.getBoundingClientRect();
            const x = ev.clientX - rect.left;
            const y = ev.clientY - rect.top;
            const px = (x / rect.width) * 2 - 1;
            const py = (y / rect.height) * 2 - 1;

            const rx = clamp(py * -6, -8, 8);
            const ry = clamp(px * 8, -10, 10);

            card.style.transform = `perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg) translateY(-2px)`;
            if (highlight) {
              highlight.style.opacity = "1";
              highlight.style.setProperty("--mx", `${(x / rect.width) * 100}%`);
              highlight.style.setProperty("--my", `${(y / rect.height) * 100}%`);
            }
          };

          const onLeave = () => {
            rect = null;
            card.style.transform = "";
            if (highlight) highlight.style.opacity = "0";
          };

          card.addEventListener("mouseenter", () => (rect = card.getBoundingClientRect()));
          card.addEventListener("mousemove", onMove);
          card.addEventListener("mouseleave", onLeave);
        });
      }

      // ---- 5) Counters ----
      const counters = Array.from(document.querySelectorAll(".count"));
      if (!reduceMotion && counters.length) {
        const easeOut = (t) => 1 - Math.pow(1 - t, 3);
        const runCounter = (el) => {
          const to = parseFloat(el.dataset.to || "0");
          const suffix = el.dataset.suffix || "";
          const duration = 900;
          const start = performance.now();

          const tick = (now) => {
            const p = Math.min(1, (now - start) / duration);
            const v = Math.round(to * easeOut(p));
            el.textContent = `${v}${suffix}`;
            if (p < 1) requestAnimationFrame(tick);
          };
          requestAnimationFrame(tick);
        };

        if ("IntersectionObserver" in window) {
          const ioC = new IntersectionObserver((entries) => {
            entries.forEach((e) => {
              if (e.isIntersecting) {
                runCounter(e.target);
                ioC.unobserve(e.target);
              }
            });
          }, { threshold: 0.6 });
          counters.forEach((c) => ioC.observe(c));
        } else {
          counters.forEach(runCounter);
        }
      }

      // ---- 6) Magnetic buttons (very subtle) ----
      const mags = Array.from(document.querySelectorAll(".mag"));
      if (!reduceMotion && mags.length && matchMedia("(pointer:fine)").matches) {
        const clamp = (n, min, max) => Math.max(min, Math.min(max, n));
        mags.forEach((el) => {
          const strength = parseFloat(el.dataset.mag || "8");
          let rect = null;

          const move = (e) => {
            rect = rect || el.getBoundingClientRect();
            const x = e.clientX - (rect.left + rect.width / 2);
            const y = e.clientY - (rect.top + rect.height / 2);
            const dx = clamp(x / rect.width, -0.5, 0.5);
            const dy = clamp(y / rect.height, -0.5, 0.5);
            el.style.transform = `translate3d(${dx * strength}px, ${dy * strength}px, 0)`;
          };

          const leave = () => {
            rect = null;
            el.style.transform = "";
          };

          el.addEventListener("mouseenter", () => (rect = el.getBoundingClientRect()));
          el.addEventListener("mousemove", move);
          el.addEventListener("mouseleave", leave);
      });}
    })();
  </script>
</body>

</html>
