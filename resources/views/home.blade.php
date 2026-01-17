<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="{{ asset('css.css') }}"> -->
     <link rel="stylesheet" href="{{ asset('css.css') }}?v={{ filemtime(public_path('css.css')) }}">

    <title>Lucas DUVERNEUIL - Portfolio</title>

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
    <script src="{{ asset('scroll-arrow.js') }}" defer></script>
    <script src="{{ asset('ddn.js') }}" defer></script>
    <script src="{{ asset('accordion.js') }}" defer></script>
    <script src="{{ asset('carousel.js') }}" defer></script>
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

<a class="c-btn cv-btn bold" id="cv-btn" target="_blank" href="{{ asset('cv-duverneuil_internet_2026.png') }}">
    <span>Voir mon CV</span>
</a>

<div class="container black">
    <div class="title-cont">
        <img src="{{ asset('LD.png') }}" alt="Logo lucas duverneuil">
        <div>
            <h1>Lucas<br>DUVERNEUIL</h1>
            <h2 style="font-size: 1.5em;">Concepteur Multimédia</h2>
        </div>
    </div>
</div>

{{-- ========== PARTICLES ========== --}}
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<div id="particles-js"></div>
<script src="{{ asset('particles-js-settings.js') }}" defer></script>

{{-- ========== ANIMATE ON SCROLL ========== --}}
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script defer>
    AOS.init();
</script>

{{-- ========== MATERIAL ICONS ========== --}}
<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>

<div class="arrow" data-aos="fade-up" id="arrow">&#8595;<img src="inkpx-curved-text.png" alt="image découvrir plus" class="spinning-image" id="arrow-roundtext" alt=""><div id="start"></div></div>

<div class="centered-container" data-aos="fade-up">
    <div class="flex">
        <img class="pres-img spin" src="profile-pic (1).png" alt="Photo de lucas duverneuil" alt="">
        <div>
            <div class="short-pres title" data-aos="fade-up">Je suis <span class="underlined">Lucas DUVERNEUIL</span>, j'ai <span class="underlined" id="span-age"><span id="age">00</span> ans</span>, et je suis concepteur multimédia.</div>
            <div class="short-pres" data-aos="fade-up">Auto-Entrepreneur, <!--<a href="https://www.iut.u-bordeaux-montaigne.fr/" target="_blank" class="link short-link">l'IUT Bordeaux Montaigne</a>--> je conçois des solutions numériques adaptées à vos besoins, comme des sites webs, court-métrages, bandes d'annonces, flyers, infographies, musiques...</div>
            <div class="short-pres" data-aos="fade-up">J'aime beaucoup apprendre, échanger et me perfectionner. Mes maîtres mots sont <span class="underlined">Respect</span>, <span class="underlined">Sérieux</span> et <span class="underlined">Persévérance</span>.</div>
        </div>
    </div>
</div>

<div class="centered-container">
    <h3 data-aos="fade-up" class="centered-container-title">À propos</h3>
    <div data-aos="fade-up">
        <div class="short-pres">
            Apréciant les jeux vidéos dès mes 8 ans, j'y ai exploré l'informatique, puis me suis perfectionné en découvrant le command block, où j'ai trouvé ma passion pour la programmation. En autodidacte, j'ai développé des robots Discord, et plus tard, débuté mon parcours dans le développement web avec HTML, CSS et PHP, créant mon propre site, un forum simple. Intégrer l'IUT MMI de Bordeaux Montaigne a été un honneur, permettant de fusionner mes intérêts pour le développement, le design et l'audiovisuel, tout en réalisant divers projets, dont la refonte de sites web et la création d'un blog. Pour découvrir davantage mes réalisations, consultez mon portfolio.
        </div>
        <a class="c-btn bold" href="./presentation/">
            <span>En savoir plus</span>
        </a>
    </div>
</div>

