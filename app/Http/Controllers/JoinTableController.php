<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\sellers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JoinTableController extends Controller
{
    public function showSellerInfo()
    {
        $sellerWithUserInfo = Sellers::with('usertableconnection')
        ->where('user_id', 4)
        ->first();

        if (!$sellerWithUserInfo) {
            // Handle the case when the seller record is not found
        }

        return new JsonResponse([
            'sellerWithUserInfo' => $sellerWithUserInfo,
        ]);
    }


    public function getIdImage($id){
    $productimages = Product::where('id',$id)->value('productimage');
   // $image = Product::where('productimage',$seller->id)->first();
   $path = $productimages->path;
   return new JsonResponse([
    'path' => $path,
   
]);
    
}
}
