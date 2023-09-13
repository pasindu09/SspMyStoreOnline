<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
    $products = Product::with('productImage')->get();
  // $photo = Photo::all();

  return view('welcome', compact('products'));
    }


    public function productview($item){
        $product = Product::with('productImage')->find($item);
       return view('productview', compact('product'));
    }
}
