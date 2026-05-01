<style>
  :root {
    --liftRed: #ff3333;
    --marquee-speed: 350s;
  }

  .text-liftRed {
    color: var(--liftRed);
  }

  /* Marquee keyframes */
  @keyframes scroll-left {
    0% {
      transform: translateX(0);
    }

    100% {
      transform: translateX(-50%);
    }
  }

  @keyframes scroll-right {
    0% {
      transform: translateX(-50%);
    }

    100% {
      transform: translateX(0);
    }
  }

  .animate-marquee-left {
    display: flex;
    width: max-content;
    animation: scroll-left var(--marquee-speed) linear infinite;
  }

  .animate-marquee-right {
    display: flex;
    width: max-content;
    animation: scroll-right var(--marquee-speed) linear infinite;
  }

  /* Logo cards */
  .logo-card {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 100px;
    padding: 1rem;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .logo-card img {
    max-height: 50px;
    max-width: 100%;
    object-fit: contain;
    filter: grayscale(1) opacity(0.6);
    transition: all 0.4s ease;
  }

  .logo-card:hover {
    transform: scale(1.1);
  }

  .logo-card:hover img {
    filter: grayscale(0) opacity(1);
  }

  /* Fade mask for edges */
  .mask-edges {
    mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
    -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
  }
</style>

@php
  $clients = \App\Models\Client::ordered()->get();
@endphp

<section class="py-24 bg-[#f8fafc] overflow-hidden">
  <div class="container mx-auto px-6 mb-16">
    <div class="flex flex-col items-center text-center">
      <span
        class="px-4 py-1.5 rounded-full text-[10px] font-bold tracking-[0.3em] text-liftRed bg-red-50 uppercase border border-red-100 mb-6">
        {{ __('Nuestros Clientes') }}
      </span>
      <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">
        {{ __('Líderes que confían en') }}
        <span class="text-liftRed">{{ __('nosotros') }}</span>
      </h2>
      <p class="mt-4 text-slate-500 max-w-2xl">
        {{ __('Impulsando la eficiencia operativa en los sectores más exigentes de la industria global.') }}
      </p>
    </div>
  </div>

  <!-- Contenedor Maestro de Marquees -->
  <div class="flex flex-col gap-8 mask-edges">
    <!-- FILA 1: De Derecha a Izquierda -->
    <div class="relative overflow-hidden">
      <div class="animate-marquee-left flex gap-8">
        <!-- Bloque Original -->
        <div class="flex gap-8">
          @for($i = 0; $i < 4; $i++)
            @foreach($clients as $client)
              <div class="logo-card">
                @if(str_starts_with($client->logo_path, 'clients/'))
                  <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}" />
                @else
                  <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" />
                @endif
              </div>
            @endforeach
          @endfor
        </div>
        <!-- Bloque Duplicado para loop infinito -->
        <div class="flex gap-8" aria-hidden="true">
          @for($i = 0; $i < 4; $i++)
            @foreach($clients as $client)
              <div class="logo-card">
                @if(str_starts_with($client->logo_path, 'clients/'))
                  <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}" />
                @else
                  <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" />
                @endif
              </div>
            @endforeach
          @endfor
        </div>
      </div>
    </div>

    <!-- FILA 2: De Izquierda a Derecha (Orden invertido) -->
    <div class="relative overflow-hidden">
      <div class="animate-marquee-right flex gap-8">
        <!-- Bloque Original -->
        <div class="flex gap-8">
          @for($i = 0; $i < 4; $i++)
            @foreach($clients->reverse() as $client)
              <div class="logo-card">
                @if(str_starts_with($client->logo_path, 'clients/'))
                  <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}" />
                @else
                  <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" />
                @endif
              </div>
            @endforeach
          @endfor
        </div>
        <!-- Bloque Duplicado para loop infinito -->
        <div class="flex gap-8" aria-hidden="true">
          @for($i = 0; $i < 4; $i++)
            @foreach($clients->reverse() as $client)
              <div class="logo-card">
                @if(str_starts_with($client->logo_path, 'clients/'))
                  <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}" />
                @else
                  <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" />
                @endif
              </div>
            @endforeach
          @endfor
        </div>
      </div>
    </div>
  </div>
</section>