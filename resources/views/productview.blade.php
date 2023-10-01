<x-home-layout>

<div style="height: 70vh;" class="h-40 flex mt-12 border">
    <div style="width: 40%; display:flex; align-items: center; justify-content: center;" class="border ml-12"><image id="imageid"style="max-width: 100%; max-height: 100%;" src="{{asset($product->productImage->path)}}" class=""></image></div>
    <div style="width: 60%;" class="flex flex-col ml-12">
    <div id="productname" class="text-2xl font-bold">{{$product->Productname}}</div>
    <div id="productprice" class="text-2xl font-semibold mt-4">{{$product->productprice}}</div>
    
    
   
    <div class="flex items-center py-4">
    @if($quantity)
    <label class="mr-2">Quantity:</label>
    <input
        type="number"
        name="quantity"
        value="{{$quantity}}"
        class="w-16 h-10 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
        id="quantity"
    >
    
@else
    <label class="mr-2">Quantity:</label>
    <input
        type="number"
        name="quantity"
        value="0"
        class="w-16 h-10 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
        id="quantity"
    >
    @endif
    <button id="addtocart" type="submit" class="bg-blue-500 text-white py-2 px-4 rounded ml-4">Add To Cart</button>
</div>

    
    <div class="font-medium mt-12">Product Details</div>
    <div style="flex-grow: 1; overflow: hidden;" class="font-normal">
        {{$product->productdescription}}
    </div>
</div>

</div>




</x-home-layout>


