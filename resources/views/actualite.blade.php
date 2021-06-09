<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elixir - Actualité 1</title>

    <!-- INTEGRATION TAILWIND -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles

</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-3" >

    <!-- TITLE DE L'ACTU -->
    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> NOUVELLES CORDES 10-46 </h1>
            <p class="text-center actualiteDate" style="color: black;"> 16/05/2021 </p>
        </div>
    </div>

    <!-- SOUS TITRE DE L'ACTU -->
    <div class="grid grid-cols-4 gap-4 my-3">

        <h3 class="col-start-2 col-end-4 text-center titleHeaderClass"> Les nouvelles cordes Elixir 10 - 46 pour
            guitare électrique sont arrivées !
            Le revêtement Elixir est toujours présent
            et vos cordes n'auront jamais tenu
            aussi longtemps. </h3>

    </div>


    <div class="grid grid-cols-6 gap-4 my-6">

        <p class="col-start-2 col-end-6">
            - Les cordes Elixir, numéro 1 des ventes de cordes pour guitares acoustiques aux Etats-Unis </p>
        <p class="col-start-2 col-end-6">
            - La seule marque de cordes gainées qui protège l’intégralité de la corde avec un revêtement ultra-fin,
            empêchant la saleté de s’incruster dans les creux du filet </p>

        <p class="col-start-2 col-end-6">
            -  Une durée de vie sonore accrue – les utilisateurs nous rapportent que leur son dure plus longtemps,
            qu’avec n’importe quel autre type de corde, avec ou sans revêtement </p>

        <p class="col-start-2 col-end-6">
            - Un jeu et un son consistant – prêtes à être jouées à tout moment et dans toutes les conditions </p>
        <p class="col-start-2 col-end-6">
            - Un toucher doux et agréable qui facilite la jouabilité. </p>
        <p class="col-start-2 col-end-6">
            - Diminue les bruits de doigts – un atout pour la scène et le studio. </p>
        <p class="col-start-2 col-end-6">
            - Les cordes pleines en acier plaqué Anti-Rust résistent à la corrosion afin de
            préserver votre son, assurant une durée de vie plus longue pour l’intégralité de votre jeu. </p>
        <p class="col-start-2 col-end-6">
            - Passez plus de temps à jouer et moins de temps à changer vos cordes, tout en faisant des économies</p>

    </div>

</div>

<livewire:footer/>

@livewireScripts
</body>
</html>

