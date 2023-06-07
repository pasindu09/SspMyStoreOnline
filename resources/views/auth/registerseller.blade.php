






<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('image/logo_transparent.png') }}" alt="logo" class="w-20 h-20">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('seller.register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            </div>
 
            <div class="mt-4">
                <x-label for="address" value="{{ __('Address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-label for="contactno" value="{{ __('Contact No') }}" />
                <x-input id="contactno" class="block mt-1 w-full" type="text" name="contactno" :value="old('contactno')" required autocomplete="contact number" />
            </div>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register as Seller') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
