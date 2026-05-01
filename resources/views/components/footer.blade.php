<footer class="bg-white p-12 relative overflow-hidden">
  <div class="container mx-auto px-6 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-16 mb-20">

      <div class="lg:col-span-4 space-y-6 md:space-y-8 text-center md:text-left">
        <a href="/" class="inline-block">
          <img
            src="{{ optional(\App\Models\Page::where('slug', 'global')->first())->getBlockSrc('logo', 'img/branding/Asset-7-1.png') ?? \App\Models\Page::resolveBlockSrc('img/branding/Asset-7-1.png') }}"
            alt="LIFT Logo" class="h-12 w-auto mx-auto md:mx-0 transition-transform duration-500 hover:scale-105" />
        </a>
        <h3 class="text-lg md:text-xl font-heading font-medium text-liftDark leading-relaxed max-w-sm mx-auto md:mx-0">
          {{ __('Asesoramiento técnico, ingeniería y formación en') }}
          <span class="text-liftRed font-bold">{{ __('movimientos mecánicos de cargas.') }}</span>
        </h3>
      </div>

      <div class="lg:col-span-2 text-center md:text-left">
        <h4 class="font-heading font-bold uppercase text-[11px] tracking-[0.2em] text-gray-400 mb-6 md:mb-8">
          {{ __('Navegación') }}
        </h4>
        <ul class="space-y-4 font-bold text-xs uppercase tracking-widest text-liftDark">
          <li>
            <a href="{{ route('formacion') }}"
              class="hover:text-liftRed transition-colors flex items-center justify-center md:justify-start group">
              <span
                class="hidden md:block w-0 group-hover:w-4 h-px bg-liftRed mr-0 group-hover:mr-2 transition-all"></span>
              {{ __('Formación') }}
            </a>
          </li>
          <li>
            <a href="{{ route('ingenieria') }}"
              class="hover:text-liftRed transition-colors flex items-center justify-center md:justify-start group">
              <span
                class="hidden md:block w-0 group-hover:w-4 h-px bg-liftRed mr-0 group-hover:mr-2 transition-all"></span>
              {{ __('Ingeniería') }}
            </a>
          </li>
          <li>
            <a href="{{ route('proyectos') }}"
              class="hover:text-liftRed transition-colors flex items-center justify-center md:justify-start group">
              <span
                class="hidden md:block w-0 group-hover:w-4 h-px bg-liftRed mr-0 group-hover:mr-2 transition-all"></span>
              {{ __('Proyectos') }}
            </a>
          </li>
          <li>
            <a href="{{ route('contacto') }}"
              class="hover:text-liftRed transition-colors flex items-center justify-center md:justify-start group">
              <span
                class="hidden md:block w-0 group-hover:w-4 h-px bg-liftRed mr-0 group-hover:mr-2 transition-all"></span>
              {{ __('Contacto') }}
            </a>
          </li>
        </ul>
      </div>

      <div class="lg:col-span-3 text-center md:text-left">
        <h4 class="font-heading font-bold uppercase text-[11px] tracking-[0.2em] text-gray-400 mb-6 md:mb-8">
          {{ __('Contacto') }}
        </h4>
        <div class="space-y-5 flex flex-col items-center md:items-start">
          <div class="flex flex-col gap-3 w-full items-center md:items-start">
            <a href="tel:+34877054410" class="flex items-center gap-4 group">
              <span
                class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-liftDark group-hover:bg-liftRed group-hover:text-white transition-all duration-300">
                <i class="fas fa-phone-alt text-xs"></i>
              </span>
              <span class="text-sm font-bold text-gray-700 group-hover:text-liftRed transition-colors">+34 877 05 44
                10</span>
            </a>
            <a href="tel:+34608824788" class="flex items-center gap-4 group">
              <span
                class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-liftDark group-hover:bg-liftRed group-hover:text-white transition-all duration-300">
                <i class="fas fa-mobile-alt text-xs"></i>
              </span>
              <span class="text-sm font-bold text-gray-700 group-hover:text-liftRed transition-colors">+34 608 824
                788</span>
            </a>
          </div>
          <a href="mailto:info@lift-es.com" class="flex items-center gap-4 group">
            <span
              class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-liftDark group-hover:bg-liftRed group-hover:text-white transition-all duration-300">
              <i class="fas fa-envelope text-xs"></i>
            </span>
            <span
              class="text-sm font-bold text-gray-700 group-hover:text-liftRed transition-colors">info@lift-es.com</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-3 text-center md:text-left">
        <h4 class="font-heading font-bold uppercase text-[11px] tracking-[0.2em] text-gray-400 mb-6 md:mb-8">
          {{ __('Síguenos en') }}
        </h4>
        <div class="flex justify-center md:justify-start gap-3">
          <a href="https://www.linkedin.com/company/liftingenieria/?originalSubdomain=es"
            aria-label="LinkedIn Lift Ingeniería"
            class="w-12 h-12 rounded-full border border-gray-100 flex items-center justify-center text-liftDark hover:bg-liftDark hover:text-white transition-all duration-500 hover:-translate-y-1">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="https://www.facebook.com/people/Global-LIFT/100064135205000/#" aria-label="Facebook Lift Ingeniería"
            class="w-12 h-12 rounded-full border border-gray-100 flex items-center justify-center text-liftDark hover:bg-liftDark hover:text-white transition-all duration-500 hover:-translate-y-1">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="https://www.youtube.com/channel/UCKt3UshqBBaJtHE-uMvPobA" aria-label="YouTube Lift Ingeniería"
            class="w-12 h-12 rounded-full border border-gray-100 flex items-center justify-center text-liftDark hover:bg-liftDark hover:text-white transition-all duration-500 hover:-translate-y-1">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="https://x.com/lift_ingenieria" aria-label="X Twitter Lift Ingeniería"
            class="w-12 h-12 rounded-full border border-gray-100 flex items-center justify-center text-liftDark hover:bg-liftDark hover:text-white transition-all duration-500 hover:-translate-y-1">
            <i class="fab fa-x"></i>
          </a>
        </div>
      </div>
    </div>

    <div class=" border-t border-gray-100 flex flex-col items-center gap-6 pt-4">
      <div
        class="flex flex-col md:flex-row items-center gap-4 md:gap-6 text-[10px] font-bold text-gray-400 uppercase tracking-[0.15em] text-center">
        <p>© 2025 • GLOBAL LIFT INGENIERÍA S.L.</p>
      </div>

      <div class="text-[10px] font-bold tracking-[0.2em] text-gray-300 z-500">
        {{ __('DISEÑO WEB POR') }}
        <a href="https://tarracowebs.com"
          class="text-gray-500 hover:text-liftDark transition-colors border-b border-gray-200 hover:border-liftRed pb-0.5">TarracoWebs</a>
      </div>
    </div>
  </div>
</footer>