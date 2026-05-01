<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('LIFT – Contacto') }}</title>

  {{-- SEO Meta --}}
  <meta name="description"
    content="{{ __('Contacta con LIFT Ingeniería S.L. para consultas sobre ingeniería, formación técnica, supervisión industrial y movimiento mecánico de cargas.') }}" />
  <meta name="author" content="LIFT Ingeniería S.L." />
  <meta name="theme-color" content="#ff3333" />
  <link rel="canonical" href="{{ url()->current() }}" />

  {{-- Open Graph --}}
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
  <meta property="og:site_name" content="LIFT Ingeniería" />
  <meta property="og:title" content="{{ __('LIFT – Contacto') }}" />
  <meta property="og:description"
    content="{{ __('Contacta con LIFT Ingeniería para consultas sobre ingeniería y formación técnica.') }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ __('LIFT – Contacto') }}" />
  <meta name="twitter:description"
    content="{{ __('Contacta con LIFT Ingeniería para consultas sobre ingeniería y formación técnica.') }}" />
  <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />

  {{-- Favicon --}}
  @include('components.favicons')

  @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    }

    .text-liftRed {
      color: var(--liftRed);
    }

    /* Mini util para glow */
    .shadow-glow {
      box-shadow: 0 18px 60px rgba(255, 51, 51, 0.18);
    }

    /* Smooth cards */
    .ease-spring {
      transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* Accesibilidad focus */
    .focus-ring:focus {
      outline: none;
      box-shadow:
        0 0 0 3px rgba(255, 51, 51, 0.25),
        0 0 0 1px rgba(255, 51, 51, 0.6) inset;
      border-color: rgba(255, 51, 51, 0.65);
    }
  </style>
</head>

<body class="bg-white text-gray-800 antialiased" id="main-body">
  <x-header />

  <main class="">
    <!-- HERO CONTACTO
      <!-- CONTACTO: FORM + INFO + MAP -->
    <!-- CONTACTO: SIMPLE + ELEGANTE -->
    <section id="formulario" class="relative bg-white py-14 sm:py-20 overflow-hidden">
      <!-- Fondo cuadricula -->
      <div aria-hidden="true" class="absolute inset-0 pointer-events-none opacity-60" style="
      background-image: linear-gradient(to right, rgba(15,23,42,0.06) 1px, transparent 1px),
                        linear-gradient(to bottom, rgba(15,23,42,0.06) 1px, transparent 1px);
      background-size: 28px 28px;
    "></div>

      <!-- Sutiles blobs (menos y mas suaves) -->
      <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-24 -left-24 h-80 w-80 rounded-full bg-[var(--liftRed)]/10 blur-[90px]"></div>
        <div class="absolute -bottom-24 -right-24 h-96 w-96 rounded-full bg-[var(--liftInk)]/5 blur-[110px]"></div>
      </div>

      <div class="container mx-auto px-4 md:px-6 relative z-10 max-w-7xl">
        <!-- Heading -->
        <div class="max-w-3xl mx-auto text-center mb-10 sm:mb-14">
          <p class="text-[10px] sm:text-xs font-extrabold tracking-[0.32em] uppercase text-[var(--liftRed)]">
            {{ __('Contacto') }}
          </p>
          <h2 class="mt-3 text-3xl sm:text-4xl md:text-5xl font-extrabold text-[var(--liftDark)]"
            style="font-family: Montserrat, system-ui">
            {{ __('Envíanos tu consulta') }}
          </h2>

        </div>

        <div class="grid lg:grid-cols-12 gap-8 lg:gap-10 items-start">
          <!-- FORM -->
          <div class="lg:col-span-7">
            <div
              class="rounded-[1.6rem] border border-gray-200 bg-white/80 backdrop-blur shadow-[0_16px_50px_rgba(15,23,42,0.08)] overflow-hidden">
              <!-- Cabecera -->
              <div class="px-6 sm:px-8 py-6 border-b border-gray-200 bg-white">
                <div class="flex items-start justify-between gap-4">
                  <div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-[var(--liftDark)]"
                      style="font-family: Montserrat, system-ui">
                      {{ __('Formulario') }}
                    </h3>
                    <p class="mt-1 text-gray-500 text-sm">
                      {{ __('Te respondemos por email o teléfono según prefieras.') }}
                    </p>
                  </div>
                  <div
                    class="hidden sm:flex items-center justify-center w-11 h-11 rounded-2xl bg-[var(--liftRed)]/10 border border-[var(--liftRed)]/15">
                    <i class="fa-solid fa-paper-plane text-[var(--liftRed)]"></i>
                  </div>
                </div>
              </div>

              @if(session('success'))
                <div class="px-6 sm:px-8 py-4 bg-green-50 border-b border-green-100 flex items-start gap-3">
                  <i class="fa-solid fa-circle-check text-green-600 mt-1"></i>
                  <div>
                    <p class="font-bold text-green-800">{{ __('¡Recibido!') }}</p>
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                  </div>
                </div>
              @endif

              <form class="p-6 sm:p-8" method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="grid sm:grid-cols-2 gap-4">
                  <div>
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider">{{ __('Nombre') }}</label>
                    <input name="name" required placeholder="{{ __('Tu nombre') }}"
                      class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus-ring focus:outline-none transition"
                      type="text" autocomplete="name" />
                  </div>

                  <div>
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider">{{ __('Empresa') }}</label>
                    <input name="company" placeholder="{{ __('Empresa (opcional)') }}"
                      class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus-ring focus:outline-none transition"
                      type="text" autocomplete="organization" />
                  </div>

                  <div>
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider">Email</label>
                    <input name="email" required placeholder="tu@email.com"
                      class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus-ring focus:outline-none transition"
                      type="email" autocomplete="email" />
                  </div>

                  <div>
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider">{{ __('Teléfono') }}</label>
                    <input name="phone" placeholder="+34 ..."
                      class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus-ring focus:outline-none transition"
                      type="tel" autocomplete="tel" />
                  </div>

                  <!-- Servicio: simple -->
                  <div class="sm:col-span-2">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider">{{ __('Servicio') }}</label>
                    <div class="mt-2 flex flex-wrap gap-2">
                      <label
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm cursor-pointer hover:border-[var(--liftRed)]/40 transition">
                        <input type="radio" name="service" value="Ingeniería" class="accent-[var(--liftRed)]"
                          required />
                        {{ __('Ingeniería') }}
                      </label>
                      <label
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm cursor-pointer hover:border-[var(--liftRed)]/40 transition">
                        <input type="radio" name="service" value="Supervisión" class="accent-[var(--liftRed)]" />
                        {{ __('Supervisión') }}
                      </label>
                      <label
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm cursor-pointer hover:border-[var(--liftRed)]/40 transition">
                        <input type="radio" name="service" value="Inspección" class="accent-[var(--liftRed)]" />
                        {{ __('Inspección') }}
                      </label>
                      <label
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm cursor-pointer hover:border-[var(--liftRed)]/40 transition">
                        <input type="radio" name="service" value="Formación" class="accent-[var(--liftRed)]" />
                        {{ __('Formación') }}
                      </label>
                    </div>
                  </div>

                  <div class="sm:col-span-2">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider">{{ __('Asunto') }}</label>
                    <input name="subject" required placeholder="{{ __('Ej: Plan de izaje para carga de 20t') }}"
                      class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus-ring focus:outline-none transition"
                      type="text" />
                  </div>

                  <div class="sm:col-span-2">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wider">{{ __('Mensaje') }}</label>
                    <textarea name="message" required rows="6"
                      placeholder="{{ __('Ubicación, fecha, carga aproximada, entorno, medios disponibles...') }}"
                      class="mt-2 w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm focus-ring focus:outline-none transition resize-y"></textarea>

                    <!-- Mini helper pero limpio -->
                    <div class="mt-3 flex flex-wrap gap-2 text-xs text-gray-500">
                      <span
                        class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-3 py-1">
                        <i class="fa-solid fa-location-dot text-[var(--liftRed)]"></i> {{ __('Ubicación') }}
                      </span>
                      <span
                        class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-3 py-1">
                        <i class="fa-solid fa-weight-hanging text-[var(--liftRed)]"></i> {{ __('Carga') }}
                      </span>
                      <span
                        class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-3 py-1">
                        <i class="fa-solid fa-calendar-days text-[var(--liftRed)]"></i> {{ __('Fecha') }}
                      </span>
                      <span
                        class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-white px-3 py-1">
                        <i class="fa-solid fa-truck-ramp-box text-[var(--liftRed)]"></i> {{ __('Medios') }}
                      </span>
                    </div>
                  </div>

                  <div class="sm:col-span-2 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between pt-2">
                    <label class="flex items-center gap-2 text-xs text-gray-600">
                      <input type="checkbox" name="privacy" required class="accent-[var(--liftRed)]" />
                      <span>{{ __('Acepto la política de privacidad para gestionar la consulta.') }}</span>
                    </label>

                    <button type="submit"
                      class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-xl font-extrabold bg-[var(--liftRed)] text-white hover:bg-[var(--liftDark)] transition-all duration-300 ease-spring shadow-[0_18px_55px_rgba(255,51,51,0.20)]">
                      <i class="fa-solid fa-paper-plane"></i>
                      {{ __('Enviar') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>


          </div>

          <!-- SIDEBAR (1 sola tarjeta + mapa) -->
          <aside class="lg:col-span-5 space-y-5">
            <!-- Contacto directo -->
            <div
              class="rounded-[1.6rem] border border-gray-200 bg-white/80 backdrop-blur p-6 sm:p-7 shadow-[0_16px_50px_rgba(15,23,42,0.08)]">
              <p class="text-[10px] font-extrabold tracking-[0.32em] uppercase text-[var(--liftRed)]">
                {{ __('Directo') }}
              </p>
              <h3 class="mt-2 text-2xl font-extrabold text-[var(--liftDark)]"
                style="font-family: Montserrat, system-ui">
                {{ __('Contacto') }}
              </h3>

              <div class="mt-6 space-y-3">
                <a href="tel:+34877054410"
                  class="group flex items-center justify-between gap-3 rounded-2xl border border-gray-200 bg-white px-4 py-3 hover:border-[var(--liftRed)]/40 transition">
                  <div class="flex items-center gap-3 min-w-0">
                    <span
                      class="w-10 h-10 rounded-xl bg-[var(--liftRed)]/10 border border-[var(--liftRed)]/15 flex items-center justify-center">
                      <i class="fa-solid fa-phone text-[var(--liftRed)]"></i>
                    </span>
                    <div class="min-w-0">
                      <p class="text-sm font-extrabold text-[var(--liftDark)]">{{ __('Teléfono') }}</p>
                      <p class="text-sm text-gray-600 truncate">+34 877 054 410</p>
                    </div>
                  </div>
                  <i
                    class="fa-solid fa-arrow-right text-gray-400 group-hover:text-[var(--liftRed)] transition-colors"></i>
                </a>

                <a href="mailto:info@lift-es.com"
                  class="group flex items-center justify-between gap-3 rounded-2xl border border-gray-200 bg-white px-4 py-3 hover:border-[var(--liftRed)]/40 transition">
                  <div class="flex items-center gap-3 min-w-0">
                    <span
                      class="w-10 h-10 rounded-xl bg-[var(--liftRed)]/10 border border-[var(--liftRed)]/15 flex items-center justify-center">
                      <i class="fa-solid fa-envelope text-[var(--liftRed)]"></i>
                    </span>
                    <div class="min-w-0">
                      <p class="text-sm font-extrabold text-[var(--liftDark)]">Email</p>
                      <p class="text-sm text-gray-600 truncate">info@lift-es.com</p>
                    </div>
                  </div>
                  <i
                    class="fa-solid fa-arrow-right text-gray-400 group-hover:text-[var(--liftRed)] transition-colors"></i>
                </a>

                <a href="https://wa.me/34608824788" target="_blank" rel="noopener noreferrer"
                  class="group flex items-center justify-between gap-3 rounded-2xl border border-gray-200 bg-white px-4 py-3 hover:border-[var(--liftRed)]/40 transition">
                  <div class="flex items-center gap-3 min-w-0">
                    <span
                      class="w-10 h-10 rounded-xl bg-[var(--liftRed)]/10 border border-[var(--liftRed)]/15 flex items-center justify-center">
                      <i class="fa-brands fa-whatsapp text-[var(--liftRed)]"></i>
                    </span>
                    <div class="min-w-0">
                      <p class="text-sm font-extrabold text-[var(--liftDark)]">WhatsApp</p>
                      <p class="text-sm text-gray-600 truncate">{{ __('Chat directo') }}</p>
                    </div>
                  </div>
                  <i
                    class="fa-solid fa-arrow-right text-gray-400 group-hover:text-[var(--liftRed)] transition-colors"></i>
                </a>
              </div>

              <div class="mt-6 grid grid-cols-1 gap-3">
                <div class="rounded-2xl border border-gray-200 bg-white p-4">
                  <p class="text-xs text-gray-500">{{ __('Horario') }}</p>
                  <p class="mt-1 font-extrabold text-[var(--liftDark)]">{{ __('Lunes a Viernes') }}</p>
                  <p class="text-xs text-gray-500">09:00 – 18:00</p>
                </div>

              </div>
            </div>

            <!-- Mapa -->
            <div id="mapa"
              class="rounded-[1.6rem] border border-gray-200 bg-white overflow-hidden shadow-[0_16px_50px_rgba(15,23,42,0.08)]">
              <div class="px-6 py-5 border-b border-gray-200 bg-white">
                <div class="flex items-center justify-between gap-4">
                  <h3 class="text-lg font-extrabold text-[var(--liftDark)]" style="font-family: Montserrat, system-ui">
                    Ubicación
                  </h3>
                  <span class="text-xs font-bold text-gray-500">{{ __('Mapa') }}</span>
                </div>
                <p class="mt-1 text-sm text-gray-500">
                  Moll de Lleida, bloque 3, Oficina B, 43004 Tarragona
                </p>
              </div>

              <div class="aspect-[16/10] sm:aspect-video">
                <iframe title="Mapa LIFT" class="w-full h-full" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d777.0255105327265!2d1.2457442602415973!3d41.105994014401475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a3fdc7e61ac7f5%3A0x921e8275f1d17c3c!2sLIFT%20Ingenier%C3%ADa!5e1!3m2!1ses!2ses!4v1770044727502!5m2!1ses!2ses"></iframe>
              </div>

              <div class="p-5 bg-white">
                <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
                  <p class="text-sm text-gray-700">
                    <i class="fa-solid fa-location-dot text-[var(--liftRed)] mr-2"></i>
                    <span class="font-semibold">Moll de Lleida, bloque 3, Oficina B, 43004 Tarragona</span>
                  </p>
                  <a href="https://www.google.com/maps?q=Moll+de+Lleida,+bloque+3,+Oficina+B,+43004+Tarragona"
                    target="_blank" rel="noopener"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl border border-gray-200 text-sm font-extrabold text-[var(--liftDark)] hover:border-[var(--liftRed)]/40 hover:text-[var(--liftRed)] transition">
                    {{ __('Abrir en Maps') }} <i class="fa-solid fa-arrow-up-right-from-square"></i>
                  </a>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>


  </main>

  <x-footer />

  <!-- Botón WhatsApp flotante (igual que tu home) -->
  <a href="https://wa.me/34608824788" target="_blank" rel="noopener noreferrer"
    class="fixed bottom-8 right-8 bg-[#25D366] w-14 h-14 rounded-full flex items-center justify-center text-white text-2xl shadow-xl shadow-green-500/30 z-[200] hover:scale-110 hover:rotate-12 transition-all"
    aria-label="WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</body>

</html>
