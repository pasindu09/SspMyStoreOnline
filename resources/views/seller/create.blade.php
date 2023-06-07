<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Seller Profile</title>
      
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>


    </head>


   
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                    <img src="{{ asset('image/logo_transparent.png') }}" alt="My Image" class="w-16 h-16 md:w-20 md:h-20 mr-2 md:mr-6">
                    </a>
                </div>

                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
    
                <a href="{{ route('dashboard') }}"
       class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-800 hover:text-black hover:border-blue-500 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
    >Seller Dashboard</a>

    <a href="{{ route('dashboard') }}"
    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md  font-medium leading-5 text-gray-800 hover:text-black hover:border-blue-500 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
    >Customize Your Shop</a>

    <a href="{{ route('products.index') }}"
    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-800 hover:text-black hover:border-blue-500 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
    >Add Products</a>

    <a href="{{ route('dashboard') }}"
    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md  font-medium leading-5 text-gray-800 hover:text-black hover:border-blue-500 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
    >Add Product Categories</a>

    <a href="{{ route('dashboard') }}"
    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-800 hover:text-black hover:border-blue-500 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
    >User Role Management</a>
    </div>
        </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Nav Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsiveeee -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<body>



<!--creatingg a flash msg-->
@if(session('flash_message'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         id="flash-message"
         class="fixed inset-0 flex items-center justify-center"
    >
        <div class="bg-blue-200 text-blue-800 px-4 py-2 rounded">
            {{ session('flash_message') }}
        </div>
    </div>
@endif


<!--creatingg a form to submit the product details-->
<div class="mt-5 ml-20">
  <div x-data="{ openModal: false }">
    <button x-on:click="openModal = true" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full flex items-center">
      <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      <span>Create Product</span>
    </button>

    
    <div x-show="openModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
      <div class="bg-white rounded shadow-lg p-8 w-2/3 h-4/5">
        <button x-on:click="openModal = false" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-700">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M15.293 16.707a1 1 0 0 1-1.414 0L10 11.414l-3.879 3.879a1 1 0 1 1-1.414-1.414L8.586 10 4.707 6.121a1 1 0 1 1 1.414-1.414L10 8.586l3.879-3.879a1 1 0 1 1 1.414 1.414L11.414 10l3.879 3.879a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
          </svg>
        </button>

       
        <form action="{{ url('products') }}" method="post">
        @csrf
          
          <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Product Name:</label>
            <input type="text" id="name" name="productname" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter name">
          </div>

          <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Product Price:</label>
            <input type="text" id="price" name="productprice" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter price">
          </div>

          <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Product Description:</label>
            <textarea id="description" name="productdescription" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter description"></textarea>
          </div>

          <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Product Image:</label>
            <input type="text" id="image" name="productimage" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter image URL">
          </div>
          <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--creating a table to display the product details-->

<div class="mx-auto max-w-6xl">
    <div class="flex justify-center">
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden my-4">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-blue-500 text-white font-semibold uppercase text-left">Product Name</th>
                    <th class="py-4 px-6 bg-blue-500 text-white font-semibold uppercase text-left">Product Price</th>
                    <th class="py-4 px-6 bg-blue-500 text-white font-semibold uppercase text-left">Product Description</th>
                    <th class="py-4 px-6 bg-blue-500 text-white font-semibold uppercase text-left">Product Image</th>
                    <th class="py-4 px-6 bg-blue-500 text-white font-semibold uppercase text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td class="py-4 px-6 border-b">{{ $item->Productname }}</td>
                    <td class="py-4 px-6 border-b">{{ $item->productprice }}</td>
                    <td class="py-4 px-6 border-b">{{ $item->productdescription }}</td>
                    <td class="py-4 px-6 border-b">{{ $item->productimage }}</td>
                    <td class="py-4 px-3 border-b">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ url('/products/' . $item->id . '/edit') }}">
                                <button x-on:click="openModal = true" class="px-3 py-1 rounded-full bg-blue-500 text-white hover:bg-blue-700 transition duration-200">Edit Product</button>
                            </a>
                            <form method="POST" action="{{ url('/products/' . $item->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)" class="px-3 py-1 rounded-full bg-red-500 text-white hover:bg-red-700 transition duration-200">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</body>


</html>


