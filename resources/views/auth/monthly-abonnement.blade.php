<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Abonnement Mensuel</title>

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
            <h1 class="titleCustomClass mt-4 text-center"> PAIEMENT D'ABONNEMENT </h1>
        </div>
    </div>


    <div class="grid grid-cols-3 gap-2 mt-3 mb-6">
        <h1 class="titleCustomClass text-center col-start-2 text-bold montserrat"> 24.99€/Mois </h1>
    </div>

    <!-- CONTENT -->
    <div class="text-center">

        <!-- TIRANTS -->
        <div class="grid grid-cols-6 mb-3">

            <div class="col-start-2 col-end-6">
                <p class="text-center"> 1 - Choississez votre tirant </p>

                <div class="my-3">

                    <label id="guitarTirant" class="montserrat"> 2x paquets Elixir, Guitare Électrique </label>

                    <select for="guitarTirant" class="mx-3">

                        <option value="1046" selected> 10-46 </option>
                        <option value="1052"> 10-52 </option>

                    </select>

                </div>


                <div class="mb-3">

                    <label id="basseTirant" class="montserrat"> 2x paquets Elixir, Basse Électrique </label>

                    <select for="basseTirant" class="mx-3">

                        <option value="45105" selected> 45-105 </option>
                        <option value="40110"> 40-110 </option>

                    </select>

                </div>


            </div>

        </div>


        <!-- BANCAIRE -->
        <div class="grid grid-cols-6">

            <div class="col-start-2 col-end-6">

                <div class="my-3">

                    <p class="text-center"> 2 - Entrez vos coordonnées bancaire </p>

                </div>


            </div>

        </div>


    </div>

    <div class="">





    </div>


</div>

<livewire:footer/>


@livewireScripts
</body>
</html>
