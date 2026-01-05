<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css.css') }}">

    <title>Lucas DUVERNEUIL - Projet</title>

    <meta name="description" content="Portfolio de Lucas DUVERNEUIL, concepteur multimédia, dans l'audiovisuel et la création de site webs.">
    <meta name="author" content="Lucas DUVERNEUIL">

    <meta property="og:title" content="Lucas DUVERNEUIL - Portfolio">
    <meta property="og:description" content="Portfolio de Lucas DUVERNEUIL, concepteur multimédia.">
    <meta property="og:image" content="{{ asset('LD.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <meta name="twitter:title" content="Lucas DUVERNEUIL">
    <meta name="twitter:description" content="Portfolio de Lucas DUVERNEUIL, concepteur multimédia.">

    <link rel="icon" type="image/x-icon" href="{{ asset('icons/LD_logo.ico') }}">

    <script src="{{ asset('loading.js') }}" defer></script>
    <script src="{{ asset('ddn.js') }}" defer></script>
    <script src="{{ asset('top-btn-onscroll.js') }}" defer></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-44DP7BXC9W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-44DP7BXC9W');
    </script>

    <!-- Microsoft Clarity -->
    <script>
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "mk137jd7lf");
    </script>
</head>

<body>

{{-- ========== LOADER ========== --}}
<div class="loader-wrapper">
    <div class="loader-content blinking-text">
        <div style="display:flex;flex-direction: column;text-align: center;">
            <img src="{{ asset('LD.png') }}" alt="Logo lucas duverneuil" style="margin:auto;max-width:80px;">
            <p style="color:white;font-weight:700;" id="loading_message"></p>
        </div>
    </div>
</div>

<a class="c-btn cv-btn bold" id="cv-btn" target="_blank" href="{{ asset('cv-duverneuil.pdf') }}">
    <span>Voir mon CV</span>
</a>

{{-- ========== PARTICLES ========== --}}
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<div id="particles-js"></div>
<script src="{{ asset('particles-js-settings.js') }}" defer></script>

{{-- ========== MATERIAL ICONS ========== --}}
<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>

<div class="centered-container project-page">

    {{-- ===== HERO ===== --}}
    <section class="project-hero">
        <div class="project-hero-text">
            <h1 class="project-title">{{ $project->title }}</h1>
            <p class="project-short-desc">{{ $project->description }}</p>
        </div>
    </section>

    {{-- ===== IMAGE PRINCIPALE ===== --}}
    <section class="project-cover">
        <img src="{{ asset('storage/'.$project->img_pic) }}"
             alt="Image principale du projet {{ $project->title }}">
    </section>

    {{-- ===== CONTENU ===== --}}
    <section class="project-content">
        <div class="project-content-inner">
            {!! nl2br(e($project->content)) !!}
        </div>
    </section>

    {{-- ===== GALERIE ===== --}}
    @if($project->images->count())
        <section class="project-gallery">
            <h2 class="gallery-title">Galerie</h2>


            <div class="gallery-grid">
                @foreach($project->images as $img)
                    <div class="gallery-item">
                    <img src="{{ asset('storage/'.$img->path) }}"
                         class="rounded-lg h-40 w-full object-cover
                         {{ $project->img_pic === $img->path ? 'ring-4 ring-indigo-500' : '' }}">
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</div>


</body>
</html>