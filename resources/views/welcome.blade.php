<x-home-layout>
<div class="w-auto rounded-lg mt-10 bg-gray-50 mx-60 shadow-md">
    <div class="flex">
        <div class="p-8 w-1/3" style="width: 50vh;">
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
        <div style="width:100vh; height: auto;" class="h-max relative overflow-hidden justify-center items-center">
        <div>
    <img src="{{asset('image/home.jpg') }}" alt="Image" class="object-contain max-w-full max-h-full">
        </div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="text-white text-3xl font-bold mb-4">Discover new and trendy</h1>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Shop Now</button>
            </div>
</div>



    </div>
</div>


<div class="grid mr-12 ml-12 mt-12 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
    @foreach($products as $item)
    <div class="bg-white border p-4 rounded-lg shadow-md flex-col flex">
    <div style="height:40vh; display: flex; align-items: center; justify-content: center;" class="border mb-2"> 
    <img style="max-width: 100%; max-height: 100%;" src="{{ asset($item->productImage->path) }}" alt="">
    </div>
        <div class="text-xl mt-6 font-semibold">{{ $item->Productname }}</div>
        <div class="text-lg mt-2 mb-2 font-light">{{ $item->productprice }}</div>
        <div class="mt-auto flex justify-between mt-6">
        
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add To Cart</button>
            <form action="{{ route('product.view', ['item' => $item->id]) }}" method="GET">
        
            <button type="submit" onclick="" class="bg-gray-200 text-gray-700 py-2 px-4 rounded">View</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@livewire('test1')

<div class="h-44 border">
<x-home-div> </x-home-div>
</div>


</x-home-layout>

