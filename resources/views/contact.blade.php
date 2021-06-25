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


        <div class="backgroundContent pb-5">

            <div class="grid grid-cols-6 gap-4 mb-4">
                <div class="col-start-2 col-span-4">
                    <h1 class="titleCustomClass mt-4 text-center"> UNE QUESTION ? </h1>
                    <h3 class="sousTitleCustomClass text-center"> Contactez-nous ! </h3>
                </div>
            </div>


            <div>
                <div>

                    <p class="text-center"> Adresse : 19 Rue Yves Toudic, 75010, Paris </p>
                    <p class="text-center"> Téléphone : 01 39 75 06 66 </p>
                    <p class="text-center"> Email : elixir-paris@webstart.com </p>

                </div>

            </div>

            <div class="py-4">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <!-- GOOGLE MAP -->
                    <div id="map" class="mt-3" style="height: 400px; width: 100%;"></div>

                    <script>
                        // Initialize and add the map
                        function initMap() {
                            // The location of
                            const webstart = { lat: 48.87055, lng: 2.3631643 }; //lat et long de webstart
                            // The map, centered at Uluru
                            const map = new google.maps.Map(document.getElementById("map"), {
                                zoom: 4,
                                center: webstart,
                            });
                            // The marker, positioned
                            const marker = new google.maps.Marker({
                                position: webstart,
                                map: map,
                            });
                        }
                    </script>

                    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=<?= env('APP_GOOGLE_API') ?>&callback=initMap&libraries=&v=weekly"
                        async
                    ></script>

                </div>
            </div>


            <hr class="mt-6 mb-3">

            <!-- FORMULAIRE DE CONTACT -->

            <div class="grid grid-cols-6 gap-4 mb-4">
                <div class="col-start-2 col-span-4">
                    <h1 class="titleCustomClass mt-4 text-center"> OU POSEZ LA DIRECTEMENT ! </h1>
                </div>
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

            <!-- ERRORS -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-5 mb-5" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="mb-5 sm:mt-0">
                <div class="md:grid md:grid-cols-4 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-start-2 md:col-end-4">
                        <form method="POST">
                            @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="family_name" class="block text-sm font-medium text-gray-700">Nom</label>
                                            <input type="text" name="family_name" id="family_name-name" placeholder="Kramer" class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="given_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                                            <input type="text" name="given_name" id="given_name" placeholder="John" class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="email_address" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="text" name="email_address" id="email_address" placeholder="john.kramer@gmail.com" autocomplete="email" class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="objet" class="block text-sm font-medium text-gray-700">Objet</label>
                                            <input type="text" name="objet" id="objet" autocomplete="street-address" placeholder="Objet" class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="content_email" class="block text-sm font-medium text-gray-700">
                                                Contenu
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="content_email" name="content_email" rows="6" class="shadow-sm border-blue-300 focus:border-blue-700 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Ce pourquoi vous nous contactez..."></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Envoyer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <livewire:footer />


        @livewireScripts
    </body>
</html>
