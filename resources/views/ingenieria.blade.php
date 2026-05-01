<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('INGENIERÍA – LIFT') }}</title>

  {{-- SEO Meta --}}
  <meta name="description"
    content="{{ __('Servicios de ingeniería especializados en grúas, elementos de tracción y movimientos mecánicos de cargas para la gran industria. Estudios técnicos, diseño de estructuras y transportes especiales.') }}" />
  <meta name="author" content="LIFT Ingeniería S.L." />
  <meta name="theme-color" content="#ff3333" />
  <link rel="canonical" href="{{ url()->current() }}" />

  {{-- Open Graph --}}
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
  <meta property="og:site_name" content="LIFT Ingeniería" />
  <meta property="og:title" content="{{ __('INGENIERÍA – LIFT') }}" />
  <meta property="og:description"
    content="{{ __('Servicios de ingeniería especializados en grúas, elementos de tracción y movimientos mecánicos de cargas para la gran industria.') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ __('INGENIERÍA – LIFT') }}" />
  <meta name="twitter:description"
    content="{{ __('Servicios de ingeniería especializados en grúas, elementos de tracción y movimientos mecánicos de cargas.') }}" />
  <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Favicon --}}
  @include('components.favicons')

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root {
      --liftRed: #ff3333;
      --liftDark: #0b1020;
      --liftInk: #0f172a;
      --ease: cubic-bezier(.16, 1, .3, 1);
      --shadowSoft: 0 18px 55px rgba(2, 6, 23, .12);
      --shadowGlow: 0 20px 70px rgba(255, 51, 51, .12);

      /* Responsive tokens */
      --container: 80rem;
      /* ~1280px */
      --gutter: clamp(1rem, 3vw, 2rem);
      --sectionY: clamp(3.25rem, 6vw, 6rem);
      --radius: clamp(18px, 2vw, 28px);
      --navH: 96px;
      /* set via JS */

      /* Type scale */
      --h1: clamp(2.05rem, 4.2vw, 4rem);
      --h2: clamp(1.9rem, 3vw, 2.5rem);
      --h2xl: clamp(2rem, 3.5vw, 3rem);
      --p: clamp(1.02rem, 1.15vw, 1.15rem);

      /* Media height clamps */
      --mediaMax: 560px;
      --mediaVH: 62dvh;
      --mediaMin: clamp(15.5rem, 38vw, 28rem);

      --tap: 44px;
    }

    /* ===== Base hardening ===== */
    html,
    body {
      overflow-x: clip;
    }

    #ingenieria-page {
      font-family: "Roboto", system-ui, -apple-system, Segoe UI, Inter, sans-serif;
      text-rendering: optimizeLegibility;
      -webkit-font-smoothing: antialiased;
      background: #fff;
      color: #0f172a;
    }

    #ingenieria-page p,
    #ingenieria-page h1,
    #ingenieria-page h2,
    #ingenieria-page h3,
    #ingenieria-page h4 {
      text-wrap: pretty;
    }

    #ingenieria-page a,
    #ingenieria-page span {
      word-break: break-word;
    }

    #ingenieria-page .font-heading {
      font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Inter, sans-serif;
    }

    #ingenieria-page .u-container {
      width: min(100% - (var(--gutter) * 2), var(--container));
      margin-inline: auto;
    }

    #ingenieria-page .scrollbar {
      position: fixed;
      left: 0;
      top: 0;
      height: 3px;
      width: 0;
      z-index: 70;
      background: linear-gradient(90deg, var(--liftRed), #ff8a8a, var(--liftRed));
      box-shadow: 0 12px 30px rgba(255, 51, 51, .22);
    }

    #ingenieria-page [id] {
      scroll-margin-top: calc(var(--navH) + 18px);
    }

    #ingenieria-page .reveal {
      opacity: 0;
      transform: translateY(16px);
      filter: blur(10px);
    }

    #ingenieria-page .reveal.is-in {
      opacity: 1;
      transform: translateY(0);
      filter: blur(0);
      transition: opacity .85s var(--ease), transform .95s var(--ease), filter .95s var(--ease);
    }

    #ingenieria-page .reveal.is-in[data-delay="1"] {
      transition-delay: 80ms;
    }

    #ingenieria-page .reveal.is-in[data-delay="2"] {
      transition-delay: 140ms;
    }

    #ingenieria-page .reveal.is-in[data-delay="3"] {
      transition-delay: 210ms;
    }

    #ingenieria-page .reveal.is-in[data-delay="4"] {
      transition-delay: 280ms;
    }

    @media (max-width: 640px) {
      #ingenieria-page .reveal {
        opacity: 1 !important;
        transform: none !important;
        filter: none !important;
      }

      #ingenieria-page .reveal.is-in {
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

    #ingenieria-page .grad-text {
      background-image: linear-gradient(90deg, var(--liftRed), #ff7a7a, var(--liftRed));
      background-size: 200% 200%;
      animation: drift 6s ease infinite;
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    #ingenieria-page .glass-nav {
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      background: rgba(255, 255, 255, .82);
      border-bottom: 1px solid rgba(2, 6, 23, .06);
      transition: background .3s var(--ease), box-shadow .3s var(--ease), transform .3s var(--ease);
    }

    #ingenieria-page .glass-nav.is-scrolled {
      background: rgba(255, 255, 255, .92);
      box-shadow: 0 12px 40px rgba(2, 6, 23, .08);
    }

    #ingenieria-page .navlink {
      position: relative;
      display: inline-flex;
      align-items: center;
      gap: .45rem;
      font-family: "Montserrat", system-ui, sans-serif;
      font-weight: 800;
      letter-spacing: .22em;
      text-transform: uppercase;
      font-size: .72rem;
      color: rgba(15, 23, 42, .62);
      transition: color .25s var(--ease);
      white-space: nowrap;
    }

    #ingenieria-page .navlink:hover {
      color: var(--liftRed);
    }

    #ingenieria-page .navlink::after {
      content: "";
      position: absolute;
      left: 50%;
      bottom: -12px;
      width: 0%;
      height: 2px;
      transform: translateX(-50%);
      background: linear-gradient(90deg, transparent, var(--liftRed), transparent);
      transition: width .35s var(--ease);
      filter: drop-shadow(0 0 10px rgba(255, 51, 51, .35));
    }

    #ingenieria-page .navlink:hover::after {
      width: 110%;
    }

    #ingenieria-page .navlink[aria-current="page"] {
      color: var(--liftRed);
    }

    #ingenieria-page .navlink[aria-current="page"]::after {
      width: 110%;
    }

    #ingenieria-page .g-border {
      position: relative;
    }

    #ingenieria-page .g-border::before {
      content: "";
      position: absolute;
      inset: -1px;
      z-index: -1;
      background: linear-gradient(120deg, rgba(255, 51, 51, .58), rgba(15, 23, 42, .24), rgba(255, 51, 51, .28));
      border-radius: inherit;
      filter: blur(.18px);
    }

    #ingenieria-page .btn-press {
      transition: all .3s var(--ease);
    }

    #ingenieria-page .btn-press:active {
      transform: translateY(1px) scale(.99);
    }

    #ingenieria-page .chip {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      padding: .6rem .95rem;
      border-radius: 999px;
      border: 1px solid rgba(148, 163, 184, .35);
      background: rgba(255, 255, 255, .82);
      font-family: "Montserrat", system-ui, sans-serif;
      font-weight: 800;
      letter-spacing: .16em;
      text-transform: uppercase;
      font-size: .66rem;
      color: rgba(15, 23, 42, .7);
      transition: background .25s var(--ease), border-color .25s var(--ease), color .25s var(--ease), transform .25s var(--ease);
      box-shadow: 0 10px 30px rgba(2, 6, 23, .06);
    }

    #ingenieria-page .chip:hover {
      border-color: rgba(255, 51, 51, .35);
      background: rgba(255, 51, 51, .06);
      color: var(--liftRed);
      transform: translateY(-1px);
    }

    #ingenieria-page .card {
      border-radius: var(--radius);
      border: 1px solid rgba(226, 232, 240, .9);
      background: #fff;
      overflow: hidden;
      transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s var(--ease);
    }

    #ingenieria-page .card:hover {
      transform: translateY(-6px);
      border-color: rgba(255, 51, 51, .18);
      box-shadow: var(--shadowSoft);
    }

    #ingenieria-page .card-media {
      position: relative;
      overflow: hidden;
      background: #0b1020;
      aspect-ratio: 16 / 9;
      min-height: clamp(9rem, 18vw, 13rem);
    }

    #ingenieria-page .card-media img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1.02);
      transition: transform .9s var(--ease), filter .9s var(--ease);
      filter: saturate(1.03) contrast(1.03);
    }

    #ingenieria-page .card:hover .card-media img {
      transform: scale(1.1);
    }

    #ingenieria-page .card-media::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(2, 6, 23, .35), transparent 55%);
      pointer-events: none;
    }

    #ingenieria-page .dark-panel {
      background:
        radial-gradient(1200px 600px at 10% -20%, rgba(255, 51, 51, .18), transparent 55%),
        radial-gradient(900px 520px at 110% 15%, rgba(30, 58, 138, .18), transparent 60%),
        #0b1020;
      border-top: 1px solid rgba(255, 255, 255, .06);
      border-bottom: 1px solid rgba(255, 255, 255, .06);
    }

    #ingenieria-page .mMenu {
      transform: translateY(-14px);
      opacity: 0;
      pointer-events: none;
      transition: transform .35s var(--ease), opacity .35s var(--ease);
    }

    #ingenieria-page .mMenu[data-open="true"] {
      transform: translateY(0);
      opacity: 1;
      pointer-events: auto;
    }

    #ingenieria-page .tilt {
      transform-style: preserve-3d;
      will-change: transform;
    }

    @media (prefers-reduced-motion: reduce) {

      #ingenieria-page .reveal,
      #ingenieria-page .reveal.is-in {
        transition: none !important;
        filter: none !important;
        transform: none !important;
        opacity: 1 !important;
      }

      #ingenieria-page .grad-text {
        animation: none !important;
      }

      #ingenieria-page .scrollbar {
        display: none;
      }
    }

    @media (max-height: 800px) {
      :root {
        --sectionY: clamp(2.5rem, 5vw, 4.5rem);
        --mediaVH: 56dvh;
        --mediaMax: 520px;
      }
    }

    /* ======= Responsive hardening (key fixes) ======= */
    #ingenieria-page .hero-section {
      padding-top: calc(var(--navH) + clamp(1.25rem, 4vw, 2.25rem));
      padding-bottom: clamp(2.75rem, 7vw, 5.75rem);
    }

    @@supports not (min-height: 100dvh) {
      #ingenieria-page .hero-section {
        min-height: 100vh;
      }
    }

    #ingenieria-page .hero-media {
      aspect-ratio: 4 / 3;
      height: min(var(--mediaVH), var(--mediaMax));
      min-height: var(--mediaMin);
    }

    @media (min-width: 1536px) {
      :root {
        --mediaMax: 620px;
        --container: 86rem;
      }
    }

    #ingenieria-page .review-tile {
      min-height: clamp(12.5rem, 38vw, 16rem);
      max-height: clamp(12.5rem, 38vw, 16rem);
      position: relative;
    }

    #ingenieria-page .review-tile>img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    #ingenieria-page img {
      max-width: 100%;
      height: auto;
    }

    @media (hover: none) and (pointer: coarse) {
      #ingenieria-page .card:hover {
        transform: none;
        box-shadow: none;
      }

      #ingenieria-page .card:hover .card-media img {
        transform: scale(1.04);
      }

      #ingenieria-page .chip:hover {
        transform: none;
      }

      #ingenieria-page .navlink::after {
        display: none;
      }
    }

    /* =========================================================
       MOBILE OVERRIDE FINAL (solo móvil)
       - Añade grid en móvil (no todo apilado)
       - Ingenieria cards: 2 columnas
       - Revisión: bento 2 columnas
       - Personal: 2 columnas
       ========================================================= */
    @media (max-width: 640px) {

      html,
      body {
        overflow-x: hidden !important;
      }

      :root {
        --gutter: 1rem;
        --sectionY: clamp(2.25rem, 7vw, 3.75rem);
        --p: clamp(1rem, 3.8vw, 1.08rem);
        --h1: clamp(1.95rem, 7.5vw, 2.6rem);
        --h2: clamp(1.55rem, 6.2vw, 2.05rem);
        --h2xl: clamp(1.7rem, 6.8vw, 2.35rem);
        --radius: 22px;
      }

      #ingenieria-page .u-container {
        width: min(100% - 2rem, var(--container));
      }

      /* HERO */
      #ingenieria-page .hero-section {
        padding-top: calc(var(--navH) + 16px) !important;
        padding-bottom: 40px !important;
        min-height: auto !important;
      }

      #ingenieria-page .hero-section.-mt-10 {
        margin-top: 0 !important;
      }

      #ingenieria-page .hero-section .grid {
        grid-template-columns: 1fr !important;
        gap: 1.25rem !important;
      }

      #ingenieria-page .navlink,
      #ingenieria-page .chip {
        letter-spacing: .11em !important;
      }

      #ingenieria-page .hero-section h1 {
        line-height: 1.05 !important;
        letter-spacing: -0.02em !important;
      }

      #ingenieria-page .hero-section p {
        max-width: 62ch !important;
        font-size: var(--p) !important;
      }

      #ingenieria-page .hero-section .btn-press {
        width: 100% !important;
        min-height: var(--tap) !important;
      }

      #ingenieria-page .hero-section .flex.flex-col.sm\:flex-row {
        gap: .75rem !important;
      }

      #ingenieria-page .hero-section .hero-media {
        aspect-ratio: 16 / 10 !important;
        height: auto !important;
        min-height: 0 !important;
        max-height: none !important;
      }

      #ingenieria-page .g-border.rounded-3xl,
      #ingenieria-page .rounded-3xl {
        border-radius: var(--radius) !important;
      }

      #ingenieria-page .hero-section .absolute.bottom-5 {
        bottom: 12px !important;
        left: 12px !important;
        right: 12px !important;
      }

      #ingenieria-page .hero-section p.text-white\/75 {
        font-size: .9rem !important;
        max-width: 44ch !important;
      }

      /* INGENIERIA cards: 2 columnas en móvil (en vez de 1 apilado) */
      #ingenieria-page #ingenieria .grid {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        gap: .9rem !important;
      }

      /* Si prefieres 1 columna en móviles MUY estrechos */
      @media (max-width: 380px) {
        #ingenieria-page #ingenieria .grid {
          grid-template-columns: 1fr !important;
        }

        #ingenieria-page .navlink,
        #ingenieria-page .chip {
          letter-spacing: .10em !important;
        }
      }

      #ingenieria-page .card .p-6 {
        padding: 1.05rem !important;
      }

      #ingenieria-page .card-media {
        aspect-ratio: 16/10 !important;
        min-height: 0 !important;
      }

      #ingenieria-page .card h3 {
        font-size: 1rem !important;
        line-height: 1.15 !important;
      }

      #ingenieria-page .card p {
        font-size: .82rem !important;
      }

      #ingenieria-page .card ul {
        margin-top: .8rem !important;
      }

      /* SUPERVISION / REALIZACION media */
      #ingenieria-page #supervision .hero-media,
      #ingenieria-page #realizacion .hero-media {
        aspect-ratio: 4 / 3 !important;
        height: auto !important;
        min-height: 0 !important;
      }

      /* REVISION bento: 2 columnas compactas */
      #ingenieria-page #revision .grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 0.75rem !important;
      }

      #ingenieria-page .review-tile {
        min-height: 0 !important;
        height: auto !important;
        aspect-ratio: 1 / 1 !important;
        border-radius: 18px !important;
      }

      #ingenieria-page .review-tile img {
        height: 100% !important;
        width: 100% !important;
        object-fit: cover !important;
      }

      #ingenieria-page .review-tile .absolute.bottom-6 {
        bottom: 12px !important;
        left: 12px !important;
        right: 12px !important;
      }

      #ingenieria-page .review-tile h3 {
        font-size: 0.8rem !important;
        line-height: 1.2 !important;
      }

      #ingenieria-page .review-tile p {
        font-size: 0.65rem !important;
        line-height: 1.15 !important;
        margin-top: 4px !important;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }

      #ingenieria-page .review-tile.sm\:col-span-2 {
        grid-column: span 1 !important;
      }

      /* Auditorías: ancho completo */
      #ingenieria-page #auditorias {
        grid-column: 1 / -1 !important;
        padding: 1.05rem !important;
        min-height: auto !important;
      }

      /* ESTANDAR CTA full */
      #ingenieria-page #estandar {
        padding: 1.15rem !important;
        border-radius: var(--radius) !important;
      }

      #ingenieria-page #estandar a {
        width: 100% !important;
        min-height: var(--tap) !important;
      }

      /* PERSONAL: 2 columnas en móvil (en vez de 1 apilado) */
      #ingenieria-page #ejecucion .grid {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        gap: .9rem !important;
      }

      #ingenieria-page #ejecucion .w-16.h-16 {
        width: 56px !important;
        height: 56px !important;
        border-radius: 18px !important;
      }

      /* Dark panels: menos aire */
      #ingenieria-page .dark-panel {
        padding-block: 3.25rem !important;
      }

      #ingenieria-page .dark-panel .grid {
        gap: 1.15rem !important;
      }

      @@supports (-webkit-touch-callout: none) {
        #ingenieria-page .hero-section {
          min-height: auto !important;
        }
      }
    }
  </style>
