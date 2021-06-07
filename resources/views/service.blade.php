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
<livewire:header/>

<div class="backgroundContent pb-5">


    <!-- TITLE DE LA PAGE -->
    <div class="grid md:grid-cols-6 md:gap-4 mb-4">
        <div class="md:col-start-2 md:col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> NOTRE SERVICE </h1>
            <h3 class="sousTitleCustomClass text-center"> Notre service vous permet de précommander des cordes Elixir, selon
                vos besoins (mois ou année). </h3>
        </div>
    </div>

    <!-- SERVICE CONTENT -->
    <div class="grid md:grid-cols-5 md:gap-4 mx-4 mt-8">

        <div class="md:col-start-1 md:col-end-3">

            <img class="" src="images/blue_elixir.png"/>

        </div>

        <div class="md:col-start-3 md:col-end-6 m-auto">
            <p class="serviceParagraphContent my-5 pb-5"> Choisissez votre tirant en
                fonction de vos habitudes.
                Plusieurs tirants sont disponibles que ce soit sur guitare électrique,
                basse électrique, banjo ou mandolin. </p>
        </div>

    </div>

    <hr>

    <!-- ABONNEMENTS SECTION -->
    <div class="grid md:grid-cols-5 md:gap-4 mt-0 mb-8 mx-4 mt-4">

        <div class="md:col-start-1 md:col-end-3 m-auto">

                <p class="serviceParagraphContent my-5 pb-5"> Selon vos besoin, deux abonnements sont disponibles.
                    Tous les mois ou tous les ans.
                    Chaque abonnement à ses spécificités.
                </p>

        </div>

        <div class="md:col-start-3 md:col-end-6">
            <div class="w-full bg-blue pt-8">
                <div class="flex flex-col sm:flex-row justify-center mb-6 sm:mb-0">
                    <!-- MOIS -->
                    <div class="shadow-lg sm:flex-1 lg:flex-initial lg:w-1/3 rounded-t-lg rounded-tr-none bg-gray-100 mt-4 flex flex-col">
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
                            <a href="@if(Route::has('login')) /abonnement @else /login @endif"
                               class="btnCustom inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 hover:text-white hover:no-underline"> S'abonner </a>
                        </div>
                    </div>

                    <!-- ANS -->
                    <div
                        class="flex-1 lg:flex-initial lg:w-1/3 rounded-t-lg bg-gray-200 mt-4 sm:-mt-4 shadow-lg z-30 flex flex-col">
                        <div class="w-full p-8 text-3xl font-bold text-center">An</div>
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
                            <a href="#"
                               class="btnCustom inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 hover:text-white hover:no-underline"> S'abonner </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<livewire:footer />


@livewireScripts
</body>
</html>
