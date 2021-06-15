<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!--<a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a> !-->

            <h1 class="titleCustomClass"> INSCRIPTION </h1>

        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="family_name" :value="__('Nom')"/>

                <x-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" :value="old('Nom')" required
                         autofocus/>
            </div>

            <!-- PRENOM -->
            <div class="mt-4">
                <x-label for="given_name" :value="__('Prenom')"/>

                <x-input id="given_name" class="block mt-1 w-full" type="text" name="given_name" :value="old('Prenom')" required autofocus/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email_address" :value="__('Email')"/>

                <x-input id="email_address" class="block mt-1 w-full" type="email" name="email_address" :value="old('Email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmation mot de passe')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà client ? Connectez-vous !') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
