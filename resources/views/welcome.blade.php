<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-white">
    <nav class="bg-gray-50 sticky top-0 z-50 py-2 px-4 md:px-8 rounded-b-3xl border-b-4 border-blue-100">
    <div class="container mx-auto flex flex-wrap md:flex-no-wrap items-center justify-between">
        <div class="flex items-center space-x-4 mb-2 md:mb-0">
            <img src="{{ asset('image/logo_transparent.png') }}" alt="My Image" class="w-16 h-16 md:w-20 md:h-20 mr-2 md:mr-6">
            <a class="font-inter font-medium text-lg text-gray-900 hover:text-blue-500 transition-all duration-300 ease-in-out transform hover:scale-110 mr-2 md:mr-4" href="#">Home</a>
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
    </div>
</nav>







<div class="w-auto rounded-lg mt-10 bg-gray-50 mx-auto shadow-md" style="margin-left: 16rem; margin-right: 16rem;">
    <div style="height: 60vh" class="p-6 flex">
        <div class="p-8 w-1/3">
            <h2 class="border-b-2 text-xl font-semibold mb-4">Product Categories</h2>
            <ul> 
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Electronics and Gadgets
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Clothing and Apparel
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Home &amp; Kitchen
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Shoes and Footwear
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Beauty and Personal Care
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Health and Fitness
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Baby and Kids Products
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Travel and Luggage
                </li>
                <li class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-2">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    Craft and DIY Supplies
                </li>
            </ul>
        </div>

        <div style="width: 70%" class="relative">
            <img style="height: 100%;" class="w-full rounded-lg" src="{{asset('image/home.jpg') }}" alt="Image 1">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="text-white text-3xl font-bold mb-4">Discover new and trendy</h1>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Shop Now</button>
            </div>
        </div>
    </div>
</div>




<div class="w-auto rounded-lg mt-5" style="margin-left: 5rem; margin-right: 5rem;">
    <div style="height:30vh" class="flex w-auto p-4 justify-center">
   <div style="width: 30%;" class="bg-white rounded-lg p-4 ml-2 shadow-md">Content to be displayed</div>

    <div style="width: 30%;" class="bg-white rounded-lg p-4 ml-2 shadow-md">Content to be displayed</div>
        <div style="width: 30%;" class="bg-white rounded-lg p-4 ml-2 shadow-md">Content to be displayed</div>

    </div>
</div>


<div class="w-auto rounded-lg mt-5" style="margin-left: 5rem; margin-right: 5rem;">
<div style="height:30vh" class="flex w-auto p-4 justify-center">
   <div style="width: 30%;" class="bg-white rounded-lg p-4 ml-2 shadow-md">Content to be displayed</div>

    <div style="width: 30%;" class="bg-white rounded-lg p-4 ml-2 shadow-md">Content to be displayed</div>
        <div style="width: 30%;" class="bg-white rounded-lg p-4 ml-2 shadow-md">Content to be displayed</div>

    </div>
</div>


<footer class="bg-black text-white py-12">
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






</body>
</html>