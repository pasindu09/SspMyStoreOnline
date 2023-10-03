<?php

namespace App\Http\Livewire;

use App\Models\cart;
use App\Models\Product;
use App\Models\sellers;
use App\Models\User;
use Livewire\Component;

class Selleranalytics extends Component
{
    public $userproduct;
    public $seller;
    public $viewclicks;
    public $cartdata;
    protected $number;
    public function render()
    {
        return view('livewire.selleranalytics');
    }

    public function mount(){
        $this->number = new \stdClass();
        $this->number->values = '0';
        $this->seller = sellers::where('user_id', auth()->user()->id)->first();
        $this->userproduct = Product::where('seller_id', $this->seller->id)->get();
        $this->viewclicks = [];
        if($this->userproduct){
            foreach($this->userproduct as $product){
                $cartData = cart::where('product_id', $product->id)->first();
                if($cartData){
                    $this->viewclicks[] = $cartData;
                }
                else{
                    // Create a new object for products without a cart
                    $newObject = new \stdClass();
                    $newObject->viewclicks = $this->number->values;
                    $newObject->addtocartclicks = $this->number->values;
                    $newObject->Abandonedtimes = $this->number->values;
                    $this->viewclicks[] = $newObject;
                }
            }
        }
    }
}
