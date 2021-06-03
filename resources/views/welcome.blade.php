<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elixir - Accueil</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- INTEGRATION TAILWIND -->
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="antialiased leading-normal tracking-normal">

        <livewire:header />


        <!-- CAROUSEL -->
        <div class="carousel">
            <div class="carousel-inner">
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item">
                    <img src="images/string_elixir.png" class="imgCarousel">
                </div>
                <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item">
                    <img src="images/type_elixir.png" class="imgCarousel">
                </div>
                <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item">
                    <img src="images/basslotof.jpg" class="imgCarousel">
                </div>
                <label for="carousel-3" class="carousel-control prev control-1">‹</label>
                <label for="carousel-2" class="carousel-control next control-1">›</label>
                <label for="carousel-1" class="carousel-control prev control-2">‹</label>
                <label for="carousel-3" class="carousel-control next control-2">›</label>
                <label for="carousel-2" class="carousel-control prev control-3">‹</label>
                <label for="carousel-1" class="carousel-control next control-3">›</label>
                <ol class="carousel-indicators">
                    <li>
                        <label for="carousel-1" class="carousel-bullet">•</label>
                    </li>
                    <li>
                        <label for="carousel-2" class="carousel-bullet">•</label>
                    </li>
                    <li>
                        <label for="carousel-3" class="carousel-bullet">•</label>
                    </li>
                </ol>
            </div>
        </div>


        <!-- INFOS -->
        <div class="grid sm:grid-flow-col md:grid-cols-3 gap-4">

            <div class="text-center mb-4">

                <h3 class="h3WelcomePage"> UN SON INCROYABLE QUI DURE </h3>
                <p class="pWelcomePage px-6 py-3"> Les cordes Elixir ont une longévité
                    sonore toujours inégalée par rapport
                    a n'importe quelle autre corde du marché.
                    Le son reste pur, concert après concert,
                    record après record. </p>

            </div>

            <div class="text-center mb-4">

                <h3 class="h3WelcomePage"> UNE PERFORMANCE FIABLE </h3>
                <p class="pWelcomePage px-6 py-3"> Les cordes Elixir peuvent resister à
                    d'énormes écarts de température,
                    voire aux pires conditions d'humidité.
                    Nos cordes offrent une performance constante
                    quel que soit l'environnement. </p>

            </div>

            <div class="text-center mb-4">

                <h3 class="h3WelcomePage"> UNE PLUS GRANDE STABILITÉ D'ACCORDAGE </h3>
                <p class="pWelcomePage px-6 py-3"> Les musiciens affirment que les cordes
                    Elixir restent accordées plus longtemps,
                    évitant ainsi de devoir vous réaccorder sans arrêt. </p>

            </div>

        </div>

        <!-- ABONNEZ-VOUS -->
        <div>

            <img style="width: 100vw;" src="images/guitarlotof.jpg">

        </div>


        <livewire:footer />

        @livewireScripts
    </body>
</html>
