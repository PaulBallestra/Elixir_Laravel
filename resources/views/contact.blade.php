<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elixir - Contact</title>

        <!-- INTEGRATION TAILWIND -->
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles

    </head>
    <body class="antialiased">

        <!-- HEADER -->
        <livewire:header />


        <div class="">
            <h1 class="titleCustomClass mt-4"> UNE QUESTION ? </h1>
            <h3 class="sousTitleCustomClass"> Contactez-nous ! </h3>
        </div>


        @livewireScripts
    </body>
</html>
