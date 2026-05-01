@props([
  'logo' => \App\Models\Page::where('slug', 'global')->first()?->getBlockSrc('logo', 'img/branding/Asset-7-1.png') ?? \App\Models\Page::resolveBlockSrc('img/branding/Asset-7-1.png'),
  'home' => url('/'),
])

@php
  $links = [
    ['label'=>'Formación','href'=>route('formacion'),'active'=>request()->routeIs('formacion')],
    ['label'=>'Ingeniería','href'=>route('ingenieria'),'active'=>request()->routeIs('ingenieria')],
    ['label'=>'Proyectos','href'=>'https://lift-es.com/proyectos/','active'=>request()->is('proyectos*')],
  ];
@endphp

<style>
  /* --- Motion tuning (más "spring") --- */
  .nav-motion { will-change: transform, opacity, filter, height, background-color; }
  .ease-spring { transition-timing-function: cubic-bezier(.16,1,.3,1); }

  /* --- Desktop underline (de centro a lados + glow sutil) --- */
  .nav-underline {
    position: absolute; left: 0; right: 0; bottom: 0;
    height: 2px; transform: scaleX(0);
    transform-origin: 50% 50%;
    transition: transform .45s cubic-bezier(.16,1,.3,1), filter .45s cubic-bezier(.16,1,.3,1);
  }
  .group:hover .nav-underline { transform: scaleX(1); filter: drop-shadow(0 6px 10px rgba(255,51,51,.25)); }
  .nav-underline.is-active { transform: scaleX(1); transform-origin: 0% 50%; }

  /* --- Mobile panel subtle glass --- */
  .mobile-panel {
    background: rgba(10,10,12,.85);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,.08);
    box-shadow: 0 30px 80px rgba(0,0,0,.55);
  }

  /* Reduce motion */
  @media (prefers-reduced-motion: reduce) {
    .nav-motion, .ease-spring, .nav-underline { transition: none !important; }
  }
</style>

<header
<header
x-data="{
  open:false,
  scrolled:false,
  hidden:false,

  lastY: 0,
  hideY: 0,
  ticking:false,

  SCROLL_SHRINK_AT: 40,
  HIDE_AFTER: 140,
  DIR_THRESHOLD: 10,   // ignora micro movimientos
  SHOW_AFTER_UP: 80,   // tiene que subir 80px reales para mostrar

  init() {
    this.lastY = window.scrollY || 0;

    const update = () => {
      const y = window.scrollY || 0;

      this.scrolled = y > this.SCROLL_SHRINK_AT;

      if (this.open) {
        this.hidden = false;
        this.lastY = y;
        this.ticking = false;
        return;
      }

      const diff = y - this.lastY;

      // TOP: siempre visible
      if (y < 20) this.hidden = false;

      if (!this.hidden) {
        // Solo ocultar con bajada clara y pasado el umbral
        if (diff > this.DIR_THRESHOLD && y > this.HIDE_AFTER) {
          this.hidden = true;
          this.hideY = y; // guarda la posición donde se ocultó
        }
      } else {
        // Solo mostrar si sube lo suficiente (evita CLS/“rebotes”)
        if (y < this.hideY - this.SHOW_AFTER_UP) {
          this.hidden = false;
        }
      }

      this.lastY = y;
      this.ticking = false;
    };

    const onScroll = () => {
      if (this.ticking) return;
      this.ticking = true;
      requestAnimationFrame(update);
    };

    window.addEventListener('scroll', onScroll, { passive:true });
    update();

    this.$watch('open', (v) => {
      document.documentElement.classList.toggle('overflow-hidden', v);
      if (v) this.hidden = false;
    });
  },

  toggle() { this.open = !this.open; },
  close() { this.open = false; },
}"


  x-init="init()"
  class="fixed top-0 w-full z-50 nav-motion transition-all duration-500 ease-spring"
  :class="scrolled ? 'glass-nav nav-scrolled' : 'bg-transparent'"
  :style="
    hidden
      ? 'transform:translateY(-110%) scale(.98); opacity:0; filter:blur(6px);'
      : 'transform:translateY(0) scale(1); opacity:1; filter:blur(0);'
  "
