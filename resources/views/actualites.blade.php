<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Actualités</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

    @livewireStyles

</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent">

    <!-- GRID DES ACTUALITÉS -->
    <div class="grid pb-5 sm:grid-cols-3 sm:grid-cols-4 sm:gap-4">

    @if($actualites->count() !== 0)

            <!-- TITLE DE LA PAGE -->
            <div class="grid grid-cols-6 gap-4 mb-4">
                <div class="col-start-2 col-span-4">
                    <h1 class="titleCustomClass mt-4 text-center"> ACTUALITÉS </h1>
                    <h3 class="sousTitleCustomClass text-center"> Retrouvez toutes nos actualités par date de
                        sortie. </h3>
                </div>
            </div>

        @foreach($actualites as $actualite)

            <!-- ACTU GAUCHE -->
                <div class="col-start-1 sm:col-start-1 col-end-3">
                    <livewire:actualite :actualite="$actualite"/>
                </div>

                <!-- ACTU DROITE -->
                <div class="col-start-1 sm:col-start-3 col-end-5">
                    <livewire:actualite :actualite="$actualite"/>
                </div>

        @endforeach

    @else

            <!-- SI AUCUNES ACTUALITES -->
            <div class="col-start-1 col-span-4">
                <div style="padding: 30vh;">
                    <h1 class="titleCustomClass mt-4 text-center"> AUCUNE ACTUALITÉ </h1>
                    <h3 class="sousTitleCustomClass text-center"> Quel dommage :( il n'y a rien a lire, mais pas rien a
                        acheter ! </h3>
                </div>
            </div>

    @endif


    </div>
</div>

<livewire:footer/>

@livewireScripts
</body>
</html>

