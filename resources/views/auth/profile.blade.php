<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Profil</title>

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
            <h1 class="titleCustomClass mt-4 text-center"> PROFIL </h1>
        </div>
    </div>

    <!-- INFOS PERSONNELLES -->
    <!-- INFOS EMAIL PASSWORD -->
    <div class="mb-5 sm:mt-0">
        <div class="md:grid md:grid-cols-4 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-start-2 md:col-end-4">
                <form action="/profile" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="family_name"
                                           class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" name="family_name" id="family_name" placeholder="Kramer"
                                           autocomplete="family_name" value="{{ $user->family_name }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="given_name"
                                           class="block text-sm font-medium text-gray-700">Prénom</label>
                                    <input type="text" name="given_name" id="given_name" placeholder="John"
                                           autocomplete="given_name" value="{{ $user->given_name }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="email_address"
                                           class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="text" name="email_address" id="email_address" value="{{ $user->email_address}}"
                                           placeholder="john.kramer@gmail.com" autocomplete="email"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <!-- ADRESSE -->
                                <div class="col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                                    <input type="text" name="address" id="address" autocomplete="street-address"
                                           placeholder="666 Acacia Avenue" value="{{ $user->address }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="town"
                                           class="block text-sm font-medium text-gray-700">Ville</label>
                                    <input type="text" name="town" id="town" placeholder="Paris" value="{{ $user->town }}"
                                           autocomplete="town"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="postal_code"
                                           class="block text-sm font-medium text-gray-700">Code postal</label>
                                    <input type="text" name="postal_code" id="postal_code" placeholder="75010"
                                           autocomplete="postal_code" value="{{ $user->postal_code }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>


                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Sauvegarder
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<livewire:footer/>

@livewireScripts
</body>
</html>
