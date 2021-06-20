<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Actualité {{ $actualite->id }}</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles

</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-3" >

    <!-- TITLE DE L'ACTU -->
    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> {{ $actualite->name }} </h1>
            <p class="text-center actualiteDate" style="color: black;"> {{ $dateFormat }} </p>
        </div>
    </div>

    <!-- SOUS TITRE DE L'ACTU -->
    <div class="grid grid-cols-4 gap-4 my-3">

        <h3 class="col-start-2 col-end-4 text-center titleHeaderClass"> {{ $actualite->short_description }} </h3>

    </div>


    <div class="grid grid-cols-6 gap-4 my-6">

        <p class="col-start-2 col-end-6"> {!! nl2br($actualite->description) !!} </p>

    </div>

</div>

<livewire:footer/>

@livewireScripts
</body>
</html>

