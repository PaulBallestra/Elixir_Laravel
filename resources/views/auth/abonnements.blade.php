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
            <h1 class="titleCustomClass mt-4 text-center"> ABONNEMENT </h1>
        </div>
    </div>

    <!-- VALIDATIONS -->
    @if($subscribed)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-5 mb-3" role="alert">
            <ul>
                <li> ABONNEMENT AJOUTÉ </li>
            </ul>
        </div>
    @endif

    <!-- ABONNEMENT CONTENT -->
    <!-- Si aucun abonnement -->
    <h3 class="sousTitleCustomClass text-center mx-auto"> Vous n'avez aucun abonnement pour le moment. </h3>
    <h3 class="sousTitleCustomClass text-center mx-auto"> Choisissez en un ci-dessous. </h3>


    <hr style="color: black;" class="mt-10 md:mb-5">

    <!-- 2 ABONNEMENTS -->
    <div class="col-start-3 col-end-6 mb-10">
        <div class="w-full bg-blue pt-8">
            <div class="flex flex-col sm:flex-row justify-center mb-6 sm:mb-0">
                <!-- MOIS -->
                <div
                    class="sm:flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg rounded-tr-none bg-gray-100 mt-4 flex flex-col">
                    <div class="p-8 text-3xl font-bold text-center">Mois</div>
                    <div class="border-0 border-black border-t border-solid text-sm">
                        <div class="text-center border-0 border-black border-b border-solid py-4">
                            2x Elixir - Guitare Électrique
                        </div>
                        <div class="text-center border-0 border-black border-b border-solid py-4">
                            2x Elixir - Basse Électrique
                        </div>
                        <div class="w-full text-center px-8 pt-4 text-xl mt-auto">
                            24.99€
                        </div>
                    </div>
                    <div class="text-center mt-8 mb-8 mt-auto">
                        <a href="abonnement/monthly"
                           class="btnCustom inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 hover:text-white hover:no-underline">
                            S'abonner </a>
                    </div>
                </div>

                <!-- ANS -->
                <div
                    class="flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg bg-gray-200 mt-4 sm:-mt-4 shadow-lg z-30 flex flex-col">
                    <div class="w-full p-8 text-3xl font-bold text-center">Ans</div>
                    <div class="w-full border-0 border-black border-t border-solid text-sm">
                        <div class="text-center border-0 border-black border-b border-solid py-4">
                            5x Elixir - Guitare Électrique
                        </div>
                        <div class="text-center border-0 border-black border-b border-solid py-4">
                            3x Elixir - Basse Électrique
                        </div>
                        <div class="text-center border-0 border-black border-b border-solid py-4">
                            2x Elixir - Banjo
                        </div>
                        <div class="text-center border-0 border-black border-b border-solid py-4">
                            2x Elixir - Mandolin
                        </div>
                        <div class="w-full text-center px-8 pt-4 text-xl mt-auto mb-4">
                            129.99€
                        </div>
                    </div>
                    <div class="w-full text-center mb-8 mt-auto">
                        <a href="/abonnement/yearly"
                           class="btnCustom inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 hover:text-white hover:no-underline">
                            S'abonner </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<livewire:footer/>


@livewireScripts
</body>
</html>
