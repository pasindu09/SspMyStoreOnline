<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        

    </head>
    <nav class="bg-gray-50 sticky top-0 z-50 py-2 px-4 md:px-8 rounded-b-3xl border-b-4 border-blue-100">
    <div class="container mx-auto flex flex-wrap md:flex-no-wrap items-center justify-between">
        <div class="flex items-center space-x-4 mb-2 md:mb-0">
            <img src="{{ asset('image/logo_transparent.png') }}" alt="My Image" class="w-16 h-16 md:w-20 md:h-20 mr-2 md:mr-6">
            <a class="font-inter font-medium text-lg text-gray-900 hover:text-blue-500 transition-all duration-300 ease-in-out transform hover:scale-110 mr-2 md:mr-4" href="{{ url('/') }}">Home</a>
            <a class="font-inter font-medium text-lg text-gray-900 hover:text-blue-500 transition-all duration-300 ease-in-out transform hover:scale-110 mr-2 md:mr-4" href="{{ route('register.seller') }}">Sell Now</a>
            <a class="font-inter font-medium text-lg text-gray-900 hover:text-blue-500 transition-all duration-300 ease-in-out transform hover:scale-110" href="#">Our Stores</a>
        </div>

        <div class="flex items-center flex-wrap md:flex-no-wrap">
            <div class="relative w-full md:w-64 mb-2 md:mb-0">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <input type="text" placeholder="Search" class="w-full border-2 border-gray-300 rounded-full py-2 px-4 pl-10 pr-3 focus:outline-none focus:border-gray-400 transition-colors duration-300 ease-in-out hover:border-gray-400">
            </div>
            <button class="bg-blue-500 text-white font-inter font-medium rounded-full py-2 px-4 ml-0 md:ml-3 focus:outline-none transition-all duration-300 ease-in-out hover:bg-blue-600">Search</button>
        </div>

        <div class="flex items-center justify-end">
            @if (Route::has('login'))
            <div class="flex items-center space-x-4">
                @auth
                <a href="{{ url('/dashboard') }}" class="font-inter font-medium text-lg text-gray-600 hover:text-blue-500 transition-all duration-300 ease-in-out transform hover:scale-110">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="font-inter font-medium text-lg text-gray-600 hover:text-blue-500 transition-all duration-300 ease-in-out transform hover:scale-110">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="font-inter font-medium text-lg text-gray-600 hover:text-blue-500 transition-all duration-300 ease-in-out transform hover:scale-110">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>


@livewire('cart-items')


        
    </div>
</nav>

    <body>
        

 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>


        

<footer class="bg-black text-white mt-12 py-12">
    <div class="container mx-auto flex flex-col md:flex-row md:justify-between md:items-center">
        <div class="flex items-center mb-6 md:mb-0">
            <img src="{{ asset('image/logo_transparent.png') }}" alt="My Image" class="w-16 h-16 md:w-20 md:h-20 mr-2 md:mr-6">
            <div>
                <h1 class="text-xl font-semibold">MyStoreOnline</h1>
                <p class="text-sm">© 2023 MyStoreOnline. All Rights Reserved.</p>
            </div>
        </div>
        
        <div class="flex flex-col">
            <h2 class="mb-4 text-lg font-semibold">Navigate To</h2>
            <a href="#" class="mb-2 hover:text-blue-500">Home</a>
            <a href="#" class="mb-2 hover:text-blue-500">Buy Products</a>
            <a href="#" class="hover:text-blue-500">Check out Stores</a>
        </div>
        
        <div class="flex flex-col mr-12">
            <h2 class="mb-4 text-lg font-semibold">Contact Us</h2>
            <a href="#" class="mb-2 hover:text-blue-500">Email</a>
            <a href="#" class="mb-2 hover:text-blue-500">Phone</a>
            <a href="#" class="hover:text-blue-500">Address</a>
        </div>
    </div>
</footer>




<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
@livewireScripts
    </body>
</html>