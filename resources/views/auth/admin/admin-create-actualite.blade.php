<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Admin : Création Actualité</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
    @cloudinaryJS
</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-3">


    <!-- TITLE DE LA PAGE -->
    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> NOUVELLE ACTUALITÉ </h1>
        </div>
    </div>

    <!-- INFOS ACTU -->
    <div class="mb-5 sm:mt-0">
        <div class="md:grid md:grid-cols-4 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-start-2 md:col-end-4">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="name"
                                           class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" name="name" id="name"
                                           value=""
                                           placeholder="NOUVELLE CORDE 10-46"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="short_description"
                                           class="block text-sm font-medium text-gray-700">Short Description</label>
                                    <textarea type="text" name="short_description" id="short_description"
                                              class="resize-y border rounded-md mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>

                                <div class="col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description
                                        Complète</label>
                                    <textarea type="text" name="description" id="description"
                                              class="resize-y border rounded-md mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>

                                <div class="col-span-6">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                    <div class="py-0 bg-white px-2">
                                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                                            <div class="md:flex">
                                                <div class="w-full p-3">
                                                    <div
                                                        class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                                        <div class="absolute">
                                                            <div class="flex flex-col items-center"><i
                                                                    class="fa fa-folder-open fa-4x text-blue-700"></i>
                                                                <span class="block text-gray-400 font-normal">Cliquez pour importer votre image</span>
                                                            </div>
                                                        </div>
                                                        <input type="file" class="h-full w-full opacity-0" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <label class="inline-flex items-center mt-3" for="is_visible">
                                    <input type="checkbox" id="is_visible" name="is_visible"
                                           class="form-checkbox h-5 w-5 text-gray-600"><span
                                        class="ml-2 text-gray-700" checked>isVisible</span>
                                </label>

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
