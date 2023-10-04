<div class="grid mr-12 ml-12 mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
    @foreach($products as $item)
    <div class="bg-white border p-4 rounded-lg shadow-md flex-col flex">
        <div style="height:40vh; display: flex; align-items: center; justify-content: center;" class="border mb-2">
            <img style="max-width: 100%; max-height: 100%;" src="{{ asset($item->productImage->path) }}" alt="">
        </div>
        <div class="text-2xl font-bold text-black mt-6">{{ $item->Productname }}</div>
        <div class="text-xl font-semibold antialiased text-gray-800 mt-2 mb-4">{{ $item->productprice }}</div>

        <div class="mt-auto flex justify-between mt-6">
            @auth
            @if($lemem->isNotEmpty())

            @foreach($lemem as $value)
            @if($value['product_id'] == $item->id)
            @if($value['quantity'] == 0)
            <button wire:click="addToCart({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Add To Cart</button>
            @else
            <button wire:click="removeCartItem({{$value['product_id']}})" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Remove</button>
            @endif


            @endif
            @endforeach


            @endif

            @if($lemem)
            @if($lemem->contains('product_id', $item->id))
            @else
            <button wire:click="addToCart({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Add To Cart</button>
            @endif
            @endif

            @else

            @if($lemem->isNotEmpty())

            @foreach($lemem as $value)
            @if($value['product_id'] == $item->id)
            @if($value['quantity'] == 0)
            <button wire:click="addToCart({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Add To Cart</button>
            @else
            <button wire:click="removeCartItem({{$value['product_id']}})" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Remove</button>
            @endif


            @endif
            @endforeach


            @endif

            @if($lemem)
            @if($lemem->contains('product_id', $item->id))
            @else
            <button wire:click="addToCart({{ $item->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Add To Cart</button>
            @endif
            @endif

            @endauth

            @auth
            <form action="{{ route('product.view', ['item' => $item->id, 'user' => auth()->user()->id]) }}" method="GET">

                <button wire:click="view({{ $item->id }}, '{{ $item->productImage->path }}')" type="submit" class="bg-gray-200 text-gray-700 py-2 px-4 rounded">View</button>
            </form>
            @else
            <form action="{{ route('product.view', ['item' => $item->id, 'user' => session()->getId()]) }}" method="GET">

                <button wire:click="view({{ $item->id }}, '{{ $item->productImage->path }}')" type="submit" class="bg-gray-200 text-gray-700 py-2 px-4 rounded">View</button>
            </form>
            @endauth
        </div>
    </div>
    @endforeach
</div>