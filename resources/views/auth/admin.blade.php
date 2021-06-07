<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Admin</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>


<!-- TITLE DE LA PAGE -->
<div class="grid grid-cols-6 gap-4 mb-4">
    <div class="col-start-2 col-span-4">
        <h1 class="titleCustomClass mt-4 text-center"> ADMIN </h1>
        <h3 class="sousTitleCustomClass text-center"> Gérez vos utilisateurs, actualités et abonnements </h3>
    </div>
</div>

<!-- ADMIN CONTENT -->


<div class="grid grid-cols-6 gap-4">

    <!-- USERS -->
    <a href=""><div class="col-start-1 col-end-3 py-4 px-8 bg-white shadow-lg rounded-lg my-20">
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold">12 Users</h2>
            <p class="mt-2 text-gray-600">Gérez vos utilisateurs, leurs emails, mot de passe, administrateurs ...</p>
        </div>
        <div class="flex justify-end mt-4">
            <a href="#" class="text-xl font-medium text-indigo-500">Gérer</a>
        </div>
    </div>
    </a>

    <!-- ABONNEMENTS -->
    <a href=""><div class="col-start-3 col-end-4 py-4 px-8 bg-white shadow-lg rounded-lg my-20">
            <div>
                <h2 class="text-gray-800 text-3xl font-semibold">2 Abonnements</h2>
                <p class="mt-2 text-gray-600">Gérez les abonnements de vos utilisateurs</p>
            </div>
            <div class="flex justify-end mt-4">
                <a href="#" class="text-xl font-medium text-indigo-500">Gérer</a>
            </div>
        </div>
    </a>

</div>

<!-- USERS -->
<!-- ACTUALITES -->
<!-- ABONNEMENTS -->


<livewire:footer />


@livewireScripts
</body>
</html>
