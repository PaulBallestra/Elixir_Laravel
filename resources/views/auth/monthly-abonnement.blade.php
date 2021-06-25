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

    <script src="https://js.stripe.com/v3/"></script>

    @livewireStyles
</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-5">

    <!-- TITLE DE LA PAGE -->
    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> PAIEMENT D'ABONNEMENT </h1>
        </div>
    </div>


    <div class="grid grid-cols-3 gap-2 mt-3 mb-6">
        <h1 class="titleCustomClass text-center col-start-2 text-bold montserrat"> 24.99€/Mois </h1>
    </div>

    <!-- ERREURS -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-5 mb-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- CONTENT -->
    <form method="POST" class="text-center" id="payment-form">
    @csrf

        <!-- TIRANTS -->
        <div class="grid grid-cols-6 mb-3">

            <div class="col-start-2 col-end-6">
                <p class="text-center"> 1 - Choississez votre tirant </p>

                <div class="my-3">

                    <label id="guitarTirant" class="montserrat"> 2x paquets Elixir, Guitare Électrique </label>

                    <select for="guitarTirant" class="mx-3">

                        <option value="1046" selected> 10-46</option>
                        <option value="1052"> 10-52</option>

                    </select>

                </div>


                <div class="mb-3">

                    <label id="basseTirant" class="montserrat"> 2x paquets Elixir, Basse Électrique </label>

                    <select for="basseTirant" class="mx-3">

                        <option value="45105" selected> 45-105</option>
                        <option value="40110"> 40-110</option>

                    </select>

                </div>


            </div>

        </div>


        <!-- BANCAIRE -->
        <div class="grid grid-cols-6">

            <div class="col-start-2 col-end-6">

                <div class="my-3">

                    <p class="text-center"> 2 - Entrez vos coordonnées bancaire </p>

                    <input type="text" id="titulaire" name="titulaire" class="mt-3 p-1" placeholder="Titulaire" style="background-color: white; border-radius: 3px; border: 1px solid #00AEEF;"/>

                    <!-- STRIPE -->
                    <div id="card-element" class="m-3 p-4"
                         style="background-color: white; border-radius: 3px; border: 1px solid #00AEEF;">
                    </div>

                    <!-- ERRORS STRIPE -->
                    <div id="card-errors" role="alert" hidden class="bg-red-100 border border-red-400 text-red-700 py-2 rounded relative"></div>


                </div>
            </div>
        </div>

        <button id="card-button" data-secret="{{ $intent->client_secret }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Payer
        </button>

    </form>


</div>

<livewire:footer/>


@livewireScripts
</body>
</html>

<script>

    const stripe = Stripe( '{{$stripeKey}}' );
    const elements = stripe.elements();

    const card = elements.create("card");
    card.mount("#card-element");

    const cardHolderName = document.getElementById('titulaire');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    card.on('change', ({error}) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
            displayError.style.display = 'block';
        } else {
            displayError.textContent = '';
            displayError.style.display = 'none';
        }
    });

    const form = document.getElementById('payment-form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            const displayError = document.getElementById('card-errors');
            displayError.textContent = error.message;
            displayError.style.display = 'block';
        } else {
            console.log(setupIntent);

            const displayError = document.getElementById('card-errors');
            displayError.textContent = '';
            displayError.style.display = 'none';

            const payment_method = document.createElement('input');
            payment_method.setAttribute('type', 'hidden');
            payment_method.setAttribute('name', 'payment_method');
            payment_method.value = setupIntent.payment_method;

            form.appendChild(payment_method);
            form.submit();
        }

    });

</script>