{{-- ========== A LA UNE ========== --}}
<div class="centered-container">
    @if($projectune)
    <h3 class="realisations centered-container-title" data-aos="fade-up">Réalisations</h3>

    <div data-aos="fade-up">
        <div class="a-la-une-title bold">À la une</div>

        <div class="projet-une" style="position: relative;">
            <img src="{{ asset('storage/'.$projectune->img_pic) }}"
                alt="photo du projet {{ $projectune->title }}">

            <div class="une-pro-info" style="z-index:2;">
                <div class="project-info">
                    <p class="discret regular">
                        Le {{ \Carbon\Carbon::parse($projectune->date)->format('d/m/Y') }}
                    </p>

                    <h3 class="centered-container-title">{{ $projectune->title }}</h3>
                    <p>{{ $projectune->description }}</p>

                </div>

                    @if($projectune->isExternal())
                        <div class="bottom-a-la-une bold">
                            <a class="c-btn btn-bot glow-btn" target="_blank" href="{{ $projectune->link }}">
                                <span>En savoir plus</span>
                            </a>
                        </div>
                    @else
                        <div class="bottom-a-la-une bold">
                            <a class="c-btn btn-bot glow-btn" target="_blank" href="{{ route('projects.show', $projectune->slug) }}">
                                <span>En savoir plus</span>
                            </a>
                        </div>
                    @endif

            </div>

            <div class="background-image a-la-une-bg-img"
                style="background-image: url('{{ asset('storage/'.$projectune->img_pic) }}');">
            </div>

        </div>
    </div>

    @endif

{{-- ========== CAROUSEL PROJECTS ========== --}}
    <div class="carousel-container" data-aos="fade-up">
        <div class="carousel">
            @foreach($projects as $p)
                <div class="project cust-slide">
                    <div class="project-cont">
                        <div class="project-info">
                            <p class="discret regular">
                                Le {{ \Carbon\Carbon::parse($p->date)->format('d/m/Y') }}
                            </p>
                            <h3 class="centered-container-title">{{ $p->title }}</h3>
                            <p>{{ $p->description }}</p>

                        </div>

                        @if($p->isExternal())
                        <div class="bold" style="width: 100%; height: 60px;">
                            <a class="c-btn btn-bot" target="_blank" href="{{ $p->link }}">
                                <span>En savoir plus</span>
                            </a>
                        </div>
                        @else
                        <div class="bold" style="width: 100%; height: 60px;">
                            <a class="c-btn btn-bot" target="_blank" href="{{ route('projects.show', $p->slug) }}">
                                <span>En savoir plus</span>
                            </a>
                        </div>
                        @endif

                    </div>

                    <div class="background-image"
                        style="background-image: url('{{ asset('storage/'.$p->img_pic) }}');">
                    </div>
                </div>
            @endforeach
        </div>

        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>
</div>

<div class="centered-container">
    <h3 data-aos="fade-up" class="centered-container-title">Mes compétences</h3>

    <div class="accordion" data-aos="fade-up">
        <div class="accordion-title">
            Développement Web<span class="accordion-arrow"></span>
        </div>
        <div class="panel">
            <ul>
                <li>Élaboration de chartes graphiques.</li>
                <li>Développement de sites web à partir de zéro ou avec des frameworks.</li>
                <li>Programmation en JavaScript.</li>
                <li>Création de modules pour WordPress.</li>
                <li>Elaboration et manipulation de bases de données.</li>
                <li>Intégration web</li>
            </ul>
        </div>
    </div>

    <div class="accordion" data-aos="fade-up">
        <div class="accordion-title">
            Développement de Jeux Vidéo et Bots<span class="accordion-arrow"></span>
        </div>
        <div class="panel">
            <p>
            Développement de jeux vidéos sur Unity.
            Création de bots Discord en utilisant JavaScript ou Python.
            </p>
        </div>
    </div>

    <div class="accordion" data-aos="fade-up">
        <div class="accordion-title">
            Multimédia, Audiovisuel et Animation<span class="accordion-arrow"></span>
        </div>
        <div class="panel">
            <p>
            Maîtrise de la photographie, du cadrage et de la réalisation vidéo.
            Compétences avancées en montage vidéo et animations 3D.
            Compétences avancées en streaming vidéo.
            </p>
        </div>
    </div>

    <div class="accordion" data-aos="fade-up">
        <div class="accordion-title">
            Musique et Audio<span class="accordion-arrow"></span>
        </div>
        <div class="panel">
            <p>
            Composition musicale sur des logiciels d'ordinateur.
            </p>
        </div>
    </div>
