<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - 404</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body class="antialiased">

    <!-- HEADER -->
    <livewire:header />

    <div class="backgroundContent" style="padding: 30vh;">
        <div class="container pt-5">
            <div class="alert alert-danger text-center">
                <h1 class="titleCustomClass mt-4 text-center">404</h1>
                <h3 class="sousTitleCustomClass text-center">Oops! Ce que vous cherchez n'existe pas !</h3>
            </div>
        </div>
    </div>

    <livewire:footer />

    @livewireScripts


</body>

</html>