</head>

<body class="antialiased selection:bg-red-100 selection:text-slate-900">
  <div class="scrollbar" id="scrollbar"></div>

  <!-- NAV -->
  <x-header />

  <main id="ingenieria-page">
    <!-- HERO -->
    <section class="hero-section relative overflow-hidden flex flex-col justify-center">
      <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div
          class="absolute -top-[22%] -left-[12%] w-[72vw] h-[72vw] rounded-full blur-[130px] bg-red-500/10 animate-[glow_9s_ease-in-out_infinite]">
        </div>
        <div
          class="absolute top-[28%] -right-[12%] w-[62vw] h-[62vw] rounded-full blur-[115px] bg-slate-900/5 animate-[glow_11s_ease-in-out_infinite]"
          style="animation-delay: 2.1s"></div>

        <div class="absolute inset-0 opacity-[0.18]"
          style="background-image: radial-gradient(rgba(15,23,42,0.10) 1px, transparent 1px); background-size: 28px 28px;">
        </div>
      </div>

      <div class="relative u-container">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-center">
          <div class="lg:col-span-6">
            <div class="reveal inline-flex items-center gap-3 mb-6" data-delay="1">
              <span class="h-px w-12 bg-(--liftRed)"></span>
              <span class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-(--liftRed)">
                {{ __('Servicios Técnicos') }}
              </span>
            </div>

            <h1 class="reveal font-heading font-black tracking-tight leading-[1.05] text-slate-900 uppercase"
              data-delay="2" style="font-size: var(--h1)">
              {{ $page->getBlock('main_heading_1', 'DISEÑO Y') }} <br />
              <span class="grad-text">{{ $page->getBlock('main_heading_highlight', 'CÁLCULO DE MANIOBRAS') }}</span>
            </h1>

            <p class="reveal mt-6 text-slate-600 leading-relaxed" data-delay="3"
              style="font-size: var(--p); max-width: 52ch">
              {{ __('Estudiamos la viabilidad técnica, diseñamos estructuras y definimos rutas para transportes especiales. Desde la planificación hasta la ejecución, garantizando seguridad, control del riesgo y eficiencia operativa.') }}
            </p>

            <div class="reveal mt-9 flex flex-col sm:flex-row gap-3" data-delay="4">
              <a href="#ingenieria"
                class="group btn-press inline-flex items-center justify-center gap-2 rounded-full bg-(--liftRed) px-7 py-3.5 text-white shadow-[0_22px_70px_rgba(255,51,51,.20)] hover:brightness-[1.22] transition font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase duration-300 hover:scale-105">
                {{ __('Ver capacidades') }}
                <i
                  class="fa-solid fa-arrow-down text-xs transition-transform duration-300 group-hover:translate-y-1"></i>
              </a>

              <a href="{{ route('contacto') }}"
                class="group btn-press inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 bg-white/80 px-7 py-3.5 text-slate-900 hover:bg-white transition font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase duration-300 hover:scale-105">
                {{ __('Solicitar asesoramiento') }}
                <i
                  class="fa-solid fa-arrow-right text-xs text-slate-500 transition-transform duration-300 group-hover:translate-x-1"></i>
              </a>
            </div>
          </div>

          <!-- HERO IMAGE -->
          <div class="lg:col-span-6 relative">
            <div class="reveal g-border rounded-3xl overflow-hidden shadow-[0_30px_90px_rgba(2,6,23,.12)]"
              data-delay="2">
              <div class="relative">
                <div class="w-full overflow-hidden rounded-3xl hero-media">
                  <img src="{{ $page->getBlockSrc('hero_main_image', 'uploads/2022/03/superior-banco.jpg') }}"
                    alt="Ingeniería Estructural" class="w-full h-full object-cover scale-135" loading="eager" />
                </div>

                <div
                  class="absolute inset-0 bg-linear-to-t from-slate-950/60 via-slate-950/10 to-transparent pointer-events-none">
                </div>

                <div class="absolute bottom-5 left-5 right-5 sm:bottom-6 sm:left-6 sm:right-6">
                  <div
                    class="inline-flex items-center gap-2 rounded-full bg-white/10 border border-white/15 px-3 py-1.5 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-(--liftRed)"></span>
                    <span class="text-[10px] font-heading font-extrabold uppercase tracking-[0.28em] text-white/85">
                      {{ __('Equipo técnico') }}
                    </span>
                  </div>

                  <p class="mt-3 text-white font-heading font-black leading-tight"
                    style="font-size: clamp(1.15rem, 2.2vw, 1.6rem)">
                    {{ __('Ingeniería y cálculo de maniobras') }}
                  </p>
                  <p class="mt-1 text-white/75 text-sm max-w-md">
                    {{ __('Soluciones a medida para maniobras críticas con enfoque industrial.') }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- /HERO IMAGE -->
        </div>
      </div>
    </section>

    <!-- INGENIERIA -->
    <section id="ingenieria" class="bg-slate-50 relative" style="padding-block: var(--sectionY)">
      <div class="u-container">
        <div class="mb-12 max-w-2xl">
          <div class="reveal" data-delay="1">
            <p class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-(--liftRed)">
              {{ __('Área 01') }}
            </p>
            <h2 class="font-heading font-black text-slate-900 mt-2" style="font-size: var(--h2)">{{ __('Ingeniería') }}
            </h2>
            <p class="text-slate-600 mt-4">
              {{ __('Estudiamos la viabilidad técnica y el posible desarrollo de cada proyecto, definiendo en detalle todas las opciones para la correcta ejecución del trabajo y garantizando su viabilidad.') }}
            </p>
          </div>
        </div>

        <!-- OJO: aquí lo dejamos como estaba (Tailwind), pero el CSS mobile override fuerza 2 columnas -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
          <article class="reveal card" data-delay="1">
            <div class="card-media">
              <img
                src="{{ optional($page ?? null)->getBlockSrc('card_1_image', 'uploads/2022/06/ATLANTIC-COPPER-editada.jpg') ?? \App\Models\Page::resolveBlockSrc('uploads/2022/06/ATLANTIC-COPPER-editada.jpg') }}"
                alt="Estudios Técnicos" loading="lazy" />
            </div>
            <div class="p-6">
              <h3 class="font-heading font-black text-xl text-slate-900 hover:text-(--liftRed) transition">
                {{ __('Estudios técnicos') }}
              </h3>
              <p class="text-sm text-slate-600 mt-3 leading-relaxed hidden md:block">
                {{ __('Estudiamos la viabilidad técnica definiendo medios, secuencia y riesgos. Mediante maquetación 3D de última tecnología se delimitan los obstáculos, dando una visión real del trabajo en sus diferentes variables.') }}
              </p>
              <ul class="mt-5 space-y-2">
                <li class="flex items-start gap-2 text-xs text-slate-500 font-medium">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-500 mt-1.5 shrink-0"></span>
                  {{ __('Delimitación de obstáculos en 3D') }}
                </li>
                <li class="flex items-start gap-2 text-xs text-slate-500 font-medium">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-500 mt-1.5 shrink-0"></span>
                  {{ __('Secuencia + análisis de riesgos') }}
                </li>
                <li class="flex items-start gap-2 text-xs text-slate-500 font-medium">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-500 mt-1.5 shrink-0"></span>
                  {{ __('Equilibrio impacto / coste de ejecución') }}
                </li>
              </ul>
            </div>
          </article>

          <article class="reveal card flex flex-col h-full" data-delay="2">
            <div class="card-media">
              <img
                src="{{ optional($page ?? null)->getBlockSrc('card_2_image', 'uploads/2022/03/superior-banco.jpg') ?? \App\Models\Page::resolveBlockSrc('uploads/2022/03/superior-banco.jpg') }}"
                alt="Cálculo de estructuras" loading="lazy" />
            </div>
            <div class="p-6 flex flex-col flex-1">
              <h3 class="font-heading font-black text-xl text-slate-900 hover:text-(--liftRed) transition">
                {{ __('Diseño y cálculo de estructuras') }}
              </h3>
              <p class="text-sm text-slate-600 mt-3 leading-relaxed flex-1 hidden md:block">
                {{ __('Como ingeniería especializada en diseño estructural, alcanzamos las mejores soluciones técnicas según el tipo, dimensión y complejidad del trabajo. Nos implicamos desde la fase conceptual hasta la construcción, reduciendo costes y tiempo.') }}
              </p>
              <ul class="mt-5 space-y-2">
                <li class="flex items-start gap-2 text-xs text-slate-500 font-medium">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-500 mt-1.5 shrink-0"></span>
                  {{ __('Diseños 3D, planos de detalle y cálculos justificativos') }}
                </li>
                <li class="flex items-start gap-2 text-xs text-slate-500 font-medium">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-500 mt-1.5 shrink-0"></span>
                  {{ __('Definición de procesos constructivos') }}
                </li>
              </ul>
              <div class="mt-6 pt-6 border-t border-slate-100 flex justify-end">
                <a href="{{ route('diseno-estructuras') }}"
                  class="btn-press group inline-flex items-center gap-2 text-[10px] font-heading font-extrabold uppercase tracking-widest text-slate-400 hover:text-(--liftRed) transition-colors duration-300 hover:scale-105">
                  {{ __('Ver más') }}
                  <i
                    class="fa-solid fa-arrow-right text-[10px] transition-transform duration-300 group-hover:translate-x-1"></i>
                </a>
              </div>
            </div>
          </article>

          <article class="reveal card flex flex-col h-full" data-delay="3">
            <div class="card-media">
              <img
                src="{{ optional($page ?? null)->getBlockSrc('card_3_image', 'uploads/2022/03/sines-aurora.png') ?? \App\Models\Page::resolveBlockSrc('uploads/2022/03/sines-aurora.png') }}"
                alt="Transportes especiales" loading="lazy" />
            </div>
            <div class="p-6 flex flex-col flex-1">
              <h3 class="font-heading font-black text-xl text-slate-900 hover:text-(--liftRed) transition">
                {{ __('Estudios de viabilidad para transportes especiales') }}
              </h3>
              <p class="text-sm text-slate-600 mt-3 leading-relaxed flex-1 hidden md:block">
                {{ __('Definimos la ruta, directrices y condicionantes necesarios para transportar equipos desde su origen hasta su destino. Comprobamos in situ el itinerario completo e identificamos los medios más idóneos.') }}
              </p>
              <ul class="mt-5 space-y-2">
                <li class="flex items-start gap-2 text-xs text-slate-500 font-medium">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-500 mt-1.5 shrink-0"></span>
                  {{ __('Viabilidad geométrica y de paso sobre estructuras') }}
                </li>
                <li class="flex items-start gap-2 text-xs text-slate-500 font-medium">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-500 mt-1.5 shrink-0"></span>
                  {{ __('Cálculos de ángulos de giro, firmes y pasos') }}
                </li>
              </ul>
              <div class="mt-6 pt-6 border-t border-white flex justify-end">

              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- SUPERVISION -->
    <section id="supervision" class="dark-panel text-white relative overflow-hidden"
      style="padding-block: clamp(4rem, 7vw, 6.5rem)">
      <div class="u-container relative z-10">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">
          <div class="reveal" data-delay="1">
            <div class="inline-flex items-center gap-3 mb-5">
              <span class="h-px w-10 bg-(--liftRed)"></span>
              <span class="font-heading text-[10px] tracking-[0.38em] uppercase font-extrabold text-red-300">
                {{ __('Soporte en campo') }}
              </span>
            </div>

            <h2 class="font-heading font-black mb-6" style="font-size: var(--h2xl)">
              {{ __('Supervisión &') }} <br />
              {{ __('Asistencia técnica') }}
            </h2>

            <p class="text-slate-300 mb-8" style="font-size: clamp(1.05rem, 1.2vw, 1.15rem)">
              {{ __('Apoyo técnico en movimientos mecánicos de cargas a otros departamentos ejecutantes de paradas de mantenimiento, proyectos y obra nueva.') }}
            </p>

            <div class="grid sm:grid-cols-2 gap-4">
              <div class="flex gap-3 items-center bg-white/5 p-3.5 rounded-xl border border-white/10">
                <i class="fa-solid fa-check text-(--liftRed)"></i>
                <span class="text-sm font-medium">{{ __('Aprobación de Lifting Plans') }}</span>
              </div>
              <div class="flex gap-3 items-center bg-white/5 p-3.5 rounded-xl border border-white/10">
                <i class="fa-solid fa-check text-(--liftRed)"></i>
                <span class="text-sm font-medium">{{ __('Planificación y optimización de recursos') }}</span>
              </div>
              <div class="flex gap-3 items-center bg-white/5 p-3.5 rounded-xl border border-white/10">
                <i class="fa-solid fa-check text-(--liftRed)"></i>
                <span class="text-sm font-medium">{{ __('Gestión de recursos mecánicos') }}</span>
              </div>
              <div class="flex gap-3 items-center bg-white/5 p-3.5 rounded-xl border border-white/10">
                <i class="fa-solid fa-check text-(--liftRed)"></i>
                <span class="text-sm font-medium">{{ __('Revisión del material de elevación') }}</span>
              </div>
              <div class="flex gap-3 items-center bg-white/5 p-3.5 rounded-xl border border-white/10">
                <i class="fa-solid fa-check text-(--liftRed)"></i>
                <span class="text-sm font-medium">{{ __('Gestión de equipos pesados') }}</span>
              </div>
              <div class="flex gap-3 items-center bg-white/5 p-3.5 rounded-xl border border-white/10">
                <i class="fa-solid fa-check text-(--liftRed)"></i>
                <span class="text-sm font-medium">{{ __('Asumimos las responsabilidades del cliente') }}</span>
              </div>
            </div>

            <div class="mt-9 flex flex-col sm:flex-row gap-3">
              <a href="https://lift-es.com/contacto/"
                class="group btn-press inline-flex items-center justify-center gap-2 rounded-full bg-(--liftRed) px-7 py-3.5 text-white shadow-[0_22px_70px_rgba(255,51,51,.18)] transition font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase duration-300 hover:scale-105">
                {{ __('Pedir soporte') }}
                <i
                  class="fa-solid fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
              </a>
              <a href="#revision"
                class="group btn-press inline-flex items-center justify-center gap-2 rounded-full border border-white/15 bg-white/5 px-7 py-3.5 text-white transition font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase duration-300 hover:scale-105">
                {{ __('Ver revisión') }}
                <i
                  class="fa-solid fa-arrow-down text-xs transition-transform duration-300 group-hover:translate-y-1"></i>
              </a>
            </div>
          </div>

          <div class="reveal relative" data-delay="2">
            <div class="g-border rounded-4xl overflow-hidden shadow-[0_28px_90px_rgba(0,0,0,.28)] bg-white p-2 sm:p-4">
              <div class="hero-media rounded-2xl overflow-hidden" style="height: min(60dvh, var(--mediaMax));">
                <img src="{{ $page->getBlockSrc('supervision_image', 'uploads/2022/03/imforme.jpg') }}"
                  alt="Supervisión"
                  class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700"
                  loading="lazy" />
              </div>
            </div>
            <div class="absolute -bottom-6 -left-6 hidden sm:block">
              <div class="rounded-2xl bg-white/8 border border-white/12 backdrop-blur-md px-5 py-4">
                <p class="text-[10px] font-heading font-extrabold uppercase tracking-[0.28em] text-white/65">Control</p>
                <p class="mt-1 font-heading font-black text-white">{{ __('Seguridad y eficiencia') }}</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- REVISION + AUDITORIAS + ESTANDAR -->
    <section id="revision" class="bg-white" style="padding-block: var(--sectionY)">
      <div class="u-container">
        <div class="text-center max-w-3xl mx-auto mb-14 reveal">
          <span class="text-(--liftRed) font-heading font-extrabold tracking-[0.30em] text-[10px] uppercase">
            {{ __('Garantía de calidad') }}
          </span>
          <h2 class="font-heading font-black text-slate-900 mt-2" style="font-size: var(--h2)">
            {{ __('Revisión y auditorías') }}
          </h2>
          <p class="mt-4 text-slate-600">
            {{ __('Certificación de material según RD 1215/1997 e informes de mejora preventiva.') }}
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div
            class="reveal sm:col-span-2 group relative rounded-3xl overflow-hidden shadow-[0_18px_60px_rgba(2,6,23,.10)] review-tile">
            <img
              src="{{ optional($page ?? null)->getBlockSrc('review_1_image', 'https://lift-es.com/wp-content/uploads/2022/07/IDENTIFICACION-CADENAS.jpeg') ?? \App\Models\Page::resolveBlockSrc('https://lift-es.com/wp-content/uploads/2022/07/IDENTIFICACION-CADENAS.jpeg') }}"
              alt="Certificación anual"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
              loading="lazy" />
            <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-6 left-6 right-6">
              <h3 class="text-white font-heading font-black text-lg">{{ __('Certificación anual') }}</h3>
              <p class="text-white/80 text-sm mt-1">
                {{ __('Control, marcado y certificado anual del material de izado según el RD 1215/1997.') }}
              </p>
            </div>
          </div>

          <div
            class="reveal sm:col-span-2 group relative rounded-3xl overflow-hidden shadow-[0_18px_60px_rgba(2,6,23,.10)] review-tile"
            data-delay="1">
            <img
              src="{{ optional($page ?? null)->getBlockSrc('review_2_image', 'https://lift-es.com/wp-content/uploads/2022/07/20200901_122229-rotated.jpg') ?? \App\Models\Page::resolveBlockSrc('https://lift-es.com/wp-content/uploads/2022/07/20200901_122229-rotated.jpg') }}"
              alt="Pruebas de carga"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
              loading="lazy" />
            <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-6 left-6 right-6">
              <h3 class="text-white font-heading font-black text-lg">{{ __('Pruebas de carga') }}</h3>
              <p class="text-white/80 text-sm mt-1">
                {{ __('A polipastos según normativa mediante banco móvil, realizado en las instalaciones del cliente.') }}
              </p>
            </div>
          </div>

          <div
            class="reveal group relative rounded-3xl overflow-hidden shadow-[0_18px_60px_rgba(2,6,23,.10)] review-tile"
            data-delay="2">
            <img
              src="{{ optional($page ?? null)->getBlockSrc('review_3_image', 'https://lift-es.com/wp-content/uploads/2022/07/muntatgeind3.png') ?? \App\Models\Page::resolveBlockSrc('https://lift-es.com/wp-content/uploads/2022/07/muntatgeind3.png') }}"
              alt="Estado mecánico"
              class="w-full h-full object-center transition-transform duration-700 group-hover:scale-110"
              loading="lazy" />
            <div class="absolute inset-0 bg-linear-to-t from-black/85 via-transparent to-transparent"></div>
            <div class="absolute bottom-4 left-4 right-4">
              <h3 class="text-white font-heading font-black text-sm">{{ __('Estado mecánico') }}</h3>
            </div>
          </div>

          <div
            class="reveal group relative rounded-3xl overflow-hidden shadow-[0_18px_60px_rgba(2,6,23,.10)] review-tile"
            data-delay="3">
            <img
              src="{{ optional($page ?? null)->getBlockSrc('review_4_image', 'https://lift-es.com/wp-content/uploads/2022/07/CADENAS.jpeg') ?? \App\Models\Page::resolveBlockSrc('https://lift-es.com/wp-content/uploads/2022/07/CADENAS.jpeg') }}"
              alt="Inspección cualificada"
              class="w-full h-full object-contain scale-125 transition-transform duration-700 group-hover:scale-130"
              loading="lazy" />
            <div class="absolute inset-0 bg-linear-to-t from-black/85 via-transparent to-transparent"></div>
            <div class="absolute bottom-4 left-4 right-4">
              <h3 class="text-white font-heading font-black text-sm">{{ __('Inspección cualificada') }}</h3>
            </div>
          </div>

          <div id="auditorias"
            class="reveal sm:col-span-2 lg:col-span-2 bg-slate-100 border border-slate-200 rounded-3xl p-7 sm:p-8 flex flex-col justify-center shadow-[inset_0_1px_0_rgba(255,255,255,.9)]"
            data-delay="4">
            <div class="flex items-center gap-3 mb-3">
              <div class="bg-red-100 text-red-600 p-2.5 rounded-xl">
                <i class="fa-solid fa-clipboard-check"></i>
              </div>
              <h3 class="font-heading font-black text-xl text-slate-900">{{ __('Auditorías de ejecución') }}</h3>
            </div>
            <p class="text-slate-600 text-sm mb-4">
              {{ __('Minucioso informe sobre la seguridad y eficiencia durante la ejecución de un movimiento de cargas: uso de elementos, procedimientos establecidos e incidencias encontradas.') }}
            </p>
            <ul class="text-sm text-slate-500 space-y-2">
              <li>• {{ __('Revisión de procedimientos y uso de elementos') }}</li>
              <li>• {{ __('Análisis de incidencias y control documental') }}</li>
              <li>• {{ __('Mejoras preventivas para próximos proyectos de elevación') }}</li>
            </ul>
          </div>
        </div>

        <div id="estandar"
          class="mt-12 p-7 sm:p-8 rounded-[28px] bg-slate-900 text-white relative overflow-hidden reveal">
          <div class="absolute inset-0 opacity-70 pointer-events-none"
            style="background: radial-gradient(700px 320px at 15% 0%, rgba(255,51,51,.22), transparent 60%), radial-gradient(620px 360px at 100% 25%, rgba(37,99,235,.20), transparent 60%);">
          </div>

          <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
            <div class="md:w-2/3">
              <p class="text-[10px] font-heading font-extrabold uppercase tracking-[0.34em] text-white/60">
                {{ __('Área 06') }}
              </p>
              <h3 class="font-heading font-black text-2xl mt-2">{{ __('Estándar de Movimientos Mecánicos de Cargas') }}
              </h3>
              <p class="text-slate-300 mt-3">
                {{ __('Estándares específicos donde se establece la categorización de una maniobra, las medidas preventivas de cada tipo, metodología de trabajo y requisitos mínimos para su ejecución dependiendo de los riesgos de las instalaciones. Incorporamos los requisitos legales necesarios para el estricto cumplimiento de todas las personas que intervienen.') }}
              </p>
            </div>
            <div class="md:w-1/3 flex md:justify-end w-full md:w-auto">
              <a href="https://lift-es.com/contacto/"
                class="group btn-press px-7 py-3.5 bg-(--liftRed) hover:brightness-[1.02] text-white rounded-full font-heading font-extrabold uppercase tracking-[0.22em] text-[11px] transition shadow-[0_22px_70px_rgba(255,51,51,.18)] inline-flex items-center justify-center gap-2 duration-300 hover:scale-105 w-full md:w-auto">
                {{ __('Solicitar estándar') }}
                <i
                  class="fa-solid fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
              </a>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- PRECISION -->
    <section id="realizacion" class="bg-slate-50 relative" style="padding-block: clamp(4rem, 7vw, 6.5rem)">
      <div class="u-container">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12 items-center">
          <div class="lg:col-span-5 order-2 lg:order-1 reveal" data-delay="1">
            <div class="g-border rounded-3xl overflow-hidden shadow-[0_30px_90px_rgba(2,6,23,.12)]">
              <div class="overflow-hidden rounded-3xl">
                <img
                  src="{{ optional($page ?? null)->getBlockSrc('precision_image', 'https://lift-es.com/wp-content/uploads/2022/03/drone.jpg') ?? \App\Models\Page::resolveBlockSrc('https://lift-es.com/wp-content/uploads/2022/03/drone.jpg') }}"
                  alt="Drone" class="w-full h-auto block object-cover hover:scale-105 transition-transform duration-500"
                  loading="lazy" />
              </div>
            </div>
          </div>

          <div class="lg:col-span-7 order-1 lg:order-2 reveal" data-delay="2">
            <span class="text-(--liftRed) font-heading font-extrabold tracking-[0.30em] text-[10px] uppercase">
              {{ __('Tecnología') }}
            </span>
            <h2 class="font-heading font-black text-slate-900 mt-2 mb-6" style="font-size: var(--h2xl)">
              {{ __('Maniobras de precisión') }}
            </h2>
            <p class="text-slate-600 mb-8" style="font-size: clamp(1.05rem, 1.2vw, 1.15rem)">
              {{ __('Para trabajos de alto riesgo se sustituyen las personas ejecutantes por equipos de alta precisión de visión y guía. Disponemos de cámaras y láser para seguir los movimientos desde ángulos peligrosos y evitar que una persona corra el riesgo de atrapamientos.') }}
            </p>

            <div class="space-y-6">
              <div class="flex gap-4">
                <div
                  class="w-12 h-12 rounded-2xl bg-white shadow-[0_14px_40px_rgba(2,6,23,.08)] flex items-center justify-center text-(--liftRed) text-xl shrink-0">
                  <i class="fa-solid fa-robot"></i>
                </div>
                <div>
                  <h4 class="font-heading font-black text-slate-900">{{ __('Equipos de alta precisión') }}</h4>
                  <p class="text-slate-500 text-sm mt-1">
                    {{ __('Visión y guía remota para eliminar riesgos personales.') }}
                  </p>
                </div>
              </div>

              <div class="flex gap-4">
                <div
                  class="w-12 h-12 rounded-2xl bg-white shadow-[0_14px_40px_rgba(2,6,23,.08)] flex items-center justify-center text-(--liftRed) text-xl shrink-0">
                  <i class="fa-solid fa-video"></i>
                </div>
                <div>
                  <h4 class="font-heading font-black text-slate-900">{{ __('Cámaras y láser') }}</h4>
                  <p class="text-slate-500 text-sm mt-1">
                    {{ __('Monitorización desde ángulos peligrosos evitando atrapamientos.') }}
                  </p>
                </div>
              </div>
            </div>

            <div class="mt-9">
              <a href="https://lift-es.com/contacto/"
                class="group btn-press inline-flex items-center justify-center gap-2 rounded-full bg-white border border-slate-200 px-7 py-3.5 text-slate-900 hover:bg-white transition font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase duration-300 hover:scale-105">
                {{ __('Consultar viabilidad') }}
                <i
                  class="fa-solid fa-arrow-right text-xs text-slate-500 transition-transform duration-300 group-hover:translate-x-1"></i>
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- PERSONAL -->
    <section id="ejecucion" class="dark-panel text-white relative overflow-hidden"
      style="padding-block: var(--sectionY)">
      <div class="u-container relative z-10">
        <div class="text-center mb-14 reveal">
          <h2 class="font-heading font-black text-white" style="font-size: clamp(1.8rem, 2.6vw, 2.25rem)">
            {{ __('Personal de ejecución') }}
          </h2>
          <p class="text-slate-400 mt-2">{{ __('Roles especializados formados bajo estándares de seguridad.') }}</p>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-5 lg:gap-6 justify-center">
          <div class="reveal" data-delay="1">
            <div
              class="h-full p-6 rounded-3xl bg-white/5 border border-white/10 shadow-[0_18px_55px_rgba(0,0,0,.25)] hover:bg-white/10 hover:border-white/20 transition-colors duration-300 ease-out text-center">
              <div
                class="w-16 h-16 mx-auto bg-white/10 rounded-2xl flex items-center justify-center text-white text-2xl mb-4">
                <i class="fa-solid fa-user-tie"></i>
              </div>
              <h3 class="font-heading font-black text-lg mb-2 text-white">{{ __('Jefe de maniobra') }}</h3>
              <p class="text-xs text-slate-400 leading-relaxed">
                {{ __('Personal con la formación práctica y experiencia necesaria para controlar las operaciones y asegurar que se llevan a cabo de acuerdo con la sistemática de seguridad marcada por el cliente.') }}
              </p>
            </div>
          </div>

          <div class="reveal" data-delay="2">
            <div
              class="h-full p-6 rounded-3xl bg-white/5 border border-white/10 shadow-[0_18px_55px_rgba(0,0,0,.25)] hover:bg-white/10 hover:border-white/20 transition-colors duration-300 ease-out text-center">
              <div
                class="w-16 h-16 mx-auto bg-white/10 rounded-2xl flex items-center justify-center text-white text-2xl mb-4">
                <i class="fa-solid fa-clipboard-user"></i>
              </div>
              <h3 class="font-heading font-black text-lg mb-2 text-white">{{ __('Personal técnico') }}</h3>
              <p class="text-xs text-slate-400 leading-relaxed">
                {{ __('Supervisión técnica de maniobras y control de la ejecución en campo para garantizar el cumplimiento de los procedimientos.') }}
              </p>
            </div>
          </div>

          <div class="reveal" data-delay="3">
            <div
              class="h-full p-6 rounded-3xl bg-white/5 border border-white/10 shadow-[0_18px_55px_rgba(0,0,0,.25)] hover:bg-white/10 hover:border-white/20 transition-colors duration-300 ease-out text-center">
              <div
                class="w-16 h-16 mx-auto bg-white/10 rounded-2xl flex items-center justify-center text-white text-2xl mb-4">
                <i class="fa-solid fa-traffic-light"></i>
              </div>
              <h3 class="font-heading font-black text-lg mb-2 text-white">{{ __('Señalistas') }}</h3>
              <p class="text-xs text-slate-400 leading-relaxed">
                {{ __('Responsables de dirigir el movimiento de las piezas de manera segura mediante gestos, emisoras o cualquier otro sistema de comunicación.') }}
              </p>
            </div>
          </div>

          <div class="reveal" data-delay="4">
            <div
              class="h-full p-6 rounded-3xl bg-white/5 border border-white/10 shadow-[0_18px_55px_rgba(0,0,0,.25)] hover:bg-white/10 hover:border-white/20 transition-colors duration-300 ease-out text-center">
              <div
                class="w-16 h-16 mx-auto bg-white/10 rounded-2xl flex items-center justify-center text-white text-2xl mb-4">
                <i class="fa-solid fa-link"></i>
              </div>
              <h3 class="font-heading font-black text-lg mb-2 text-white">{{ __('Eslingadores') }}</h3>
              <p class="text-xs text-slate-400 leading-relaxed">
                {{ __('Encargados de aplicar las técnicas necesarias para asegurar la carga a un elemento de elevación o tracción, utilizando los equipos y accesorios requeridos.') }}
              </p>
            </div>
          </div>

          <div class="reveal" data-delay="5">
            <div
              class="h-full p-6 rounded-3xl bg-white/5 border border-white/10 shadow-[0_18px_55px_rgba(0,0,0,.25)] hover:bg-white/10 hover:border-white/20 transition-colors duration-300 ease-out text-center">
              <div
                class="w-16 h-16 mx-auto bg-white/10 rounded-2xl flex items-center justify-center text-white text-2xl mb-4">
                <i class="fa-solid fa-truck-monster"></i>
              </div>
              <h3 class="font-heading font-black text-lg mb-2 text-white">{{ __('Control de tráfico') }}</h3>
              <p class="text-xs text-slate-400 leading-relaxed">
                {{ __('Gestionan y organizan los accesos de vehículos pesados en las diferentes áreas de planta con la seguridad y coordinación que se precisa.') }}
              </p>
            </div>
          </div>
        </div>

        <div class="mt-14 reveal">
          <div
            class="rounded-[28px] border border-white/10 bg-white/5 p-7 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-7">
            <div class="max-w-2xl">
              <p class="text-[10px] font-heading font-extrabold uppercase tracking-[0.34em] text-slate-400">
                {{ __('Siguiente paso') }}
              </p>
              <h3 class="mt-2 font-heading font-black text-2xl text-white">{{ __('Cuéntanos tu caso') }}</h3>
              <p class="mt-2 text-slate-400">
                {{ __('Peso, geometría, entorno, restricciones y ventana de trabajo. Te devolvemos un enfoque claro.') }}
              </p>
            </div>
            <a href="https://lift-es.com/contacto/"
              class="group btn-press inline-flex items-center justify-center gap-2 rounded-full bg-[var(--liftRed)] px-8 py-3.5 text-white shadow-[0_22px_70px_rgba(255,51,51,.18)] transition font-heading font-extrabold text-[11px] tracking-[0.22em] uppercase duration-300 hover:scale-105 w-full md:w-auto">
              {{ __('Contactar') }}
              <i
                class="fa-solid fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
            </a>
          </div>
        </div>

      </div>
    </section>

    <div class="h-10"></div>
  </main>

  <!-- FOOTER -->
  <x-footer />

  <script>
    (function () {
      const bar = document.getElementById("scrollbar");
      const nav = document.getElementById("nav");

      const setNavH = () => {
        const n = document.querySelector("header") || nav;
        const h = n ? n.getBoundingClientRect().height : 96;
        document.documentElement.style.setProperty("--navH", Math.round(h) + "px");
      };
      setNavH();
      window.addEventListener("resize", setNavH);

      const updateUI = () => {
        const h = document.documentElement;
        const max = h.scrollHeight - h.clientHeight || 1;
        const p = Math.min(1, Math.max(0, window.scrollY / max));

        if (bar) bar.style.width = (p * 100).toFixed(2) + "%";
        if (nav) nav.classList.toggle("is-scrolled", window.scrollY > 8);
      };

      updateUI();
      window.addEventListener("scroll", updateUI, { passive: true });
      window.addEventListener("resize", updateUI);

      const btn = document.getElementById("menuBtn");
      const menu = document.getElementById("mobileMenu");

      if (btn && menu) {
        const toggleMenu = () => {
          const open = menu.dataset.open === "true";
          menu.dataset.open = (!open).toString();
          btn.setAttribute("aria-label", open ? "Abrir menú" : "Cerrar menú");
        };
        btn.addEventListener("click", toggleMenu);

        menu.querySelectorAll("a").forEach((a) => {
          a.addEventListener("click", () => (menu.dataset.open = "false"));
        });
      }

      const items = document.querySelectorAll(".reveal");
      if (items.length) {
        const isMobile = window.matchMedia("(max-width: 640px)").matches;
        const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

        if (isMobile || reduceMotion) {
          items.forEach((el) => el.classList.add("is-in"));
        } else {
          const observer = new IntersectionObserver(
            (entries) => {
              entries.forEach((entry) => {
                if (entry.isIntersecting) {
                  entry.target.classList.add("is-in");
                  observer.unobserve(entry.target);
                }
              });
            },
            { threshold: 0.16, rootMargin: "0px 0px -5% 0px" }
          );
          items.forEach((el) => observer.observe(el));
        }
      }

      const tilts = document.querySelectorAll(".tilt");
      if (tilts.length && window.matchMedia("(pointer:fine)").matches) {
        tilts.forEach((card) => {
          card.addEventListener("mousemove", (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const cx = rect.width / 2;
            const cy = rect.height / 2;
            const rx = ((y - cy) / cy) * -5;
            const ry = ((x - cx) / cx) * 5;
            card.style.transform = `perspective(1000px) rotateX(${rx.toFixed(2)}deg) rotateY(${ry.toFixed(2)}deg) scale3d(1.02,1.02,1.02)`;
          });
          card.addEventListener("mouseleave", () => {
            card.style.transform = "perspective(1000px) rotateX(0) rotateY(0) scale3d(1,1,1)";
          });
        });
      }
    })();
  </script>
</body>

</html>