</div>
<div class="centered-container">
    <div class="flex skills">
        <div class="skills-software-grid">
            <h3 data-aos="fade-up" class="centered-container-title">Frameworks</h3>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">Wordpress</div>
                <img class="software-img" src="icons/wordpress.png" alt="wordpress">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 65%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">Bootstrap</div>
                <img class="software-img" src="icons/bootstrap.png" alt="bootstrap">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 40%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">Laravel</div>
                <img class="software-img" src="icons/laravel.png" alt="laravel">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 45%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">Hugo</div>
                <img class="software-img" src="icons/hugo.png" alt="hugo">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 15%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">Rails</div>
                <img class="software-img" src="icons/rails.png" alt="rails">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 10%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">Tailwind</div>
                <img class="software-img" src="icons/tailwind.png" alt="tailwind">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 15%;"></div>
                </div>
            </div>
            
        </div>
        <div class="skills-software-grid">
            <h3 data-aos="fade-up" class="centered-container-title">Langages</h3>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">PHP</div>
                <img class="software-img" src="icons/php.png" alt="php">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 95%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">SQL</div>
                <img class="software-img" src="icons/sql.png" alt="sql">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 90%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">CSS</div>
                <img class="software-img" src="icons/css.png" alt="css">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 90%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">JS</div>
                <img class="software-img" src="icons/js.png" alt="js">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 85%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">C#</div>
                <img class="software-img" src="icons/csharp.png" alt="csharp">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 40%;"></div>
                </div>
            </div>

            <div class="skill-software" data-aos="fade-up">
                <div class="info-box">C++</div>
                <img class="software-img" src="icons/cpp.png" alt="c++">
                <div class="progress-container">
                    <div class="progress-bar" id="myProgressBar" style="width: 10%;"></div>
                </div>
            </div>

        </div>
    </div>
</div>

@if($certifications->isNotEmpty())
<div class="centered-container">
    <h3 data-aos="fade-up" class="centered-container-title">Certifications</h3>



        @foreach($certifications as $certification)
            <a href="{{ $certification->external_url }}"
            target="_blank"
            data-aos="fade-up"
            class="cert-container">

                <div class="cert-top">
                    @if($certification->logo)
                        <img src="{{ asset('storage/'.$certification->logo) }}"
                            alt="{{ $certification->title }}"
                            class="cert-img">
                    @endif

                    <div class="cert-info">
                        <h4>{{ $certification->title }}</h4>
                        <span style="opacity: 0.7;">{{ $certification->obtained_at->format('Y') }}</span>
                    </div>
                </div>
                <span>{{ $certification->short_description }}</span>
            </a>
        @endforeach



</div>
@endif

{{-- ========== AVIS CLIENTS ========== --}}
@if($rates->isNotEmpty())
<div class="centered-container">
    <h3 data-aos="fade-up" class="centered-container-title">Ils me font confiance</h3>

    <div class="carousel-container" data-aos="fade-up">
        <div class="carousel">
            @foreach($rates as $r)
                <div class="review cust-slide">
                    <div class="review-img">
                        <img src="{{ asset('storage/'.$r->avatar) }}" alt="photo de {{ $r->name }}">
                    </div>

                    <div class="review-infos">
                        <div class="review-title">{{ $r->name }}</div>
                        <div class="review-subtitle">
                            {{ $r->meeting }} – {{ \Carbon\Carbon::parse($r->date)->format('Y') }}
                        </div>
                        <div class="review-desc">
                            {{ $r->description }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>
</div>
@endif

<div class="centered-container">
    <h3 data-aos="fade-up" class="centered-container-title">Contact</h3>
    <a data-aos="fade-up" href="https://www.linkedin.com/in/lucas-duverneuil-838384223/" target="_blank" class="link mb" style="font-size: 17px;">LinkedIn</a><br>
    <a data-aos="fade-up" href="tel:+33633975837" class="link mb" style="font-size: 17px;" target="_blank">06 33 97 58 37</a><br>
    <a data-aos="fade-up" href="mailto:lucas.duverneuil16@gmail.com" class="link mb extreme-short-link" target="_blank">lucas.duverneuil16@gmail.com</a>

    <div class="foot-madewithlaravel aos-init aos-animate" data-aos="fade-up">
        <span style="margin:0 auto;">Fait avec <span style="color:#e25555;">&#10084;</span> grâce à <a href="https://laravel.com/" target="_blank" class="link"><img src="{{ asset('laravel-white.png') }}" alt="" class="laravel-logo">Laravel</a></span>
    </div>
</div>

</body>
</html>
