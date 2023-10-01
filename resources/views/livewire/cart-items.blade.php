<div x-data="{ isOpen: false }">
        <div wire:click="openCart()" @click="isOpen = true" id="nav-cart-count-container" style="display: flex; align-items: center;">
    <span class="nav-cart-icon nav-sprite" style="position: relative;">
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" width="2em"viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
        <span id="nav-cart-count" aria-hidden="true" class="nav-cart-count nav-cart-1 nav-progressive-attribute nav-progressive-content" style="position: absolute; top: -8px; right: -8px; background-color: #FF9900; color: #ffffff; border-radius: 50%; padding: 4px 6px; font-size: 12px;">100</span>
    </span>
</div>


  
    
     <!-- Small Window -->
     <div x-show="isOpen" class="fixed border border-green-800 inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div style="height:90vh; width:80%" class="">
        <div class="h-screen bg-white rounded shadow-md">

        <div class="flex justify-end p-2"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="isOpen = false">Close</button></div>
    <h1 class="mb-12 mt-8 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">

      @foreach($cartItemsForUser as $index => $item)
        @if($item->quantity > 0)
      <div class="flex">
     <input type="checkbox" class="mr-4">
        <div class="w-full justify-between mb-6 bg-gray-100 rounded-lg p-6 shadow-md sm:flex sm:justify-start h-56 overflow-hidden">
        <div class="border w-48"> 
        <img src="{{ asset($item->imagepath) }}" alt="product-image" class="w-full h-full object-contain rounded-lg" />
        </div>
        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">{{$item->productImage->Productname}}</h2>
              <p class="mt-1 text-xs text-gray-700">{{$item->productImage->productprice}}</p>
            </div>
            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <div class="flex items-center border-gray-100">
                <span wire:click="decreaseQuantity({{$item->product_id}})" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="{{$item->quantity}}" min="1" />
                <button wire:click="increment({{ $item->product_id }})" class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50 focus:outline-none border-none"> + </button>
              </div>
              <div class="flex items-center space-x-4">
                <p class="text-sm">${{$totalPriceForItem[$index]}}</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
            </div>
          </div>
        </div>
</div>
        @endif
        @endforeach
      </div>
      <!-- Sub total -->
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Subtotal</p>
          <p class="text-gray-700">${{$perCartTotal}}</p>
        </div>
        <div class="flex justify-between">
          <p class="text-gray-700">Shipping</p>
          <p class="text-gray-700">${{$shipingPrice}}</p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            <p class="mb-1 text-lg font-bold">${{$totalPrice}} USD</p>
            <p class="text-sm text-gray-700">including VAT</p>
          </div>
        </div>
        <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
      </div>
    </div>
  </div>
            
        </div>
    </div>
</div>