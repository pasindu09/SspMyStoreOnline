<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
   
 
   
    public function index()
    {
        $items =  Product::all();

       return view('seller.create',compact('items'));
    }
 
    public function store(Request $request)
    {
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
            'productimage' => $request->productimage,
        ]);
        
        return redirect()->route('products.index')
                        ->with('success','A product has been created successfully.');
    }
 
 


    public function edit($id)
    {
        $itemcreated = Product::find($id);
        return view('seller.edit',compact('itemcreated'));
    }
  
    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        $input = [
        'Productname' => $request->productname,
        'productprice' => $request->productprice,
        'productdescription' => $request->productdescription,
        'productimage' => $request->productimage,
                  ];

        $item->update($input);
        return redirect('products')->with('flash_message', 'Product Updated!');
    }
  
  
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products');
    }
    

}
