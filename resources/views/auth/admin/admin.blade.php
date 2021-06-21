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

<div class="backgroundContent pb-3">


    <!-- TITLE DE LA PAGE -->
    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> ADMIN </h1>
            <h3 class="sousTitleCustomClass text-center"> Gérez vos utilisateurs, actualités et abonnements </h3>
        </div>
    </div>

    <!-- ADMIN CONTENT (Ca fait une triforce en computer screen size mais bon)-->
    <div class="grid grid-cols-1 py-5 md:grid-cols-3">

        <!-- USERS -->
        <a href="admin/users">
            <div class="py-4 px-8 bg-white shadow-lg rounded-lg my-3">
                <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">@if($nbUsers > 1) {{ $nbUsers }} Users @else {{ $nbUsers }} User @endif</h2>
                    <p class="mt-2 text-gray-600">Gérez vos utilisateurs, leurs emails, mot de passe, administrateurs
                        ...</p>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="admin/users" class="text-xl font-medium text-indigo-500">Gérer</a>
                </div>
            </div>
        </a>

        <!-- ABONNEMENTS -->
        <a href="admin/abonnements">
            <div class="py-4 px-8 bg-white shadow-lg rounded-lg my-3">
                <div>
                    <h2 class="text-gray-800 text-3xl font-semibold"> 2 Abonnements</h2>
                    <p class="mt-2 text-gray-600">Gérez les abonnements de vos utilisateurs</p>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="admin/plans" class="text-xl font-medium text-indigo-500">Gérer</a>
                </div>
            </div>
        </a>

        <!-- ACTUALITÉS -->
        <a href="admin/actualites">
            <div class="py-4 px-8 bg-white shadow-lg rounded-lg my-3">
                <div>
                    <h2 class="text-gray-800 text-3xl font-semibold"> @if($nbActualites > 1) {{ $nbActualites }} Actualités @else {{ $nbActualites }} Actualité @endif</h2>
                    <p class="mt-2 text-gray-600">Créez, modifiez ou supprimez vos actualités</p>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="admin/actualites" class="text-xl font-medium text-indigo-500">Gérer</a>
                </div>
            </div>
        </a>
    </div>

</div>


<livewire:footer/>


@livewireScripts
</body>
</html>
