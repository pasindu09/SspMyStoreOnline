<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Photo;
use App\Models\Product;
use App\Models\sellers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
   
   
 
   
    public function index()
{
    $currentUserId = auth()->user()->id;
       // Find the seller record for the current user
       $seller = sellers::where('user_id', $currentUserId)->first();
       if ($seller) {
           // Retrieve the products associated with the seller id
          // $items = Product::where('seller_id', $seller->id)->get();
          $items = Product::with('productImage')
               ->where('seller_id', $seller->id)
               ->get();
       } 
       else {
          $items = Product::all();
       }
    //$items = Product::where('seller_id', $sellerId)->get();
    $sellerId = sellers::where('user_id', $currentUserId)->value('id');


       $image = Photo::where('seller_id',$seller->id)->first();


       return view('seller.create', compact('items', 'sellerId', 'image'));

      // return new JsonResponse([
     //   'output' => $items,
    //]);
}


public function getIdImage($id)
{
    $product = Product::find($id);

    if (!$product) {
        // Handle case when product is not found
        return new JsonResponse(['error' => 'Product not found'], 404);
    }

    // Use the relationship to get the associated photo
    $photo = $product->productImage;

    if (!$photo) {
        // Handle case when associated photo is not found
        return new JsonResponse(['error' => 'Photo not found for this product'], 404);
    }

    // Access the path value from the associated photo
    $path = $photo->path;

    return new JsonResponse([
        'path' => $path,
    ]);
}


    public function store(Request $request)
    {



        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
    
            $imagePath = 'image/' . $imageName;
    
         $photoCreate = Photo::create([
                'name' => $imageName,
                'path' => $imagePath,
                'seller_id' => $request->productseller,
            ]);
        }


        $request->validate([
            'productname' => 'required',
            'productprice' => 'required',
            'productdescription' => 'required',
            'productimage' => 'required',
       
        ]);  


        
        $items = Product::create([
            'Productname' => $request->productname,
            'productprice' => $request->productprice,
            'productdescription' => $request->productdescription,
            'productimage' => $photoCreate->id,
            'seller_id' => $request->productseller,
        ]);

      
    

        
        
        return redirect()->route('products.index')
                        ->with('success','A product has been created successfully.');
    }
 
 


    public function edit($id)
    {
          $itemcreated = Product::with('productImage')->find($id);
        return view('seller.edit',compact('itemcreated'));
    }
  
    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        $itemphoto = Photo::find($request->photoid);
        
        $input = [
        'Productname' => $request->productname,
        'productprice' => $request->productprice,
        'productdescription' => $request->productdescription,
      
                  ];


                 
                  $item->update($input);

                 
                  if ($request->hasFile('photo')) {
                      $image = $request->file('photo');
                      $imageName = time() . '.' . $image->getClientOriginalExtension();
                      $image->move(public_path('image'), $imageName);
              
                     $imagePath = 'image/' . $imageName;

                                        
        $input2 = [
            'path' => $imagePath,
                      ];
                     $itemphoto->update($input2);
      
                  }
          
      

      //  
        return redirect('products')->with('flash_message', 'Product Updated!');
    
}
  
    public function destroy($id)
    {
        
        Product::destroy($id);
        return redirect('products');
    }

    public function productview($item,$user){
        $product = Product::with('productImage')->find($item);
        $quantity = cart::where('product_id', $item)->where('usersession', $user)->first();
       return view('productview', compact('product','quantity'));
    }

    public function quantityUpdate($user, $id){
        $cartItem = Cart::where('id', $id)->first();
    
        if($cartItem){
            $cartItem->update([
                'quantity' => 0,
            ]);
        }
        return redirect()->back();
    }
    
    public function quantityAddtocart(Request $request,$user, $id){
        $cartItem = Cart::where('id', $id)->first();
    
        if($cartItem){
            $cartItem->update([
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->back();
    }

    public function quantityAddtocart2(Request $request,$user, $id){
        if(auth()->check()){
            $user = auth()->user()->id;
        }
        else{
            $user = session()->getId();
        }
        $cartItem = Cart::where('product_id', $id)->where('usersession',$user)->first();
    
        if($cartItem){
            $cartItem->update([
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->back();
    }
    

}





