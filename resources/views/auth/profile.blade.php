<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Abonnement</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-3">


    <!-- TITLE DE LA PAGE -->
    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> PROFIL </h1>
        </div>
    </div>

    <!-- ABONNEMENT CONTENT -->

    <!-- Si aucun abonnement -->
    <h3 class="sousTitleCustomClass text-center mx-auto"> Vous n'avez aucun abonnement pour le moment. </h3>
    <h3 class="sousTitleCustomClass text-center mx-auto">    Choisissez en un ci-dessous. </h3>


    <hr style="color: black;" class="mt-10 md:mb-5">




</div>

<livewire:footer />

@livewireScripts
</body>
</html>
