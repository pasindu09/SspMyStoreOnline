<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>

        @vite('resources/css/app.css')
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


        <div x-data="{ isOpen: false }">
        <div @click="isOpen = true" id="nav-cart-count-container" style="display: flex; align-items: center;">
    <span class="nav-cart-icon nav-sprite" style="position: relative;">
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" width="2em"viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
        <span id="nav-cart-count" aria-hidden="true" class="nav-cart-count nav-cart-1 nav-progressive-attribute nav-progressive-content" style="position: absolute; top: -8px; right: -8px; background-color: #FF9900; color: #ffffff; border-radius: 50%; padding: 4px 6px; font-size: 12px;">100</span>
    </span>
</div>


  
    
    <!-- Small Window -->
    <div x-show="isOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div style="height:70vh; width:80%" class="bg-white p-4 rounded shadow-md">
        <table class="w-full">
                <thead>
                    <tr>
                        <th id="tablerow" class="text-left p-2">Image</th>
                        <th class="text-left p-2">Item Name</th>
                        <th class="text-left p-2">Quantity</th>
                        <th class="text-right p-2">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example cart items, replace with your actual cart items loop -->
                    <tr>
                        <td class="py-4 px-2"><img src="item-image-url" alt="Item Image" class="w-24 h-24"></td>
                        <td id="proname" class="py-4 px-2"></td>
                        <td class="py-4 px-2">3</td>
                        <td class="py-4 px-2 text-right">$59.97</td>
                    </tr>
                    <!-- Repeat this row for each item in the cart -->
                </tbody>
            </table>
            <button class="mt-4 bg-gray-300 hover:bg-gray-400 px-3 py-1 rounded" @click="isOpen = false">Close</button>
        </div>
    </div>
</div>


        
    </div>
</nav>
<body>

<div style="height: 70vh;" class="h-40 flex mt-12 border">
    <div style="width: 40%; display:flex; align-items: center; justify-content: center;" class="border ml-12"><image id="imageid"style="max-width: 100%; max-height: 100%;" src="{{asset($product->productImage->path)}}"class=""></image></div>
    <div style="width: 60%;" class="flex flex-col ml-12">
    <div id="productname" class="text-2xl font-bold">{{$product->Productname}}</div>
    <div id="productprice" class="text-2xl font-semibold mt-4">{{$product->productprice}}</div>
    <div class="flex items-center py-4">
    <label class="mr-2">Quantity:</label>
    <input
        type="number"
        name="quantity"
        value="1"
        class="w-16 h-10 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
        id="quantity"
    >
    
    <button id="addtocart" type="submit" class="bg-blue-500 text-white py-2 px-4 rounded ml-4">Add To Cart</button>
</div>

    
    <div class="font-medium mt-12">Product Details</div>
    <div style="flex-grow: 1; overflow: hidden;" class="font-normal">
        {{$product->productdescription}}
    </div>
</div>

</div>
<script>

    let cartitem = [];
    let addtocart = document.getElementById('addtocart');

    let quantityInput = document.getElementById('quantity');
    
    let imageElement = document.getElementById('imageid');
 
    let imagePath = imageElement.getAttribute('src');


    addtocart.addEventListener("click",function(){
        let itemname = document.getElementById('productname');
        let itemnamevalue = itemname.textContent;
        let itemprice = document.getElementById('productprice');
        let itempricevalue = itemprice.textContent;
        let currentQuantity = quantityInput.value;



        cartitem.push(itemnamevalue + "," + itempricevalue +"," + currentQuantity + "," + imagePath);
        console.log(cartitem);
        document.getElementById("proname").textContent = cartitem[0].itemname;
        
   console.log(cartitem[0]);
     //   var cartContainer = document.getElementById("tablerow");

 //   cartContainer.innerHTML = cartitem;


    })

    </script>

</body>


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






</html>


