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
            <div class="grid grid-cols-6 gap-4">
                <div class="col-start-2 col-span-4">
                    <h1 class="titleCustomClass mt-4 text-center"> ACTUALITÉS </h1>
                    <h3 class="sousTitleCustomClass text-center"> Retrouvez toutes nos actualités par date de sortie. </h3>
                </div>
            </div>

            <!-- GRID DES ACTUALITÉS -->
            <div class="grid grid-cols-3 md:grid-cols-8 md:gap-4">
                <div class="col-start-1 md:col-start-2 col-end-4 ...">1</div>
                <div class="col-start-1 md:col-start-5 col-end-8 ...">2</div>
            </div>

            @livewireScripts
        </body>
</html>

