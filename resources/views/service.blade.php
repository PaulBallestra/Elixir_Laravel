<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elixir - Services</title>

        <!-- INTEGRATION TAILWIND -->
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles

    </head>
    <body class="antialiased">

    <!-- HEADER -->
    <livewire:header />


    <div class="flex-column align-items-center justify-content-center">
        <h1 class="titleCustomClass mt-4"> NOTRE SERVICE </h1>
        <h3 class="sousTitleCustomClass"> Notre service vous permet de précommander des cordes Elixir,
            selon vos besoins (mois ou année). </h3>
    </div>

    @livewireScripts
    </body>
</html>
