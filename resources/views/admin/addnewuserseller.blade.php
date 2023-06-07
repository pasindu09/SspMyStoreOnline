<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Edit User</title>
      
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>


    </head>
<body>


<div class="flex items-center space-x-2">
        <div x-data="{ openModal: true }">
        <div x-show="openModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
      <div class="bg-white rounded shadow-lg p-8 w-2/3 h-4/5">
        <button x-on:click="openModal = false" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-700">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M15.293 16.707a1 1 0 0 1-1.414 0L10 11.414l-3.879 3.879a1 1 0 1 1-1.414-1.414L8.586 10 4.707 6.121a1 1 0 1 1 1.414-1.414L10 8.586l3.879-3.879a1 1 0 1 1 1.414 1.414L11.414 10l3.879 3.879a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
          </svg>
        </button>

       
        <form action="{{ url('usersseller') }}" method="post">
        @csrf
       



          <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">User Name:</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter name">
            @if ($errors->has('name'))
                        <p class="text-red-500 text-sm">{{ $errors->first('name') }}</p>
                         @endif

          </div>
          <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">User Email:</label>
            <input type="text" id="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter name">
            @if ($errors->has('email'))
                        <p class="text-red-500 text-sm">{{ $errors->first('email') }}</p>
                         @endif

          </div>

          <div class="mb-4">
          <label for="description" class="block text-gray-700 text-sm font-bold mb-2">User Password</label>
            <input type="text" id="image" name="password" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="User Password">
            @if ($errors->has('password'))
                        <p class="text-red-500 text-sm">{{ $errors->first('password') }}</p>
                         @endif
          </div>
          <div class="mb-4">
          <input type="hidden" id="image" name="role" value="0">
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
      

</body>
</html>