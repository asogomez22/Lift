<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('LIFT - Proyectos') }}</title>

  {{-- SEO Meta --}}
  <meta name="description"
    content="{{ __('Proyectos de ingeniería, supervisión y movimientos mecánicos de cargas realizados por LIFT Ingeniería. Portfolio de trabajos industriales.') }}" />
  <meta name="author" content="LIFT Ingeniería S.L." />
  <meta name="theme-color" content="#ff3333" />
  <link rel="canonical" href="{{ url()->current() }}" />

  {{-- Open Graph --}}
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
  <meta property="og:site_name" content="LIFT Ingeniería" />
  <meta property="og:title" content="{{ __('LIFT - Proyectos') }}" />
  <meta property="og:description"
    content="{{ __('Portfolio de proyectos de ingeniería, supervisión y movimientos mecánicos de cargas.') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ __('LIFT - Proyectos') }}" />
  <meta name="twitter:description"
    content="{{ __('Portfolio de proyectos de ingeniería y movimientos mecánicos de cargas.') }}" />
  <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Favicon --}}
  @include('components.favicons')

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-header />

  <style>
    /* Scoped */
    .lift-projects {
      --liftRed: #ff3333;
      --liftDark: #0b1020;
      position: relative;
      overflow: hidden;
      padding: clamp(56px, 6vw, 96px) 0;
      background: #fff;
    }

    .lift-projects::before {
      content: "";
      position: absolute;
      inset: 0;
      pointer-events: none;
      background-image:
        radial-gradient(rgba(11, 16, 32, 0.07) 1px, transparent 1px),
        radial-gradient(circle at 18% 10%, rgba(255, 51, 51, 0.12), transparent 58%),
        radial-gradient(circle at 85% 88%, rgba(59, 130, 246, 0.10), transparent 60%);
      background-size: 24px 24px, auto, auto;
      background-position: center, center, center;
    }

    .lift-projects .wrap {
      position: relative;
      z-index: 1;
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 16px;
    }

    .lift-projects .title-wrap {
      text-align: center;
      margin-bottom: clamp(22px, 3vw, 34px);
    }

    .lift-projects .kicker {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font: 800 11px/1 "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial;
      letter-spacing: 0.28em;
      text-transform: uppercase;
      color: var(--liftRed);
      opacity: 0.95;
    }

    .lift-projects .kicker::before,
    .lift-projects .kicker::after {
      content: "";
      width: 44px;
      height: 2px;
      background: var(--liftRed);
      border-radius: 999px;
      opacity: 0.85;
    }

    .lift-projects h1 {
      margin: 14px 0 0;
      font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial;
      font-weight: 900;
      letter-spacing: -0.035em;
      text-transform: uppercase;
      color: var(--liftDark);
      font-size: clamp(28px, 4vw, 56px);
      line-height: 1.02;
    }

    .lift-projects .subtitle {
      margin: 14px auto 0;
      max-width: 820px;
      color: rgba(15, 23, 42, 0.62);
      font: 400 clamp(14px, 1.6vw, 18px) / 1.65 "Roboto", system-ui, -apple-system, Segoe UI, Arial;
    }

    .lift-projects .grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 18px;
      margin-top: clamp(22px, 3vw, 34px);
    }

    @media (max-width: 980px) {
      .lift-projects .grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 600px) {
      .lift-projects .grid {
        grid-template-columns: 1fr;
        gap: 14px;
      }
    }

    /* Card */
    .lift-projects .card {
      height: 100%;
      border-radius: 24px;
      border: 1px solid rgba(15, 23, 42, 0.10);
      background: rgba(255, 255, 255, 0.82);
      box-shadow: 0 14px 40px rgba(15, 23, 42, 0.08);
      overflow: hidden;
      transform: translateY(0);
      transition:
        transform .5s cubic-bezier(.16, 1, .3, 1),
        box-shadow .5s cubic-bezier(.16, 1, .3, 1),
        border-color .5s cubic-bezier(.16, 1, .3, 1);
      position: relative;
    }

    .lift-projects .card::after {
      content: "";
      position: absolute;
      inset: -1px;
      pointer-events: none;
      border-radius: 24px;
      opacity: 0;
      transition: opacity .6s cubic-bezier(.16, 1, .3, 1);
      background: radial-gradient(circle at 20% 18%, rgba(255, 51, 51, 0.18), transparent 55%);
      filter: blur(18px);
    }

    .lift-projects .card:hover,
    .lift-projects .card:focus-within {
      transform: translateY(-7px);
      border-color: rgba(255, 51, 51, 0.22);
      box-shadow: 0 26px 70px rgba(15, 23, 42, 0.12), 0 22px 60px rgba(255, 51, 51, 0.10);
    }

    .lift-projects .card:hover::after,
    .lift-projects .card:focus-within::after {
      opacity: 1;
    }

    /* Media */
    .lift-projects .media {
      position: relative;
      overflow: hidden;
      background: #0b1020;
    }

    .lift-projects .media img {
      width: 100%;
      aspect-ratio: 16 / 10;
      object-fit: cover;
      display: block;
      transform: scale(1);
      transition: transform 1.2s cubic-bezier(.16, 1, .3, 1);
    }

    .lift-projects .card:hover .media img,
    .lift-projects .card:focus-within .media img {
      transform: scale(1.06);
    }

    /* Overlay */
    .lift-projects .overlay {
      position: absolute;
      inset: 0;
      opacity: 0;
      transform: translateY(6px);
      transition: opacity .35s ease, transform .45s cubic-bezier(.16, 1, .3, 1);
      background: linear-gradient(to top, rgba(11, 16, 32, 0.72), rgba(11, 16, 32, 0.10));
      display: flex;
      align-items: flex-end;
      padding: 16px;
    }

    .lift-projects .card:hover .overlay,
    .lift-projects .card:focus-within .overlay {
      opacity: 1;
      transform: translateY(0);
    }

    .lift-projects .overlay-box {
      width: 100%;
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      gap: 12px;
    }

    .lift-projects .chips {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .lift-projects .chip {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 8px 10px;
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: rgba(255, 255, 255, 0.92);
      font: 800 10px/1 "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      white-space: nowrap;
    }

    .lift-projects .cta {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 10px 12px;
      border-radius: 14px;
      background: rgba(255, 51, 51, 0.95);
      color: #fff;
      text-decoration: none;
      font: 900 11px/1 "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      box-shadow: 0 16px 40px rgba(255, 51, 51, 0.22);
      transition: transform .25s cubic-bezier(.16, 1, .3, 1), filter .25s ease;
      white-space: nowrap;
    }

    .lift-projects .cta:hover {
      transform: translateY(-1px);
      filter: brightness(1.06);
    }

    .lift-projects .cta i {
      font-size: 12px;
      transform: translateX(0);
      transition: transform .25s cubic-bezier(.16, 1, .3, 1);
    }

    .lift-projects .cta:hover i {
      transform: translateX(2px);
    }

    /* Content */
    .lift-projects .content {
      padding: 18px 18px 20px;
      position: relative;
    }

    .lift-projects .content::before {
      content: "";
      position: absolute;
      left: 18px;
      top: 0;
      width: 56px;
      height: 3px;
      background: var(--liftRed);
      border-radius: 999px;
      opacity: 0.75;
    }

    .lift-projects .title {
      margin: 10px 0 0;
      font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial;
      font-weight: 900;
      letter-spacing: -0.01em;
      text-transform: uppercase;
      font-size: 16px;
      line-height: 1.2;
      color: var(--liftDark);
    }

    .lift-projects .meta {
      margin-top: 10px;
      color: rgba(15, 23, 42, 0.60);
      font: 400 13px/1.6 "Roboto", system-ui, -apple-system, Segoe UI, Arial;
    }

    .lift-projects .card-link {
      display: block;
      color: inherit;
      text-decoration: none;
    }

    /* Focus */
    .lift-projects a:focus-visible,
    .lift-projects button:focus-visible {
      outline: 3px solid rgba(255, 51, 51, 0.35);
      outline-offset: 3px;
      border-radius: 14px;
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {

      .lift-projects *,
      .lift-projects *::before,
      .lift-projects *::after {
        transition: none !important;
        animation: none !important;
        transform: none !important;
        scroll-behavior: auto !important;
      }
    }
  </style>

  <main>
    <section class="lift-projects" id="proyectos" aria-labelledby="projects-title">
      <div class="wrap">
        <header class="title-wrap">
          <div class="kicker">{{ __('Proyectos') }}</div>
          <h1 id="projects-title">{{ __('Nuestros proyectos') }}</h1>
          <p class="subtitle">
            {{ __('Casos reales en industria: ingeniería, supervisión y ejecución técnica con estándares de seguridad.') }}
          </p>
        </header>

        {{-- GRID --}}
        <div class="grid" role="list">
          @forelse($projects as $project)
            <article class="card" role="listitem">
              {{-- Link principal (cubre toda la card de forma semántica y sin anidar <a>) --}}
                <a class="card-link" href="{{ route('projects.show', $project) }}">
                  <div class="media">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" decoding="async" loading="lazy" />

                    <div class="overlay" aria-hidden="true">
                      <div class="overlay-box">
                        <div class="chips">
                          @foreach(array_slice($project->tags_array ?? [], 0, 2) as $tag)
                            <span class="chip">
                              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                              {{ $tag }}
                            </span>
                          @endforeach
                        </div>

                        <span class="cta">
                          {{ __('Ver proyecto') }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="content">
                    <h2 class="title">{{ $project->title }}</h2>
                    <p class="meta">{{ $project->description ?? __('Ingeniería · Supervisión · Maniobras') }}</p>
                  </div>
                </a>
            </article>
          @empty
            <div class="col-span-full text-center py-16">
              <p class="text-slate-600 text-lg">{{ __('No hay proyectos disponibles en este momento.') }}</p>
            </div>
          @endforelse
        </div>

        {{-- PAGINACIÓN REAL --}}
        @if(method_exists($projects, 'links'))
          <div class="mt-10 flex justify-center">
            {{ $projects->onEachSide(1)->links() }}
          </div>
        @endif
      </div>
    </section>

    {{-- DESCARGAS (más responsive que tabla) --}}
    @if($documents->isNotEmpty())
      <section class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
          <div class="text-center mb-12">
            <div
              class="inline-flex items-center gap-3 font-bold text-[11px] uppercase tracking-[0.2em] text-red-600 mb-3">
              <span class="w-10 h-0.5 bg-red-600 rounded-full opacity-80"></span>
              {{ __('Descargas') }}
              <span class="w-10 h-0.5 bg-red-600 rounded-full opacity-80"></span>
            </div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 uppercase tracking-tight">
              {{ __('Documentación técnica') }}
            </h2>
          </div>

          <div class="grid gap-4 md:grid-cols-2">
            @foreach($documents as $doc)
              <article class="bg-white rounded-2xl shadow-xl border border-gray-100 p-5 md:p-6">
                <div class="flex items-start justify-between gap-4">
                  <div>
                    <h3 class="font-extrabold text-slate-900">
                      {{ $doc->title }}
                    </h3>
                    @if($doc->description)
                      <p class="mt-1 text-sm text-slate-500">
                        {{ $doc->description }}
                      </p>
                    @endif
                  </div>

                  <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" rel="noopener"
                    class="shrink-0 group inline-flex items-center justify-center gap-2 rounded-2xl px-4 py-2.5 text-[11px] font-extrabold uppercase tracking-[0.18em] text-white transition-all duration-500 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-0.5 shadow-lg shadow-red-500/20"
                    style="background: linear-gradient(90deg, #ff3333, #ff5151);"
                    aria-label="Descargar {{ $doc->title }} (PDF)">
                    <i class="fa-solid fa-file-pdf" aria-hidden="true"></i>
                    {{ __('Descargar') }}
                    <span class="opacity-80 transition-transform duration-500 group-hover:translate-x-0.5"
                      aria-hidden="true">↗</span>
                  </a>
                </div>
              </article>
            @endforeach
          </div>
        </div>
      </section>
    @endif

    <div class="mt-16">
      <x-clientes />
    </div>
  </main>

  <div class="border-t border-gray-100">
    <x-footer />
  </div>
</body>

</html>
