{{-- ═══════════════════════════════════════════════════════════
HEADER LIFT — Premium v3
═══════════════════════════════════════════════════════════ --}}

{{-- Scroll-progress bar (fixed, always on top) --}}
<div id="scroll-progress"
  class="fixed top-0 left-0 h-[3px] w-0 z-201 bg-linear-to-r from-liftRed via-red-400 to-orange-400 transition-none"
  aria-hidden="true"></div>

<header id="navbar" class="fixed top-0 w-full z-200" style="transition: transform 0.4s ease;">

  <div id="nav-glass" class="nav-glass">
    <div id="nav-container"
      class="container relative mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between nav-h transition-[height] duration-400 ease-in-out">

      {{-- ── LOGO ─────────────────────────────────────────────── --}}
      <a href="/" class="relative group flex items-center shrink-0 mr-6 lg:mr-10" aria-label="LIFT – Inicio">
        <img src="/img/branding/Asset-7-1.png" alt="LIFT Logo" width="130" height="40"
          style="max-width: 130px; width: 100%; height: auto;"
          class="object-contain relative z-10 transition-transform duration-500 group-hover:scale-[1.04]" />
        {{-- shimmer --}}
        <div class="absolute inset-0 bg-linear-to-r from-transparent via-white/40 to-transparent
                    -translate-x-full group-hover:animate-[shimmer_1.4s_ease-in-out] z-20 pointer-events-none"></div>
      </a>

      {{-- ── DESKTOP NAV ──────────────────────────────────────── --}}
      <nav class="hidden lg:flex flex-1 justify-center items-center gap-0.5 xl:gap-1 relative mx-4"
        aria-label="Navegación principal">

        @php
          $navLinks = [
            ['route' => 'formacion', 'label' => 'Formación', 'match' => 'formacion', 'icon' => 'fa-graduation-cap'],
            ['route' => 'ingenieria', 'label' => 'Ingeniería', 'match' => 'ingenieria*', 'icon' => 'fa-drafting-compass'],
            ['route' => 'diseno-estructuras', 'label' => 'Diseño Estructuras', 'match' => 'diseno-estructuras*', 'icon' => 'fa-ruler-combined'],
            ['route' => 'proyectos', 'label' => 'Proyectos', 'match' => 'proyectos*', 'icon' => 'fa-layer-group'],
            ['route' => 'calculadora', 'label' => 'Calculadora', 'match' => 'calculadora*', 'icon' => 'fa-calculator'],
            ['route' => 'descargas', 'label' => 'Descargar App', 'match' => 'descargas*', 'icon' => 'fa-download'],
          ];
        @endphp

        @foreach($navLinks as $link)
              @php
                $isActive = $link['match'] === 'formacion'
                  ? request()->routeIs($link['match'])
                  : request()->is($link['match']);
              @endphp
              <div class="group relative">
                <a href="{{ route($link['route']) }}" class="relative flex items-center gap-1.5 font-heading font-bold text-[10px] xl:text-[10.5px] tracking-widest uppercase whitespace-nowrap
                                                                                                                                                          px-2 xl:px-3 py-2 rounded-lg transition-all duration-200
                                                                                                                                                          {{ $isActive
          ? 'text-liftRed'
          : 'text-gray-600 hover:text-gray-900' }}">

                  {{ __($link['label']) }}
                </a>
                {{-- active / hover underline --}}
                <span
                  class="absolute bottom-0.5 left-3 right-3 h-[2px] rounded-full bg-liftRed origin-left
                                                                                                                                                             transition-transform duration-300
                                                                                                                                                             {{ $isActive ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
              </div>
        @endforeach

      </nav>

      {{-- ── RIGHT SIDE ACTIONS ───────────────────────────────── --}}
      <div class="hidden lg:flex items-center">

        {{-- Vertical separator --}}
        <div class="w-px h-5 bg-gray-200 mx-2 xl:mx-3 shrink-0"></div>

        {{-- Language --}}
        <div class="flex items-center gap-1.5 text-[11px] font-bold mr-3 xl:mr-4 shrink-0">
          <a href="{{ route('set.locale', 'en') }}"
            class="{{ app()->getLocale() === 'en' ? 'relative text-gray-900' : 'text-gray-400 hover:text-gray-700' }} transition-colors tracking-widest px-1">
            EN
            @if(app()->getLocale() === 'en')
              <span class="absolute -bottom-0.5 left-1 right-1 h-[1.5px] bg-liftRed rounded-full"></span>
            @endif
          </a>
          <span class="w-px h-3 bg-gray-200"></span>
          <a href="{{ route('set.locale', 'es') }}"
            class="{{ app()->getLocale() === 'es' ? 'relative text-gray-900' : 'text-gray-400 hover:text-gray-700' }} transition-colors tracking-widest px-1">
            ES
            @if(app()->getLocale() === 'es')
              <span class="absolute -bottom-0.5 left-1 right-1 h-[1.5px] bg-liftRed rounded-full"></span>
            @endif
          </a>
        </div>

        {{-- CTA Contacto --}}
        <a href="{{ route('contacto') }}" class="group relative inline-flex items-center gap-2 overflow-hidden
                 border-2 border-liftRed text-liftRed
                 px-5 xl:px-6 py-2 rounded-full
                 font-heading font-bold text-[10px] tracking-[0.22em] uppercase
                 transition-all duration-300
                 hover:text-white hover:shadow-lg hover:shadow-red-500/25 hover:-translate-y-px
                 active:scale-95 shrink-0">
          {{-- fill on hover --}}
          <span
            class="absolute inset-0 bg-liftRed scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300 rounded-full"></span>
          <span class="relative z-10 group-hover:text-white transition-colors duration-300">{{ __('Contacto') }}</span>
          <svg
            class="relative z-10 w-3 h-3 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:text-white"
            fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </a>
      </div>

      {{-- ── MOBILE RIGHT SIDE ────────────────────────────────── --}}
      <div class="flex lg:hidden items-center gap-3 ml-auto">
        {{-- Language (small screens) --}}
        <div class="hidden sm:flex items-center gap-1.5 text-[11px] font-bold">
          <a href="{{ route('set.locale', 'en') }}"
            class="{{ app()->getLocale() === 'en' ? 'relative text-gray-900' : 'text-gray-400 hover:text-gray-700' }} transition-colors tracking-widest">
            EN
            @if(app()->getLocale() === 'en')
              <span class="absolute -bottom-0.5 left-0 right-0 h-[1.5px] bg-liftRed rounded-full"></span>
            @endif
          </a>
          <span class="w-px h-3 bg-gray-200"></span>
          <a href="{{ route('set.locale', 'es') }}"
            class="{{ app()->getLocale() === 'es' ? 'relative text-gray-900' : 'text-gray-400 hover:text-gray-700' }} transition-colors tracking-widest">
            ES
            @if(app()->getLocale() === 'es')
              <span class="absolute -bottom-0.5 left-0 right-0 h-[1.5px] bg-liftRed rounded-full"></span>
            @endif
          </a>
        </div>

        {{-- Hamburger / Close Toggle --}}
        <button id="mobile-menu-btn" class="relative flex justify-center items-center w-10 h-10 focus:outline-none z-50"
          aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu-overlay">

          {{-- Hamburger Icon (Visible default, hidden when open) --}}
          <div
            class="icon-hamburger absolute inset-0 flex flex-col justify-center items-center gap-[6px] transition-all duration-300">
            <span class="block w-6 h-[2px] bg-gray-800 rounded-full"></span>
            <span class="block w-6 h-[2px] bg-gray-800 rounded-full"></span>
            <span class="block w-6 h-[2px] bg-liftRed rounded-full"></span>
          </div>

          {{-- Close (X) Icon (Hidden default, visible when open) --}}
          <div
            class="icon-close absolute inset-0 flex justify-center items-center transition-all duration-300 opacity-0 scale-50 -rotate-90">
            <svg class="w-10 h-10 text-liftRed" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </button>
      </div>

    </div>
  </div>
</header>


{{-- ═══════════════════════════════════════════════════════════
MOBILE MENU OVERLAY
═══════════════════════════════════════════════════════════ --}}
<div id="mobile-menu-overlay" class="fixed inset-0 z-199 hidden flex-col" role="dialog" aria-modal="true"
  aria-label="Menú de navegación">

  {{-- Backdrop (click to close) --}}
  <div id="menu-backdrop" class="absolute inset-0 bg-liftDark/97 backdrop-blur-2xl"></div>

  {{-- Decorative red glow --}}
  <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-liftRed/10 blur-3xl pointer-events-none"></div>
  <div class="absolute bottom-0 -left-20 w-64 h-64 rounded-full bg-liftRed/5 blur-3xl pointer-events-none"></div>

  {{-- Content --}}
  <div class="relative flex flex-col h-full max-w-lg mx-auto w-full px-8 pt-8 pb-10">

    {{-- Top bar --}}
    <div class="flex items-center justify-between mb-10">
      <a href="/" class="opacity-90 hover:opacity-100 transition-opacity">
        <img src="/img/branding/Asset-7-1.png" alt="LIFT Logo" class="h-8 w-auto brightness-0 invert" />
      </a>
      <button id="close-menu-btn" class="w-10 h-10 flex items-center justify-center rounded-xl
               border border-white/15 text-white/70
               hover:border-liftRed/60 hover:text-liftRed hover:bg-liftRed/5
               transition-all duration-200" aria-label="Cerrar menú">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    {{-- Nav links --}}
    <nav class="flex flex-col flex-1" aria-label="Menú móvil">
      @php
        $mobileLinks = [
          ['route' => 'formacion', 'label' => 'Formación', 'match' => 'formacion', 'num' => '01'],
          ['route' => 'ingenieria', 'label' => 'Ingeniería', 'match' => 'ingenieria*', 'num' => '02'],
          ['route' => 'diseno-estructuras', 'label' => 'Diseño Estructuras', 'match' => 'diseno-estructuras*', 'num' => '03'],
          ['route' => 'proyectos', 'label' => 'Proyectos', 'match' => 'proyectos*', 'num' => '04'],
          ['route' => 'calculadora', 'label' => 'Calculadora', 'match' => 'calculadora*', 'num' => '05'],
          ['route' => 'descargas', 'label' => 'Descargar App', 'match' => 'descargas*', 'num' => '06'],
          ['route' => 'contacto', 'label' => 'Contacto', 'match' => 'contacto*', 'num' => '07'],
        ];
      @endphp

      @foreach($mobileLinks as $i => $link)
        @php
          $isActive = $link['match'] === 'formacion'
            ? request()->routeIs($link['match'])
            : request()->is($link['match']);
        @endphp
        <a href="{{ route($link['route']) }}" class="mobile-link group flex items-center gap-5 py-4
                                                             border-b border-white/8 hover:border-liftRed/30
                                                             transition-all duration-200
                                                             opacity-0 translate-y-4" style="--delay: {{ $i * 60 }}ms">
          <span class="font-mono text-[10px] text-white/25 group-hover:text-liftRed/70 transition-colors w-5 shrink-0">
            {{ $link['num'] }}
          </span>
          <span
            class="font-heading font-black text-[1.6rem] sm:text-4xl uppercase tracking-tight leading-none
                                                                   transition-colors duration-200
                                                                   {{ $isActive ? 'text-liftRed' : 'text-white group-hover:text-liftRed' }}">
            {{ __($link['label']) }}
          </span>
          <svg class="ml-auto w-4 h-4 text-white/20 group-hover:text-liftRed group-hover:translate-x-1
                                                                  transition-all duration-200 shrink-0" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      @endforeach
    </nav>

    {{-- Footer --}}
    <div class="mt-8 pt-6 border-t border-white/8 flex items-center justify-between">
      <div class="flex items-center gap-4 text-[11px] font-bold tracking-widest">
        <a href="{{ route('set.locale', 'en') }}"
          class="{{ app()->getLocale() === 'en' ? 'text-white border-b border-liftRed pb-px' : 'text-white/30 hover:text-white/70' }} transition-colors">EN</a>
        <span class="w-px h-3 bg-white/15"></span>
        <a href="{{ route('set.locale', 'es') }}"
          class="{{ app()->getLocale() === 'es' ? 'text-white border-b border-liftRed pb-px' : 'text-white/30 hover:text-white/70' }} transition-colors">ES</a>
      </div>

    </div>

  </div>
</div>

{{-- Spacer so content doesn't hide under fixed header --}}
<div aria-hidden="true" class="nav-spacer"></div>


{{-- ═══════════════════════════════════════════════════════════
STYLES
═══════════════════════════════════════════════════════════ --}}
<style>
  /* Heights */
  .nav-h {
    height: 72px;
  }

  .nav-spacer {
    height: 75px;
  }

  @media (min-width: 768px) {
    .nav-h {
      height: 80px;
    }

    .nav-spacer {
      height: 83px;
    }
  }

  /* Scrolled: shrink */
  #navbar.nav-scrolled .nav-h {
    height: 68px;
  }

  /* Glass surface */
  .nav-glass {
    background: rgba(255, 255, 255, 0.78);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.35);
    transition: background 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease;
  }

  #navbar.nav-scrolled .nav-glass {
    background: rgba(255, 255, 255, 0.96);
    border-bottom-color: rgba(0, 0, 0, 0.07);
    box-shadow: 0 2px 24px rgba(0, 0, 0, 0.07);
  }

  /* Mobile link stagger animation */
  .mobile-link.is-visible {
    animation: linkReveal 0.45s cubic-bezier(0.22, 1, 0.36, 1) var(--delay, 0ms) both;
  }

  @keyframes linkReveal {
    from {
      opacity: 0;
      transform: translateY(16px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Hamburger <-> X Toggle */
  .menu-open .icon-hamburger {
    opacity: 0;
    transform: scale(0.5) rotate(90deg);
  }

  .menu-open .icon-close {
    opacity: 1;
    transform: scale(1) rotate(0deg);
  }
</style>


{{-- ═══════════════════════════════════════════════════════════
SCRIPT
═══════════════════════════════════════════════════════════ --}}
<script>
  (function () {
    'use strict';

    const navbar = document.getElementById('navbar');
    const container = document.getElementById('nav-container');
    const mobileMenu = document.getElementById('mobile-menu-overlay');
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('close-menu-btn');
    const backdrop = document.getElementById('menu-backdrop');
    const progress = document.getElementById('scroll-progress');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    // ── Scroll: progress bar + shrink + hide-on-scroll-down ──────────────
    let lastY = window.scrollY;
    let ticking = false;

    function onScroll() {
      const currentY = window.scrollY; // capture NOW, before rAF delay
      const scrollingDown = currentY > lastY;
      lastY = currentY;

      if (!ticking) {
        requestAnimationFrame(() => {
          const max = document.documentElement.scrollHeight - window.innerHeight;

          // Progress bar
          if (progress) progress.style.width = (max > 0 ? (currentY / max) * 100 : 0) + '%';

          // Shrink
          if (currentY > 40) {
            navbar.classList.add('nav-scrolled');
          }

          else {
            navbar.classList.remove('nav-scrolled');
          }

          // Hide on scroll down, show on scroll up
          if (scrollingDown && currentY > 120) {
            navbar.style.transform = 'translateY(-110%)';
          }

          else {
            // Al reaparecer: quitar nav-scrolled para recuperar altura original
            navbar.classList.remove('nav-scrolled');
            navbar.style.transform = 'translateY(0)';
          }

          ticking = false;
        });
        ticking = true;
      }
    }

    window.addEventListener('scroll', onScroll, {
      passive: true
    });

    // ── Mobile menu ───────────────────────────────────────────────────────
    function openMenu() {
      mobileMenu.classList.remove('hidden');
      mobileMenu.classList.add('flex');
      // Force reflow then fade in
      void mobileMenu.offsetWidth;
      mobileMenu.style.opacity = '1';
      document.body.style.overflow = 'hidden';
      mobileBtn.setAttribute('aria-expanded', 'true');
      mobileBtn.classList.add('menu-open');

      // Stagger links
      mobileLinks.forEach(link => {
        link.classList.remove('is-visible');
        void link.offsetWidth;
        link.classList.add('is-visible');
      });
    }

    function closeMenu() {
      mobileMenu.style.opacity = '0';
      mobileBtn.setAttribute('aria-expanded', 'false');
      mobileBtn.classList.remove('menu-open');

      setTimeout(() => {
        mobileMenu.classList.remove('flex');
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = '';
      }

        , 280);
    }

    if (mobileBtn) {
      mobileBtn.addEventListener('click', () => {
        if (mobileMenu.classList.contains('hidden')) {
          openMenu();
        } else {
          closeMenu();
        }
      });
    }
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    if (backdrop) backdrop.addEventListener('click', closeMenu);
    mobileLinks.forEach(l => l.addEventListener('click', closeMenu));

    // Close on Escape
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) closeMenu();
    });

    // Initial opacity for overlay
    if (mobileMenu) mobileMenu.style.opacity = '0';
    if (mobileMenu) mobileMenu.style.transition = 'opacity 0.28s ease';
  })();
</script>