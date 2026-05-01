<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} – LIFT Ingeniería</title>

    {{-- SEO Meta --}}
    <meta name="description" content="{{ Str::limit(strip_tags($project->description ?? ''), 160) }}" />
    <meta name="author" content="LIFT Ingeniería S.L." />
    <meta name="theme-color" content="#ff3333" />
    <link rel="canonical" href="{{ url()->current() }}" />

    {{-- Open Graph --}}
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:site_name" content="LIFT Ingeniería" />
    <meta property="og:title" content="{{ $project->title }} – LIFT Ingeniería" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($project->description ?? ''), 160) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    @if($project->images->count())
        <meta property="og:image" content="{{ asset('storage/' . $project->images->first()->path) }}" />
    @else
        <meta property="og:image" content="{{ asset('img/hero/grua1.jpg') }}" />
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $project->title }} – LIFT Ingeniería" />
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($project->description ?? ''), 160) }}" />
    @if($project->images->count())
        <meta name="twitter:image" content="{{ asset('storage/' . $project->images->first()->path) }}" />
    @else
        <meta name="twitter:image" content="{{ asset('img/hero/grua1.jpg') }}" />
    @endif

    {{-- Favicon --}}
    @include('components.favicons')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-50">
    <x-header />

    <style>
        :root {
            --liftRed: #ff3333;
            --liftDark: #0b1020;
        }

        .project-hero {
            position: relative;
            height: 70vh;
            min-height: 500px;
            overflow: hidden;
        }

        .project-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(11, 16, 32, 0.3), rgba(11, 16, 32, 0.7));
            z-index: 1;
        }

        .project-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            padding: 3rem;
            background: linear-gradient(to top, rgba(11, 16, 32, 0.95), transparent);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            position: relative;
            aspect-ratio: 16/9;
            overflow: hidden;
            border-radius: 16px;
            cursor: pointer;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item:hover {
            transform: scale(1.03);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Lightbox */
        .lightbox {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .lightbox-close {
            position: absolute;
            top: 2rem;
            right: 2rem;
            font-size: 3rem;
            color: white;
            cursor: pointer;
            z-index: 10000;
        }
    </style>

    <!-- Hero Section -->
    <section class="project-hero">
        @if($project->cover_image)
            <img src="{{ str_starts_with($project->cover_image, 'projects/') ? asset('storage/' . $project->cover_image) : asset($project->cover_image) }}"
                alt="{{ $project->title }}">
        @else
            <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
        @endif

        <div class="project-hero-content">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-4">
                    <a href="{{ route('proyectos') }}"
                        class="text-white/70 hover:text-white text-sm font-medium transition-colors">
                        <i class="fa-solid fa-arrow-left mr-2"></i>Volver a Proyectos
                    </a>
                </nav>

                <!-- Tags -->
                @if($project->tags)
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(array_slice($project->tags_array, 0, 3) as $tag)
                            <span
                                class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-white border border-white/20 backdrop-blur-sm">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Title -->
                <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tight mb-4">
                    {{ $project->title }}
                </h1>

                <!-- Description -->
                @if($project->description)
                    <p class="text-lg text-white/90 max-w-3xl leading-relaxed">
                        {{ $project->description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    @if($project->images->count() > 0)
        <section class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4 md:px-6">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <div
                        class="inline-flex items-center gap-3 font-bold text-xs uppercase tracking-[0.2em] text-red-600 mb-3">
                        <span class="w-12 h-0.5 bg-red-600 rounded-full opacity-80"></span>
                        Galería
                        <span class="w-12 h-0.5 bg-red-600 rounded-full opacity-80"></span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 uppercase tracking-tight">
                        Imágenes del Proyecto
                    </h2>
                </div>

                <!-- Gallery Grid -->
                <div class="gallery-grid">
                    @foreach($project->images as $image)
                        <div class="gallery-item" onclick="openLightbox('{{ $image->image_url }}')">
                            <img src="{{ $image->image_url }}" alt="{{ $project->title }} - Imagen {{ $loop->iteration }}">
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center">
                                <i class="fa-solid fa-search-plus text-white text-3xl"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Project Info Section -->
    <section class="py-16 bg-slate-50">
        <div class="max-w-4xl mx-auto px-4 md:px-6 text-center">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
                <i class="fa-solid fa-briefcase text-red-600 text-5xl mb-6"></i>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Detalles del Proyecto</h3>
                <p class="text-slate-600 leading-relaxed mb-8">
                    {{ $project->description ?? 'Proyecto de ingeniería y supervisión técnica con altos estándares de calidad y seguridad.' }}
                </p>
                <a href="{{ route('contacto') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-lg transition-all">
                    Consulta sobre este proyecto
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="lightbox-close">&times;</span>
        <img id="lightbox-img" src="" alt="">
    </div>

    <script>
        function openLightbox(src) {
            document.getElementById('lightbox').classList.add('active');
            document.getElementById('lightbox-img').src = src;
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close lightbox with Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeLightbox();
        });
    </script>

    <x-footer />
</body>

</html>