>
  <div class="w-full px-6 md:px-12">
    <div
      class="relative flex items-center justify-between nav-motion transition-all duration-500 ease-spring"
      :class="scrolled ? 'h-16 md:h-20' : 'h-20 md:h-24'"
    >
      <!-- Logo -->
      <a href="{{ $home }}" class="ml-2 md:ml-0 w-20 md:w-28 relative group overflow-hidden flex items-center shrink-0">
        <img
          src="{{ $logo }}"
          alt="LIFT Logo"
          class="relative z-10 transition-transform duration-500 ease-spring group-hover:scale-[1.03] group-hover:-rotate-[0.3deg]"
        />
        <div
          class="absolute inset-0 bg-linear-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.2s_infinite] z-20"
        ></div>
      </a>

      <!-- Desktop nav (Centered) -->
      <nav class="hidden lg:flex items-center space-x-8 xl:space-x-12 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        @foreach($links as $l)
          <div class="group relative py-2">
            <a
              href="{{ $l['href'] }}"
              class="font-heading font-bold text-[11px] tracking-[0.2em] uppercase transition-all duration-300 ease-spring
                    {{ $l['active'] ? 'text-liftRed' : 'text-gray-800 hover:text-black' }}"
            >
              <span class="inline-block transition-transform duration-300 ease-spring group-hover:-translate-y-[1px]">
                {{ $l['label'] }}
              </span>
            </a>

            <span
              class="nav-underline bg-red-600 rounded-full {{ $l['active'] ? 'is-active' : '' }}"
            ></span>
          </div>
        @endforeach
      </nav>

      <!-- Right side -->
      <div class="flex items-center space-x-3 md:space-x-6 mr-2 md:mr-0 h-full shrink-0">
        <!-- Contact Button -->
        <a
          href="https://lift-es.com/contacto/"
          class="hidden lg:inline-flex btn-shine bg-black text-white px-7 py-3 rounded-full font-heading font-bold text-[10px]
                 tracking-[0.2em] uppercase shadow-lg hover:bg-red-600 hover:-translate-y-1
                 hover:shadow-red-500/20 transition-all duration-300 ease-spring active:scale-95"
        >
          Contacto
        </a>

        <!-- Lang -->
        <div class="hidden sm:flex items-center space-x-3 text-[15px] font-bold border-l pl-6 border-gray-300/50">
          <a href="#" class="text-gray-400 hover:text-black transition-colors">EN</a>
          <span class="text-gray-300">/</span>
          <a href="#" class="text-black relative">
            ES
            <span class="absolute -bottom-1 left-0 w-full h-[1.5px] bg-red-600"></span>
          </a>
        </div>

        <!-- Mobile button (micro-anim icon) -->
        <button
          class="lg:hidden text-black p-2 rounded-xl hover:bg-black/5 transition nav-motion duration-300 ease-spring"
          @click="toggle()"
          :aria-expanded="open"
          aria-label="Abrir menú"
        >
          <i class="fas text-xl transition-transform duration-300 ease-spring" :class="open ? 'fa-times rotate-90' : 'fa-bars rotate-0'"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile: backdrop + slide panel + stagger -->
  <div
    x-cloak
    x-show="open"
    x-transition.opacity.duration.250ms
    @keydown.window.escape="close()"
    class="fixed inset-0 z-[500]"
    aria-hidden="false"
  >
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" @click="close()"></div>

    <!-- Panel -->
    <div
      class="absolute right-4 left-4 sm:left-auto sm:right-6 top-6 sm:top-8 sm:w-[420px] rounded-3xl mobile-panel overflow-hidden"
      x-show="open"
      x-transition:enter="transition transform duration-500 ease-spring"
      x-transition:enter-start="translate-y-4 opacity-0 scale-[0.98]"
      x-transition:enter-end="translate-y-0 opacity-100 scale-100"
      x-transition:leave="transition transform duration-300 ease-spring"
      x-transition:leave-start="translate-y-0 opacity-100 scale-100"
      x-transition:leave-end="translate-y-3 opacity-0 scale-[0.985]"
      @click.stop
    >
      <div class="p-6 sm:p-7">
        <div class="flex items-center justify-between">
          <span class="text-xs tracking-[0.35em] uppercase text-white/60 font-heading font-bold">Menú</span>
          <button class="text-white/80 hover:text-white transition" @click="close()" aria-label="Cerrar">
            <i class="fas fa-times text-lg"></i>
          </button>
        </div>

        <nav class="mt-6 flex flex-col gap-3">
          @php
            $mobileLinks = [
              ['label'=>'Formación','href'=>route('formacion'),'active'=>request()->routeIs('formacion')],
              ['label'=>'Ingeniería','href'=>route('ingenieria'),'active'=>request()->routeIs('ingenieria')],
              ['label'=>'Proyectos','href'=>'https://lift-es.com/proyectos/','active'=>request()->is('proyectos*')],
              ['label'=>'Contacto','href'=>'https://lift-es.com/contacto/','active'=>request()->is('contacto*')],
            ];
          @endphp

          @foreach($mobileLinks as $i => $ml)
            <a
              @click="close()"
              href="{{ $ml['href'] }}"
              class="group rounded-2xl px-4 py-4 flex items-center justify-between
                     border border-white/10 hover:border-white/20 transition-all duration-300 ease-spring
                     {{ $ml['active'] ? 'bg-white/10' : 'bg-white/5 hover:bg-white/10' }}"
              x-show="open"
              x-transition:enter="transition transform duration-500 ease-spring"
              x-transition:enter-start="opacity-0 translate-y-2"
              x-transition:enter-end="opacity-100 translate-y-0"
              style="transition-delay: {{ 80 + $i*55 }}ms"
            >
              <span class="text-lg font-heading font-black uppercase tracking-[0.12em]
                           {{ $ml['active'] ? 'text-liftRed' : 'text-white' }}">
                {{ $ml['label'] }}
              </span>
              <span class="text-white/40 group-hover:text-white/70 transition">
                <i class="fas fa-arrow-right"></i>
              </span>
            </a>
          @endforeach
        </nav>

        <div class="mt-6 flex items-center justify-between pt-5 border-t border-white/10">
          <div class="flex items-center gap-3">
            <a href="#" class="text-sm font-bold text-white/60 hover:text-liftRed transition-colors">EN</a>
            <span class="w-1 h-1 bg-white/20 rounded-full"></span>
            <a href="#" class="text-sm font-bold text-white border-b-2 border-liftRed">ES</a>
          </div>

          <a
            href="https://lift-es.com/contacto/"
            class="inline-flex items-center gap-2 text-xs font-heading font-bold uppercase tracking-[0.25em]
                   text-white/90 hover:text-white transition"
            @click="close()"
          >
            Contactar <i class="fas fa-paper-plane"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</header>

{{-- Spacer --}}
<div aria-hidden="true" class="h-20 md:h-12"></div>
