<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elixir - Actualités</title>

        <!-- INTEGRATION TAILWIND -->
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles

    </head>
        <body class="antialiased">

            <!-- HEADER -->
            <livewire:header />

            <!-- TITLE DE LA PAGE -->
            <div class="grid grid-cols-6 gap-4 mb-4">
                <div class="col-start-2 col-span-4">
                    <h1 class="titleCustomClass mt-4 text-center"> ACTUALITÉS </h1>
                    <h3 class="sousTitleCustomClass text-center"> Retrouvez toutes nos actualités par date de sortie. </h3>
                </div>
            </div>

            <!-- GRID DES ACTUALITÉS -->
            <div class="grid grid-cols-3 sm:grid-cols-4 sm:gap-4">

                <!-- ACTU 1 -->
                <div class="col-start-1 sm:col-start-1 col-end-3">

                    <!-- SQUELETTE ACTUALITE -->
                    <livewire:actualite />

                </div>

                <!-- ACTU 2 -->
                <div class="col-start-1 sm:col-start-3 col-end-5">

                    <div class="divActualite" style="background-image: url({{asset('images/guitarlotof.jpg')}})">

                        <div class="divActualiteInfos">

                            <p class="actualiteDate"> 24/04/2021 </p>
                            <h3 class="actualiteTitle"> VOTRE GUITARE MÉRITE MIEUX </h3>
                            <div class="grid grid-cols-4 gap-4">
                                <p class="actualiteContent col-start-1 col-end-4">
                                    Grâce aux cordes Elixir, votre jeu ne sera que
                                    plus qualitatif. Une durée de vie allongée,
                                    et une tenue d'accordage solide.
                                    Votre guitare vous remerciera !
                                </p>
                            </div>

                            <div class="flex flex-column">
                                <p style="align-items: flex-end" class="actualiteBtnSuite"> Lire la suite >> </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @livewireScripts
        </body>
</html>

