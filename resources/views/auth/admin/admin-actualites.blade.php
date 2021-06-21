<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Actualités : Admin</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-5">


    <!-- TITLE DE LA PAGE -->
    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> ADMIN - ACTUALITÉS </h1>
            <h3 class="sousTitleCustomClass text-center"> Gérez vos actualités, leurs description, image, ... </h3>
        </div>
    </div>

    <!-- BTN CREER NOUVELLE ACTU -->
    <div class="text-center mb-3">
        <a href="/admin/actualites/create"
           class="btnCustom inline-block bg-indigo-500 text-black px-4 py-2 my-2 my-auto rounded hover:bg-indigo-700 hover:text-white hover:no-underline"> Créer </a>
    </div>

    <!-- SUCCESS MSG -->
    @if (\Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-5 mb-3"
             role="alert">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <!-- LISTES DES ACTUS -->
    <table class="table-fixed mx-auto mt-3">
        <thead>
        <tr>
            <th class="w-1/5"> IDs </th>
            <th class="w-1/5"> Nom </th>
            <th class="w-1/5"> Date </th>
            <th class="w-1/5"> IsVisible </th>
            <th class="w-1/5">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($actualites as $actualite)

            <tr style="border-bottom: 1px solid black;">
                <td>{{ $actualite->id }}</td>
                <td>{{ $actualite->name }}</td>
                <td>{{ $actualite->created_at }}</td>
                <td>{{ $actualite->is_visible }}</td>
                <td>

                    <div class="grid grid-cols-2">

                        <div class="text-center">
                            <a href="/admin/actualites/{{ $actualite->id }}"
                               class="btnCustom inline-block bg-yellow-500 text-black px-4 py-2 my-auto rounded hover:bg-yellow-700 hover:text-white hover:no-underline"> Modifier </a>
                        </div>

                        <div class="text-center">
                            <a href="/admin/actualites/{{ $actualite->id }}/delete"
                               class="btnCustom inline-block bg-red-500 text-black px-4 py-2 rounded hover:bg-red-700 hover:text-white hover:no-underline"> Supprimer </a>
                        </div>

                    </div>

                </td>
            </tr>

        @endforeach

        </tbody>
    </table>


</div>


<livewire:footer/>


@livewireScripts
</body>
</html>
