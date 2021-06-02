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

        <div class="py-4 bg-white">
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


        <livewire:footer />


        @livewireScripts
    </body>
</html>
