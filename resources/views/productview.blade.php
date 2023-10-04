<x-home-layout>

    <div style="height: 70vh;" class="h-40 flex mt-12">
        <div style="width: 40%; display:flex; align-items: center; justify-content: center;" class="ml-12">
            <image id="imageid" style="max-width: 100%; max-height: 100%;" src="{{asset($product->productImage->path)}}" class=""></image>
        </div>
        <div style="width: 60%;" class="border-l p-4 flex flex-col ml-12">
            <div id="productname" class="text-2xl font-bold">{{$product->Productname}}</div>
            <div id="productprice" class="text-2xl font-semibold mt-4">{{$product->productprice}}</div>



            <div class="flex items-center py-4">
                @if($quantity)
                <label class="mr-2">Quantity:</label>
                <input type="number" name="quantity" value="{{$quantity->quantity}}" class="w-16 h-10 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" id="quantityval">

                @else
                <label class="mr-2">Quantity:</label>
                <input type="number" name="quantityval" class="w-16 h-10 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" id="quantityval">
                <form id="addtocartForm" method="POST" action="{{ url('/products/itemadd2/' . $product->id . '/' . $product->id) }}">
                    @csrf
                    <input type="hidden" name="quantity" id="hiddenQuantity">
                    <button id="addtocart" type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Add To Cart</button>
                </form>
                @endif
                @if($quantity)
                    @if($quantity->quantity>0)
                <form method="POST" action="{{ url('/products/itemremove/' . $quantity->id . '/' . $quantity->id) }}">
                    @csrf
                    <button id="remove" type="submit" class="ml-4 bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Remove From Cart</button>
                </form>

                    @else
                <form id="addtocartForm" method="POST" action="{{ url('/products/itemadd/' . $quantity->id . '/' . $quantity->id) }}">
                    @csrf
                    <input type="hidden" name="quantity" id="hiddenQuantity">
                    <button id="addtocart" type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-black-100 rounded shadow">Add To Cart</button>
                </form>
                    @endif
               
                @endif
            </div>



            <div class="font-medium mt-12">Product Details</div>
            <div style="flex-grow: 1; overflow: hidden;" class="font-normal">
                {{$product->productdescription}}
            </div>
        </div>

    </div>


    <script>
        document.getElementById('quantityval').addEventListener('change', function() {
            
    var quantity = parseInt(this.value);
    console.log(quantity)
    document.getElementById('hiddenQuantity').value = quantity;
        });
</script>

</x-home-layout>