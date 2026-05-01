<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <title>{{ __('LIFT – Calculadoras') }}</title>

  {{-- SEO Meta --}}
  <meta name="description"
    content="{{ __('Calculadoras técnicas de ingeniería de LIFT. Herramientas de cálculo para grúas, cargas, elementos de tracción y estructuras auxiliares.') }}" />
  <meta name="author" content="LIFT Ingeniería S.L." />
  <meta name="theme-color" content="#ff3333" />
  <link rel="canonical" href="{{ url()->current() }}" />

  {{-- Open Graph --}}
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
  <meta property="og:site_name" content="LIFT Ingeniería" />
  <meta property="og:title" content="{{ __('LIFT – Calculadoras') }}" />
  <meta property="og:description"
    content="{{ __('Herramientas de cálculo técnico para grúas, cargas y estructuras industriales.') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ __('LIFT – Calculadoras') }}" />
  <meta name="twitter:description"
    content="{{ __('Herramientas de cálculo técnico para grúas, cargas y estructuras industriales.') }}" />
  <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Favicon --}}
  @include('components.favicons')

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* === TODO TU CSS ORIGINAL (SIN CAMBIOS) === */
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    html {
      text-size-adjust: 100%;
    }

    body {
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    ::selection {
      background: #ff3333;
      color: #fff;
    }

    :root {
      --liftRed: #ff3333;
      --stickyTop: 84px;
      --chipsH: 72px;

      --contentMax: 82rem;
      --contentMaxXL: 98rem;
      --contentMax2XL: 118rem;
      --gutter: clamp(1rem, 2.2vw, 2rem);

      --sidebarLeft: 0px;
      --sidebarW: 360px;

      --cardRadius: 1.5rem;
      --softRadius: 1.25rem;
      --shadowA: 0 14px 45px rgba(15, 23, 42, 0.06);
      --shadowB: 0 22px 70px rgba(255, 51, 51, 0.08), 0 18px 55px rgba(15, 23, 42, 0.08);
    }

    @media (min-width: 1024px) {
      :root {
        --chipsH: 0px;
      }
    }

    @media (min-width: 1536px) {
      :root {
        --contentMax: var(--contentMaxXL);
      }
    }

    @media (min-width: 1920px) {
      :root {
        --contentMax: var(--contentMax2XL);
      }
    }

    @media (min-width: 2560px) {
      :root {
        --contentMax: 92rem;
        --contentMaxXL: 112rem;
        --contentMax2XL: 132rem;
      }
    }

    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    :focus {
      outline: none;
    }

    :focus-visible {
      outline: 3px solid rgba(255, 51, 51, 0.45);
      outline-offset: 3px;
      border-radius: 12px;
    }

    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.001ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.001ms !important;
        scroll-behavior: auto !important;
      }
    }

    .text-liftRed {
      color: var(--liftRed);
    }

    .bg-liftRed {
      background: var(--liftRed);
    }

    .app-bg {
      background:
        radial-gradient(circle at 10% 5%, rgba(255, 51, 51, .12), transparent 55%),
        radial-gradient(circle at 90% 15%, rgba(15, 23, 42, .08), transparent 60%),
        radial-gradient(#e5e7eb 1px, transparent 1px);
      background-size: auto, auto, 24px 24px;
      background-color: #fff;
    }

    .safe-x {
      padding-left: max(var(--gutter), env(safe-area-inset-left));
      padding-right: max(var(--gutter), env(safe-area-inset-right));
    }

    .safe-bottom {
      padding-bottom: max(1rem, env(safe-area-inset-bottom));
    }

    .max-pro {
      width: 100%;
      max-width: var(--contentMax);
      margin-inline: auto;
    }

    .lift-card {
      border-radius: var(--cardRadius);
      border: 1px solid rgba(226, 232, 240, 1);
      background: rgba(255, 255, 255, .80);
      backdrop-filter: blur(10px);
      box-shadow: var(--shadowA);
      transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
      will-change: transform;
    }

    .lift-card:hover {
      transform: translateY(-4px);
      border-color: rgba(255, 51, 51, .22);
      box-shadow: var(--shadowB);
    }

    /* Más ancho en móviles para las tarjetas */
    @media (max-width: 640px) {
      .lift-card {
        margin-left: -0.5rem;
        margin-right: -0.5rem;
      }
    }

    .lift-soft {
      border-radius: var(--softRadius);
      border: 1px solid rgba(226, 232, 240, 1);
      background: rgba(255, 255, 255, .72);
    }

    .lift-label {
      font-size: .72rem;
      letter-spacing: .22em;
      text-transform: uppercase;
      font-weight: 800;
      color: #64748b;
    }

    .lift-input {
      width: 100%;
      border-radius: 1rem;
      border: 1px solid rgba(226, 232, 240, 1);
      background: rgba(255, 255, 255, .94);
      padding: .9rem 1rem;
      outline: none;
      transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease;
    }

    .lift-input:focus {
      border-color: rgba(255, 51, 51, .45);
      box-shadow: 0 0 0 4px rgba(255, 51, 51, .10);
      transform: translateY(-1px);
    }

    .lift-btn {
      border-radius: 9999px;
      font-weight: 900;
      letter-spacing: .18em;
      text-transform: uppercase;
      font-size: .72rem;
      padding: 0.95rem 1.15rem;
      transition: transform .18s ease, background .18s ease, border-color .18s ease, box-shadow .18s ease;
      user-select: none;
      white-space: nowrap;
    }

    .lift-btn:active {
      transform: translateY(0);
    }

    .lift-btn-primary {
      background: var(--liftRed);
      color: #fff;
      box-shadow: 0 18px 45px rgba(255, 51, 51, .18);
    }

    .lift-btn-primary:hover {
      transform: translateY(-2px);
      background: #ff1f1f;
      box-shadow: 0 22px 60px rgba(255, 51, 51, .22);
    }

    .lift-btn-ghost {
      border: 1px solid rgba(15, 23, 42, .14);
      background: rgba(255, 255, 255, .75);
      color: #0f172a;
    }

    .lift-btn-ghost:hover {
      transform: translateY(-2px);
      border-color: rgba(255, 51, 51, .22);
      box-shadow: 0 14px 40px rgba(15, 23, 42, .08);
    }

    .lift-pill {
      display: inline-flex;
      align-items: center;
      gap: .55rem;
      padding: .42rem .75rem;
      border-radius: .85rem;
      border: 1px solid rgba(255, 51, 51, .22);
      color: var(--liftRed);
      background: rgba(255, 51, 51, .06);
      font-weight: 900;
      font-size: .70rem;
      letter-spacing: .22em;
      text-transform: uppercase;
    }

    .formula {
      border-radius: 1.25rem;
      border: 1px dashed rgba(255, 51, 51, .28);
      background: linear-gradient(180deg, rgba(255, 51, 51, .06), rgba(255, 255, 255, .75));
      padding: 1rem;
    }

    .formula code {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      font-weight: 800;
      font-size: .92rem;
      color: #0f172a;
      word-break: break-word;
    }

    .nav-link {
      border-radius: 1rem;
      padding: .8rem .9rem;
      display: flex;
      gap: .75rem;
      align-items: center;
      border: 1px solid rgba(226, 232, 240, 1);
      background: rgba(255, 255, 255, .78);
      transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease;
    }

    .nav-link:hover {
      border-color: rgba(255, 51, 51, .22);
      transform: translateY(-1px);
      box-shadow: 0 14px 40px rgba(15, 23, 42, .07);
    }

    .nav-dot {
      width: 2.25rem;
      height: 2.25rem;
      border-radius: 1rem;
      display: grid;
      place-items: center;
      background: #0f172a;
      color: #fff;
      box-shadow: 0 10px 22px rgba(15, 23, 42, .18);
      transition: transform .18s ease, background .18s ease;
      flex: 0 0 auto;
      font-weight: 900;
      letter-spacing: .05em;
    }

    .nav-link:hover .nav-dot {
      background: var(--liftRed);
      transform: rotate(6deg);
    }

    .chip {
      display: inline-flex;
      align-items: center;
      gap: .55rem;
      border-radius: 9999px;
      padding: .65rem .85rem;
      border: none;
      background: rgba(255, 255, 255, .90);
      backdrop-filter: blur(10px);
      font-weight: 900;
      font-size: .72rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: #0f172a;
      white-space: nowrap;
      transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease;
    }

    .chip:hover {
      border-color: rgba(255, 51, 51, .22);
      transform: translateY(-1px);
      box-shadow: 0 14px 40px rgba(15, 23, 42, .07);
    }

    .chip i {
      color: var(--liftRed);
    }

    .chips-wrap {
      position: relative;
    }

    .chips-wrap::before,
    .chips-wrap::after {
      content: "";
      position: absolute;
      top: 0;
      bottom: 0;
      width: 24px;
      pointer-events: none;
      z-index: 2;
    }

    .chips-wrap::before {
      left: 0;
      background: linear-gradient(to right, rgba(255, 255, 255, .95), rgba(255, 255, 255, 0));
    }

    .chips-wrap::after {
      right: 0;
      background: linear-gradient(to left, rgba(255, 255, 255, .95), rgba(255, 255, 255, 0));
    }

    .divider {
      height: 1px;
      background: linear-gradient(to right, rgba(255, 51, 51, .35), rgba(15, 23, 42, .08), transparent);
    }

    .h1-clamp {
      font-size: clamp(2.0rem, 2.6vw + 1rem, 3.8rem);
    }

    .h2-clamp {
      font-size: clamp(1.35rem, 1.3vw + 1rem, 2.1rem);
    }

    .scroll-offset {
      scroll-margin-top: calc(var(--stickyTop) + var(--chipsH) + 22px);
    }

    .sticky-top {
      top: var(--stickyTop);
    }

    .hero-surface {
      border-radius: 2rem;
      border: 1px solid rgba(226, 232, 240, 1);
      background:
        radial-gradient(circle at 20% 15%, rgba(255, 51, 51, .16), transparent 55%),
        radial-gradient(circle at 85% 20%, rgba(15, 23, 42, .10), transparent 55%),
        linear-gradient(180deg, rgba(255, 255, 255, .88), rgba(255, 255, 255, .76));
      backdrop-filter: blur(12px);
      box-shadow: 0 28px 90px rgba(15, 23, 42, .10);
      overflow: hidden;
      position: relative;
    }

    .hero-grid {
      position: absolute;
      inset: 0;
      opacity: .35;
      background-image: radial-gradient(rgba(148, 163, 184, .8) 1px, transparent 1px);
      background-size: 26px 26px;
      pointer-events: none;
      mask-image: radial-gradient(circle at 35% 30%, black 0%, transparent 68%);
    }

    .hero-blobs:before,
    .hero-blobs:after {
      content: "";
      position: absolute;
      border-radius: 9999px;
      filter: blur(70px);
      opacity: .55;
      pointer-events: none;
    }

    .hero-blobs:before {
      width: clamp(260px, 40vw, 520px);
      height: clamp(260px, 40vw, 520px);
      left: clamp(-260px, -18vw, -180px);
      top: clamp(-280px, -20vw, -200px);
      background: rgba(255, 51, 51, .22);
    }

    .hero-blobs:after {
      width: clamp(320px, 48vw, 620px);
      height: clamp(320px, 48vw, 620px);
      right: clamp(-320px, -20vw, -240px);
      bottom: clamp(-360px, -24vw, -280px);
      background: rgba(15, 23, 42, .14);
    }

    .hero-pad {
      padding: clamp(2.25rem, 5vw, 6.25rem) 1rem;
    }

    .skip-link {
      position: absolute;
      left: 12px;
      top: 12px;
      z-index: 9999;
      transform: translateY(-140%);
      transition: transform .18s ease;
      background: rgba(255, 255, 255, .92);
      border: 1px solid rgba(226, 232, 240, 1);
      border-radius: 9999px;
      padding: .65rem .9rem;
      font-weight: 900;
      letter-spacing: .12em;
      text-transform: uppercase;
      font-size: .72rem;
      color: #0f172a;
      box-shadow: 0 14px 40px rgba(15, 23, 42, .08);
    }

    .skip-link:focus-visible {
      transform: translateY(0);
    }

    .app-grid {
      display: grid;
      gap: 1.25rem;
      align-items: start;
    }

    @media (min-width: 1024px) {
      .app-grid {
        grid-template-columns: minmax(280px, 360px) minmax(0, 1fr);
        gap: 1.5rem;
      }
    }

    @media (min-width: 1920px) {
      .app-grid {
        grid-template-columns: minmax(320px, 420px) minmax(0, 1fr);
        gap: 1.75rem;
      }
    }

    @media (min-width: 1024px) {
      .sidebar-sticky {
        position: sticky;
        top: calc(var(--stickyTop) + 12px);
        align-self: start;
      }

      .sidebar-inner {
        max-height: calc(100dvh - (var(--stickyTop) + 24px));
        overflow: auto;
        overscroll-behavior: contain;
        scrollbar-gutter: stable;
        padding-right: 0.25rem;
      }

      .sidebar-inner::-webkit-scrollbar {
        width: 10px;
      }

      .sidebar-inner::-webkit-scrollbar-thumb {
        background: rgba(15, 23, 42, 0.14);
        border-radius: 999px;
        border: 3px solid rgba(255, 255, 255, 0.9);
      }
    }

    html,
    body {
      min-height: 100%;
    }

    body {
      min-height: 100dvh;
    }

    main {
      overflow-x: clip;
    }

    @@supports not (overflow: clip) {
      main {
        overflow-x: hidden;
      }
    }

    @media (max-width: 360px) {
      :root {
        --cardRadius: 1.1rem;
        --softRadius: 1.0rem;
      }

      .lift-input {
        padding: .8rem .9rem;
        border-radius: .9rem;
      }

      .lift-btn {
        padding: .85rem 1rem;
      }

      .nav-dot {
        width: 2.1rem;
        height: 2.1rem;
        border-radius: .9rem;
      }
    }

    @media (max-height: 700px) {
      .scroll-offset {
        scroll-margin-top: calc(var(--stickyTop) + var(--chipsH) + 24px);
      }
    }

    @media (max-width: 420px) {
      .hero-surface .grid-cols-3 {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
    }

    .out-error {
      color: #b91c1c;
    }

    .out-ok {
      color: #0f172a;
    }

    /* Ocultar fotos en móviles */
    @media (max-width: 768px) {
      figure {
        display: none;
      }
    }
  </style>
</head>

<body class="bg-white text-gray-800 antialiased app-bg" id="main-body">
  <a class="skip-link" href="#app">{{ __('Saltar a calculadoras') }}</a>

  {{-- TU HEADER --}}
  <x-header />

  <main class="relative">
    <!-- (Tu HERO y NAV igual que lo tenías) -->
    <div class="safe-x pt-[8%] sm:pt-[10%] md:pt-[4%] pb-2">
      <div class="max-pro">
        <section class="hero-surface hero-blobs relative overflow-hidden">
          <div class="hero-grid"></div>
          <div
            class="pointer-events-none absolute -top-32 -left-40 h-[520px] w-[520px] rounded-full blur-[140px] bg-red-500/7">
          </div>
          <div
            class="pointer-events-none absolute -bottom-40 -right-44 h-[620px] w-[620px] rounded-full blur-[160px] bg-slate-900/7">
          </div>

          <div class="relative z-10 px-4 hero-pad">
            <div class="mx-auto max-w-6xl">
              <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                <div class="lg:col-span-7">
                  <h1
                    class="mt-5 font-heading font-black uppercase leading-[1.05] tracking-tight text-slate-900 h1-clamp">
                    {{ __('PANEL DE CÁLCULOS') }} <br>
                    {{ __('NECESARIOS PARA') }} <br>
                    {{ __('EJECUCIÓN DE') }} <br>
                    <span class="text-liftRed">{{ __('MANIOBRAS') }}</span>
                  </h1>
                  <p class="mt-4 text-[0.98rem] sm:text-lg text-slate-600 max-w-3xl leading-relaxed font-medium">
                    {{ __('Introduce parámetros, valida magnitudes y consulta resultados por módulo.') }}
                    {{ __('Interfaz pensada para trabajo en obra: lectura rápida, campos claros y navegación por secciones.') }}
                  </p>
                  <div class="mt-5 flex items-center gap-2 text-xs font-semibold text-slate-500">
                    <span
                      class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 backdrop-blur px-3 py-1.5">
                      <span class="w-1.5 h-1.5 rounded-full bg-liftRed"></span>
                      {{ __('Normaliza coma/punto · Bloquea cálculo si faltan campos') }}
                    </span>
                  </div>
                  <div class="mt-7">
                    <a href="#app" class="lift-btn lift-btn-primary inline-flex items-center justify-center gap-2">
                      <i class="fa-solid fa-arrow-down"></i>
                      {{ __('Ir a calculadoras') }}
                    </a>
                  </div>
                </div>

                <div class="lg:col-span-5">
                  <div class="lift-card p-3 sm:p-4">
                    <div
                      class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white/60 backdrop-blur-md">
                      <img src="{{ asset('img/calculadora/hero.png') }}" alt="Vista del panel de cálculo"
                        class="w-full h-[260px] sm:h-[320px] lg:h-[420px] object-cover" loading="lazy" />
                      <div
                        class="pointer-events-none absolute inset-0 bg-linear-to-t from-white/10 via-white/10 to-transparent">
                      </div>
                      <div
                        class="pointer-events-none absolute inset-0 opacity-60 bg-[radial-gradient(rgba(15,23,42,0.10)_1px,transparent_1px)] bg-size-[22px_22px]">
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- ✅ MOBILE NAV (chips) - OCULTO -->
    <div class="hidden lg:hidden relative z-40 justify-center" id="chipsBar">
      <div class="safe-x">
        <div class="py-3" style="padding-left: 2rem; padding-right: 2rem;">
          <div class="flex justify-center">
            <nav class="grid grid-cols-3 gap-2 max-w-md mx-auto" aria-label="Navegación rápida de calculadoras">
              <a class="chip justify-center" href="#calc-grua"><i class="fa-solid fa-tower-observation"></i>
                {{ __('Grúa') }}</a>
              <a class="chip justify-center" href="#calc-vmax"><i class="fa-solid fa-wind"></i> Vmax</a>
              <a class="chip justify-center" href="#calc-eslingas"><i class="fa-solid fa-link"></i>
                {{ __('Eslingas') }}</a>
              <a class="chip justify-center" href="#calc-volteo"><i class="fa-solid fa-arrows-rotate"></i>
                {{ __('Volteo') }}</a>
              <a class="chip justify-center" href="#calc-2gruas"><i class="fa-solid fa-people-arrows"></i>
                {{ __('2 grúas') }}</a>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- APP -->
    <section id="app" class="relative pb-14 sm:pb-16 safe-bottom">
      <div class="safe-x pt-6">
        <div class="max-pro">
          <div class="app-grid">

            <!-- SIDEBAR (igual) -->
            <aside class="hidden lg:block sidebar-sticky space-y-4">
              <div class="lift-card p-5 sm:p-6">
                <div class="flex items-center justify-between gap-3">
                  <div>
                    <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">{{ __('Navegación') }}
                    </div>
                    <div class="mt-1 font-heading font-black text-slate-900 uppercase">
                      {{ __('Calculadoras') }}
                    </div>
                  </div>
                  <div class="w-10 h-10 rounded-2xl bg-slate-900 text-white flex items-center justify-center">
                    <i class="fa-solid fa-compass"></i>
                  </div>
                </div>

                <div class="sidebar-inner mt-5">
                  <div class="space-y-3">
                    <a class="nav-link" href="#calc-grua">
                      <span class="nav-dot">01</span>
                      <div>
                        <div class="font-heading font-black text-slate-900 uppercase text-sm">
                          {{ __('Selección de grúa') }}
                        </div>
                        <div class="text-xs text-slate-500">{{ __('Altura · radio · peso → tabla') }}</div>
                      </div>
                    </a>

                    <a class="nav-link" href="#calc-vmax">
                      <span class="nav-dot">02</span>
                      <div>
                        <div class="font-heading font-black text-slate-900 uppercase text-sm">Vmax</div>
                        <div class="text-xs text-slate-500">{{ __('Viento admisible') }}</div>
                      </div>
                    </a>

                    <a class="nav-link" href="#calc-eslingas">
                      <span class="nav-dot">03</span>
                      <div>
                        <div class="font-heading font-black text-slate-900 uppercase text-sm">
                          {{ __('Tensión eslingas') }}
                        </div>
                        <div class="text-xs text-slate-500">Peso · L · n · altura → tensión</div>
                      </div>
                    </a>

                    <a class="nav-link" href="#calc-volteo">
                      <span class="nav-dot">04</span>
                      <div>
                        <div class="font-heading font-black text-slate-900 uppercase text-sm">{{ __('Volteo 2 grúas') }}
                        </div>
                        <div class="text-xs text-slate-500">P · L · D · C → tabla</div>
                      </div>
                    </a>

                    <a class="nav-link" href="#calc-2gruas">
                      <span class="nav-dot">05</span>
                      <div>
                        <div class="font-heading font-black text-slate-900 uppercase text-sm">
                          {{ __('Tensión 2 grúas') }}
                        </div>
                        <div class="text-xs text-slate-500">P · DT · DT1 · DT2 → A/B</div>
                      </div>
                    </a>

                  </div>

                  <div class="mt-5 divider"></div>
                  <div class="mt-4 text-xs text-gray-600 leading-relaxed">
                    Tip: {{ __('coma o punto. Se normaliza automáticamente.') }}
                  </div>
                </div>
              </div>
            </aside>

            <!-- CONTENT -->
            <div class="space-y-6">

              <!-- 01 Selección de grúa -->
              <section id="calc-grua" class="lift-card p-5 sm:p-7 md:p-8 scroll-offset">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                  <div>
                    <div class="lift-pill"><i class="fa-solid fa-tower-observation"></i> 01 · {{ __('Selección') }}
                    </div>
                    <h2 class="mt-4 font-heading font-black uppercase text-slate-900 h2-clamp">
                      {{ __('Selección de grúa') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-[15px] text-gray-600 leading-relaxed max-w-3xl">
                      {{ __('Introduce') }} <b>{{ __('altura') }}</b>, <b>{{ __('radio') }}</b> {{ __('y') }}
                      <b>{{ __('peso') }}</b>. {{ __('El resultado se obtiene por tabla orientativa.') }}
                    </p>
                  </div>
                  <a href="#app" class="lift-btn lift-btn-ghost inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-up"></i> {{ __('Arriba') }}
                  </a>
                </div>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                  <div>
                    <label class="lift-label" for="grua_altura">{{ __('Altura (m)') }}</label>
                    <input id="grua_altura" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 18" />
                  </div>
                  <div>
                    <label class="lift-label" for="grua_radio">{{ __('Radio (m)') }}</label>
                    <input id="grua_radio" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 12" />
                  </div>
                  <div>
                    <label class="lift-label" for="grua_peso">{{ __('Peso (kg)') }}</label>
                    <input id="grua_peso" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 800" />
                  </div>
                </div>

                <div class="mt-5 flex flex-col md:flex-row md:items-center gap-3">
                  <button id="btn_grua" class="lift-btn lift-btn-primary inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-magnifying-glass"></i> {{ __('Buscar en tabla') }}
                  </button>

                  <div class="lift-soft p-4 flex-1">
                    <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">{{ __('Resultado') }}
                    </div>
                    <div class="mt-1 text-lg font-black"><span id="grua_out" aria-live="polite">—</span></div>
                    <div class="mt-1 text-xs text-gray-500 leading-relaxed">
                      {{ __('El resultado es la') }} <b>{{ __('clase de grúa') }}</b>
                      {{ __('(capacidad nominal orientativa).') }}
                    </div>
                  </div>
                </div>
              </section>

              <!-- 02 Vmax -->
              <section id="calc-vmax" class="lift-card p-5 sm:p-7 md:p-8 scroll-offset">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                  <div>
                    <div class="lift-pill"><i class="fa-solid fa-wind"></i> 02 · {{ __('Viento') }}</div>
                    <h2 class="mt-4 font-heading font-black uppercase text-slate-900 h2-clamp">
                      {{ __('Vmax (viento admisible)') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-[15px] text-gray-600 leading-relaxed max-w-3xl">
                      {{ __('Calcula la') }} <b>{{ __('velocidad máxima de viento admisible') }}</b>
                      {{ __('según peso, coeficiente aerodinámico y superficie expuesta,') }}
                      {{ __('y la limita por la') }} <b>{{ __('Vmáx de tabla de la grúa') }}</b>.
                      :contentReference[oaicite:1]{index=1}
                    </p>
                  </div>
                  <a href="#app" class="lift-btn lift-btn-ghost inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-up"></i> {{ __('Arriba') }}
                  </a>
                </div>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                  <div>
                    <label class="lift-label" for="vmax_peso">{{ __('Peso de la pieza (t)') }}</label>
                    <input id="vmax_peso" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 50" />
                  </div>
                  <div>
                    <label class="lift-label" for="vmax_cd">{{ __('Coef. aerodinámico (Cd)') }}</label>
                    <input id="vmax_cd" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 1.2" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Típico 0.8–2.0') }}</p>
                  </div>
                  <div>
                    <label class="lift-label" for="vmax_area">{{ __('Superficie expuesta (m²)') }}</label>
                    <input id="vmax_area" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 25" />
                  </div>
                  <div>
                    <label class="lift-label" for="vmax_tabla">{{ __('Vmáx tabla grúa (m/s)') }}</label>
                    <input id="vmax_tabla" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 12" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Si tu tabla está en km/h: divide entre 3.6') }}</p>
                  </div>
                </div>

                <div class="mt-5 flex flex-col md:flex-row md:items-center gap-3">
                  <button id="btn_vmax" class="lift-btn lift-btn-primary inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-wind"></i> {{ __('Calcular') }}
                  </button>

                  <div class="lift-soft p-4 flex-1">
                    <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">{{ __('Resultado') }}
                    </div>
                    <div class="mt-1 text-lg font-black"><span id="vmax_out" aria-live="polite">—</span></div>
                    <div class="mt-1 text-xs text-gray-500">
                      {{ __('Se muestra V admisible (m/s y km/h) y qué valor limita.') }}
                    </div>
                  </div>
                </div>


              </section>

              <!-- 03 Eslingas (peso pieza, longitud, nº, altura) -->
              <section id="calc-eslingas" class="lift-card p-5 sm:p-7 md:p-8 scroll-offset">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                  <div>
                    <div class="lift-pill"><i class="fa-solid fa-link"></i> 03 · {{ __('Eslingas') }}</div>
                    <h2 class="mt-4 font-heading font-black uppercase text-slate-900 h2-clamp">
                      {{ __('Tensión de eslingas') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-[15px] text-gray-600 leading-relaxed max-w-3xl">
                      Campos: <b>peso de la pieza</b>, <b>longitud de eslingas</b>, <b>nº de eslingas</b> y <b>altura
                        estrobada</b>.
                      Se calcula el ángulo por geometría y la tensión por eslinga.
                    </p>
                  </div>
                  <a href="#app" class="lift-btn lift-btn-ghost inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-up"></i> {{ __('Arriba') }}
                  </a>
                </div>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                  <div>
                    <label class="lift-label" for="esl_pieza">{{ __('Peso de la pieza (t)') }}</label>
                    <input id="esl_pieza" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 10" />
                  </div>
                  <div>
                    <label class="lift-label" for="esl_long">{{ __('Longitud eslinga (m)') }}</label>
                    <input id="esl_long" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 6" />
                  </div>
                  <div>
                    <label class="lift-label" for="esl_n">{{ __('Nº de eslingas') }}</label>
                    <input id="esl_n" inputmode="numeric" type="text" class="lift-input mt-2" placeholder="Ej: 2" />
                  </div>
                  <div>
                    <label class="lift-label" for="esl_alt">{{ __('Altura estrobada (m)') }}</label>
                    <input id="esl_alt" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 4" />
                  </div>
                </div>

                <div class="mt-5 flex flex-col lg:flex-row lg:items-center gap-3">
                  <button id="btn_esl" class="lift-btn lift-btn-primary inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-bolt"></i> {{ __('Calcular tensión') }}
                  </button>

                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 flex-1">

                    <div class="lift-soft p-4">
                      <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">
                        {{ __('Tensión por eslinga') }}
                      </div>
                      <div class="mt-1 text-2xl font-black"><span id="esl_out" aria-live="polite">—</span></div>
                      <div class="mt-1 text-xs text-gray-500"><code>T = (P/n) / sin(θ)</code></div>
                    </div>
                  </div>
                </div>

              </section>

              <!-- 04 Volteo con 2 grúas -->
              <section id="calc-volteo" class="lift-card p-5 sm:p-7 md:p-8 scroll-offset">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                  <div>
                    <div class="lift-pill"><i class="fa-solid fa-arrows-rotate"></i> 04 · {{ __('Volteo') }}</div>

                    <h2 class="mt-4 font-heading font-black uppercase text-slate-900 h2-clamp">
                      {{ __('Volteo con dos grúas') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-[15px] text-gray-600 leading-relaxed max-w-3xl">
                      Calcula las fuerzas en la <b>grúa retenida (FB)</b> y <b>grúa principal (FA)</b> según los
                      parámetros de izado.
                    </p>
                  </div>

                  <a href="#app" class="lift-btn lift-btn-ghost inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-up"></i> {{ __('Arriba') }}
                  </a>
                </div>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                  <div>
                    <label class="lift-label" for="vol_p">{{ __('Peso (t)') }}</label>
                    <input id="vol_p" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 18.5" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Peso total de la carga') }}</p>
                  </div>

                  <div>
                    <label class="lift-label" for="vol_l">L (m)</label>
                    <input id="vol_l" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 10" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Longitud entre amarres') }}</p>
                  </div>

                  <div>
                    <label class="lift-label" for="vol_d">d (m)</label>
                    <input id="vol_d" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 4" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('CDG al amarre de retenida') }}</p>
                  </div>

                  <div>
                    <label class="lift-label" for="vol_c">c (m)</label>
                    <input id="vol_c" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 0.5" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Excentricidad del eje') }}</p>
                  </div>

                  <div>
                    <label class="lift-label" for="vol_angulo">{{ __('Ángulo μ (°)') }}</label>
                    <input id="vol_angulo" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 5"
                      value="0" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Ángulo de inclinación') }}</p>
                  </div>
                </div>

                <div class="mt-5 flex flex-col lg:flex-row lg:items-center gap-3">
                  <button id="btn_vol" class="lift-btn lift-btn-primary inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-calculator"></i> {{ __('Calcular fuerzas') }}
                  </button>

                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 flex-1">
                    <div class="lift-soft p-4">
                      <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">
                        {{ __('Grúa Retenida (FB)') }}
                      </div>
                      <div class="mt-1 text-2xl font-black"><span id="vol_fb_out" aria-live="polite">—</span></div>
                      <div class="mt-1 text-xs text-gray-500">{{ __('Fuerza en grúa de retenida') }}</div>
                    </div>
                    <div class="lift-soft p-4">
                      <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">
                        {{ __('Grúa Principal (FA)') }}
                      </div>
                      <div class="mt-1 text-2xl font-black"><span id="vol_fa_out" aria-live="polite">—</span></div>
                      <div class="mt-1 text-xs text-gray-500">{{ __('Fuerza en grúa principal') }}</div>
                    </div>
                  </div>
                </div>

                <!-- FOTO (más pequeña + responsive) -->
                <figure class="mt-10 mb-6 overflow-hidden rounded-2xl mx-auto max-w-xl">
                  <div class="relative w-full" style="aspect-ratio: 16/9;">
                    <img src="{{ asset('img/calculadora/foto2.png') }}" alt="Volteo con dos grúas"
                      class="absolute inset-0 h-full w-full object-contain transform hover:scale-105 transition-transform duration-300"
                      loading="lazy" />
                  </div>
                </figure>

              </section>


              <!-- 05 Tensión con dos grúas (P, DT, DT1, DT2 -> A/B) -->
              <section id="calc-2gruas" class="lift-card p-5 sm:p-7 md:p-8 scroll-offset">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                  <div>
                    <div class="lift-pill"><i class="fa-solid fa-people-arrows"></i> 05 · {{ __('Dos grúas') }}</div>
                    <h2 class="mt-4 font-heading font-black uppercase text-slate-900 h2-clamp">
                      {{ __('TENSIÓN DE ESLINGAS IZADO CON DOS GRÚAS') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-[15px] text-gray-600 leading-relaxed max-w-3xl">
                      Campos: <b>P (t)</b>, <b>DT</b>, <b>DT1</b>, <b>DT2</b>. Resultado: <b>Tensión A</b> y <b>Tensión
                        B</b>.<br />
                      Reparto: <code>TA=(P·DT2)/DT</code> y <code>TB=(P·DT1)/DT</code>.
                      :contentReference[oaicite:2]{index=2}
                    </p>
                  </div>
                  <a href="#app" class="lift-btn lift-btn-ghost inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-up"></i> {{ __('Arriba') }}
                  </a>
                </div>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                  <div>
                    <label class="lift-label" for="g2_p">{{ __('Peso (t)') }}</label>
                    <input id="g2_p" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 12" />
                  </div>
                  <div>
                    <label class="lift-label" for="g2_dt">DT (m)</label>
                    <input id="g2_dt" inputmode="decimal" type="text" class="lift-input mt-2"
                      placeholder="Ej: 4 (opcional)" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Si lo dejas vacío: DT = DT1 + DT2') }}</p>
                  </div>
                  <div>
                    <label class="lift-label" for="g2_dt1">DT1 (m)</label>
                    <input id="g2_dt1" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 2.5" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Distancia CDG → grúa A') }}</p>
                  </div>
                  <div>
                    <label class="lift-label" for="g2_dt2">DT2 (m)</label>
                    <input id="g2_dt2" inputmode="decimal" type="text" class="lift-input mt-2" placeholder="Ej: 1.5" />
                    <p class="mt-2 text-xs text-gray-500">{{ __('Distancia CDG → grúa B') }}</p>
                  </div>
                </div>

                <div class="mt-5 flex flex-col lg:flex-row lg:items-center gap-3">
                  <button id="btn_g2" class="lift-btn lift-btn-primary inline-flex items-center justify-center gap-2">
                    <i class="fa-solid fa-scale-balanced"></i> {{ __('Calcular') }}
                  </button>

                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 flex-1">
                    <div class="lift-soft p-4">
                      <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">
                        {{ __('Tensión A (t)') }}
                      </div>
                      <div class="mt-1 text-2xl font-black"><span id="g2_ta" aria-live="polite">—</span></div>
                      <div class="mt-1 text-xs text-gray-500"><code>(P · DT2) / DT</code></div>
                    </div>
                    <div class="lift-soft p-4">
                      <div class="text-xs font-black tracking-[0.25em] uppercase text-gray-400">
                        {{ __('Tensión B (t)') }}
                      </div>
                      <div class="mt-1 text-2xl font-black"><span id="g2_tb" aria-live="polite">—</span></div>
                      <div class="mt-1 text-xs text-gray-500"><code>(P · DT1) / DT</code></div>
                    </div>
                  </div>
                </div>

                <figure class="mt-10 mb-6 overflow-hidden rounded-2xl mx-auto max-w-xl">
                  <div class="relative w-full" style="aspect-ratio: 16/9;">
                    <img src="{{ asset('img/calculadora/fotocalculo.png') }}" alt="Cálculo con dos grúas"
                      class="absolute inset-0 h-full w-full object-contain transform hover:scale-105 transition-transform duration-300"
                      loading="lazy" />
                  </div>
                </figure>
              </section>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <x-footer />

  <script>

    (function () {
      const root = document.documentElement;
      const chipsBar = document.getElementById("chipsBar");

      const pickHeader = () =>
        document.querySelector("header") || document.querySelector('[role="banner"]');

      let headerEl = null;
      let headerRO = null;
      let chipsRO = null;
      let ticking = false;
      let lastHeaderH = -1;
      let lastChipsH = -1;

      const updateOffsets = () => {
        const nextHeader = pickHeader();
        if (nextHeader && nextHeader !== headerEl) {
          headerEl = nextHeader;

          if (headerRO) headerRO.disconnect();
          headerRO = new ResizeObserver(() => requestUpdate());
          headerRO.observe(headerEl);

          headerEl.addEventListener("transitionrun", requestUpdate, { passive: true });
          headerEl.addEventListener("transitionend", requestUpdate, { passive: true });
        }

        const headerH = headerEl ? Math.ceil(headerEl.getBoundingClientRect().height) : 72;
        const chipsH = chipsBar ? Math.ceil(chipsBar.getBoundingClientRect().height) : 0;

        if (headerH !== lastHeaderH) {
          root.style.setProperty("--stickyTop", `${headerH + 12}px`);
          lastHeaderH = headerH;
        }
        if (chipsH !== lastChipsH) {
          root.style.setProperty("--chipsH", `${chipsH}px`);
          lastChipsH = chipsH;
        }
      };

      const requestUpdate = () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => {
          ticking = false;
          updateOffsets();
        });
      };

      if (chipsBar) {
        chipsRO = new ResizeObserver(() => requestUpdate());
        chipsRO.observe(chipsBar);
      }

      window.addEventListener("scroll", requestUpdate, { passive: true });
      window.addEventListener("resize", requestUpdate);

      updateOffsets();
      setTimeout(updateOffsets, 120);
    })();

    /* =========================
       Helpers (robustos)
       ========================= */
    const parseNum = (v) => {
      const s = String(v ?? "").trim();
      if (!s) return NaN;
      const n = Number(s.replace(",", "."));
      return Number.isFinite(n) ? n : NaN;
    };

    const fmt = (v, d = 2) => (Number.isFinite(v) ? v.toFixed(d) : "—");

    const setOut = (id, text, isError = false) => {
      const el = document.getElementById(id);
      if (!el) return;
      el.textContent = text;
      el.classList.toggle("out-error", !!isError);
      el.classList.toggle("out-ok", !isError);
    };

    const requireNums = (pairs) => pairs.filter(([v]) => !Number.isFinite(v));

    const bindEnter = (inputIds, buttonId) => {
      const btn = document.getElementById(buttonId);
      inputIds.forEach((id) => {
        const el = document.getElementById(id);
        if (!el || !btn) return;
        el.addEventListener("keydown", (e) => {
          if (e.key === "Enter") btn.click();
        });
      });
    };

    /* =========================
       Conversiones
       ========================= */
    const KN_PER_T = 9.80665;        // 1 t (masa) ≈ 9.80665 kN (peso)
    const KGF_PER_KN = 101.971621;   // 1 kN ≈ 101.97 kgf

    const weightToTons = (val, unit) => {
      if (!Number.isFinite(val)) return NaN;
      if (unit === "t") return val;
      if (unit === "kg") return val / 1000;
      if (unit === "kN") return val / KN_PER_T;
      return NaN;
    };

    const weightToKg = (val, unit) => {
      if (!Number.isFinite(val)) return NaN;
      if (unit === "kg") return val;
      if (unit === "t") return val * 1000;
      if (unit === "kN") return val * KGF_PER_KN; // aproximación a kgf
      return NaN;
    };

    /* =========================
       01 Selección de grúa
       - Carga datos desde JSON
       ========================= */
    // Cargar datos de grúas desde JSON
    let craneData = {};

    fetch('/database/calculo-gruas.json?' + new Date().getTime())
      .then(response => {
        console.log('Response status:', response.status);
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        craneData = data;
        console.log('Datos de grúas cargados correctamente', Object.keys(data).length, 'claves');
      })
      .catch(error => {
        console.error('Error cargando datos de grúas:', error);
        setOut("grua_out", "Error cargando tabla de grúas: " + error.message, true);
      });

    document.getElementById("btn_grua")?.addEventListener("click", () => {
      const h = parseNum(document.getElementById("grua_altura")?.value);
      const r = parseNum(document.getElementById("grua_radio")?.value);
      const pKg = parseNum(document.getElementById("grua_peso")?.value);

      const bad = requireNums([[h, "Altura"], [r, "Radio"], [pKg, "Peso"]]);
      if (bad.length) {
        setOut("grua_out", "Introduce altura, radio y peso válidos", true);
        return;
      }

      if (!Number.isFinite(pKg) || pKg <= 0) {
        setOut("grua_out", "Peso inválido", true);
        return;
      }

      // Verificar que los datos se hayan cargado
      if (Object.keys(craneData).length === 0) {
        setOut("grua_out", "Cargando datos... espera un momento e inténtalo de nuevo", true);
        return;
      }

      // Redondear valores para construir la clave
      const hKey = Math.round(h);
      const rKey = Math.round(r);
      const pKey = Math.round(pKg);

      // Construir clave: altura + radio + peso (SIN padding de ceros)
      // Ejemplos: 5+5+100 = "55100", 25+5+800 = "255800", 30+5+100 = "305100"
      const key = `${hKey}${rKey}${pKey}`;

      console.log('Buscando clave:', key, `(altura=${hKey}, radio=${rKey}, peso=${pKey}kg)`); // Debug

      // Buscar en el JSON
      const result = craneData[key];

      if (result === undefined || result === null) {
        console.log('Clave no encontrada en JSON');
        setOut("grua_out", "Fuera de rango: consultar grúa especial", true);
        return;
      }

      console.log('Resultado encontrado:', result);

      // El resultado puede ser un número o un string con info adicional
      let displayResult;
      if (typeof result === 'number') {
        displayResult = `${result} t`;
      } else if (typeof result === 'string') {
        // Limpiar comillas dobles escapadas del JSON
        displayResult = result.replace(/\\"/g, '').replace(/^"|"$/g, '');
      } else {
        displayResult = result;
      }

      setOut("grua_out", displayResult, false);
    });

    bindEnter(["grua_altura", "grua_radio", "grua_peso"], "btn_grua");

    /* =========================
       02 Vmax
       Campos: Peso(t), Cd, Área(m2), Vtabla(m/s)
       Modelo ajustable con k=0.10 (10% del peso)
       ========================= */
    document.getElementById("btn_vmax")?.addEventListener("click", () => {
      const pT = parseNum(document.getElementById("vmax_peso")?.value);
      const cd = parseNum(document.getElementById("vmax_cd")?.value);
      const area = parseNum(document.getElementById("vmax_area")?.value);
      const vTabla = parseNum(document.getElementById("vmax_tabla")?.value);

      const bad = requireNums([[pT, "Peso"], [cd, "Cd"], [area, "Área"], [vTabla, "Vtabla"]]);
      if (bad.length) {
        setOut("vmax_out", "Introduce los 4 parámetros válidos", true);
        return;
      }
      if (!(pT > 0 && cd > 0 && area > 0 && vTabla > 0)) {
        setOut("vmax_out", "Todos los valores deben ser > 0", true);
        return;
      }

      // Fórmula: Vmax = Vtabla × √[(1.2 × Peso) / (Superficie × Cd)]
      const denom = area * cd;
      if (!(denom > 0)) {
        setOut("vmax_out", "Parámetros inválidos", true);
        return;
      }

      const ratio = (1.2 * pT) / denom;
      const vmax = vTabla * Math.sqrt(ratio); // m/s

      setOut(
        "vmax_out",
        `${fmt(vmax, 2)} m/s (≈ ${fmt(vmax * 3.6, 1)} km/h)`,
        false
      );
    });

    bindEnter(["vmax_peso", "vmax_cd", "vmax_area", "vmax_tabla"], "btn_vmax");

    /* =========================
       03 Eslingas (P pieza, L, n, H)
       sin(theta)=H/L ; T = (P/n)/sin(theta)
       ========================= */
    document.getElementById("btn_esl")?.addEventListener("click", () => {
      const pT = parseNum(document.getElementById("esl_pieza")?.value);
      const L = parseNum(document.getElementById("esl_long")?.value);
      const nRaw = parseNum(document.getElementById("esl_n")?.value);
      const H = parseNum(document.getElementById("esl_alt")?.value);

      const bad = requireNums([[pT, "Peso"], [L, "Longitud"], [nRaw, "N"], [H, "Altura"]]);
      if (bad.length) {
        setOut("esl_out", "—", true);
        setOut("esl_ang_out", "—", true);
        return;
      }

      const n = Math.round(nRaw);
      if (!(pT > 0 && L > 0 && H > 0 && n >= 1)) {
        setOut("esl_out", "Datos inválidos", true);
        setOut("esl_ang_out", "—", true);
        return;
      }

      const s = H / L;
      if (!(s > 0 && s <= 1)) {
        setOut("esl_out", "Altura no puede superar la longitud", true);
        setOut("esl_ang_out", "—", true);
        return;
      }

      const theta = Math.asin(s) * (180 / Math.PI);
      const T = (pT / n) / s; // en toneladas si P está en t

      setOut("esl_ang_out", `${fmt(theta, 1)} °`, false);
      setOut("esl_out", `${fmt(T, 2)} t`, false);
    });

    bindEnter(["esl_pieza", "esl_long", "esl_n", "esl_alt"], "btn_esl");

    /* =========================
       04 Volteo con 2 grúas
       FB = (P·cos(μ)·(L-d))/(cos(μ)·L + c·sin(μ))
       FA = P - FB
       ========================= */
    document.getElementById("btn_vol")?.addEventListener("click", () => {
      const P = parseNum(document.getElementById("vol_p")?.value);
      const L = parseNum(document.getElementById("vol_l")?.value);
      const d = parseNum(document.getElementById("vol_d")?.value);
      const c = parseNum(document.getElementById("vol_c")?.value);
      const anguloGrados = parseNum(document.getElementById("vol_angulo")?.value);

      const bad = requireNums([[P, "Peso"], [L, "L"], [d, "d"], [c, "c"], [anguloGrados, "Ángulo"]]);
      if (bad.length) {
        setOut("vol_fb_out", "—", true);
        setOut("vol_fa_out", "—", true);
        return;
      }

      if (!(P > 0 && L > 0 && d > 0 && c > 0)) {
        setOut("vol_fb_out", "Datos inválidos", true);
        setOut("vol_fa_out", "Datos inválidos", true);
        return;
      }

      // Convertir ángulo de grados a radianes
      const mu = anguloGrados * (Math.PI / 180);

      // Calcular FB: (P·cos(μ)·(L-d))/(cos(μ)·L + c·sin(μ))
      const cosM = Math.cos(mu);
      const sinM = Math.sin(mu);

      const numerador = P * cosM * (L - d);
      const denominador = cosM * L + c * sinM;

      if (!(denominador > 0)) {
        setOut("vol_fb_out", "Configuración inválida", true);
        setOut("vol_fa_out", "Configuración inválida", true);
        return;
      }

      const FB = numerador / denominador;
      const FA = P - FB;

      setOut("vol_fb_out", `${fmt(FB, 2)} t`, false);
      setOut("vol_fa_out", `${fmt(FA, 2)} t`, false);
    });

    bindEnter(["vol_p", "vol_l", "vol_d", "vol_c", "vol_angulo"], "btn_vol");

    /* =========================
       05 Dos grúas (P, DT, DT1, DT2)
       TA=(P*DT2)/DT ; TB=(P*DT1)/DT
       ========================= */
    document.getElementById("btn_g2")?.addEventListener("click", () => {
      const P = parseNum(document.getElementById("g2_p")?.value);
      const DT_in = parseNum(document.getElementById("g2_dt")?.value);
      const DT1 = parseNum(document.getElementById("g2_dt1")?.value);
      const DT2 = parseNum(document.getElementById("g2_dt2")?.value);

      const bad = requireNums([[P, "P"], [DT1, "DT1"], [DT2, "DT2"]]);
      if (bad.length) {
        setOut("g2_ta", "—", true);
        setOut("g2_tb", "—", true);
        return;
      }

      let DT = DT_in;
      if (!Number.isFinite(DT) || DT <= 0) DT = DT1 + DT2;

      if (!(P > 0 && DT1 > 0 && DT2 > 0 && DT > 0)) {
        setOut("g2_ta", "Datos inválidos", true);
        setOut("g2_tb", "Datos inválidos", true);
        return;
      }

      // si el usuario metió DT, validamos coherencia (tolerancia)
      const sum = DT1 + DT2;
      if (Number.isFinite(DT_in) && DT_in > 0) {
        const tol = Math.max(1e-6, sum * 0.02); // 2% tolerancia
        if (Math.abs(DT_in - sum) > tol) {
          setOut("g2_ta", "DT no cuadra con DT1+DT2", true);
          setOut("g2_tb", "DT no cuadra con DT1+DT2", true);
          return;
        }
      }

      const TA = (P * DT2) / DT;
      const TB = (P * DT1) / DT;

      setOut("g2_ta", fmt(TA, 2), false);
      setOut("g2_tb", fmt(TB, 2), false);
    });

    bindEnter(["g2_p", "g2_dt", "g2_dt1", "g2_dt2"], "btn_g2");

    /* =========================
       06 Suelo (kg/cm2)
       ========================= */
    document.getElementById("btn_suelo")?.addEventListener("click", () => {
      const cargaRaw = parseNum(document.getElementById("suelo_carga")?.value);
      const unit = document.getElementById("suelo_unit")?.value || "t";
      const anchoCm = parseNum(document.getElementById("suelo_ancho")?.value);
      const largoCm = parseNum(document.getElementById("suelo_largo")?.value);

      const bad = requireNums([[cargaRaw, "Carga"], [anchoCm, "Ancho"], [largoCm, "Largo"]]);
      if (bad.length) {
        setOut("suelo_out", "Introduce carga, ancho y largo válidos", true);
        return;
      }

      const cargaKg = weightToKg(cargaRaw, unit);
      if (!Number.isFinite(cargaKg) || !(cargaKg > 0)) {
        setOut("suelo_out", "Carga inválida", true);
        return;
      }

      const areaCm2 = anchoCm * largoCm;
      if (!(areaCm2 > 0)) {
        setOut("suelo_out", "Área inválida", true);
        return;
      }

      const pres = cargaKg / areaCm2; // kg/cm2
      setOut("suelo_out", `${fmt(pres, 4)} kg/cm²`, false);
    });

    bindEnter(["suelo_carga", "suelo_ancho", "suelo_largo"], "btn_suelo");
  </script>
</body>

</html>
