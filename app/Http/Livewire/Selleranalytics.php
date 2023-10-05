<?php

namespace App\Http\Livewire;

use App\Models\cart;
use App\Models\Order;
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
    public $abd;
    public $view;
    public $viewarr;
    protected $number;
    public $valselected;

    public $valselected2;
    public $abncart;
    public $abncart1;
    public $orderdata;
    public $orderdata1;
    public $orderdata2;
    public $countitems;
    public function render()
    {
        return view('livewire.selleranalytics');
    }

    public function mount(){
       // $this->orderdata2 = implode(", ", $this->orderdata1);
        $this->number = new \stdClass();
        $this->number->values = '0';
        $this->seller = sellers::where('user_id', auth()->user()->id)->first();
        $this->userproduct = Product::where('seller_id', $this->seller->id)->get();
        $this->orderdata = Order::get();
      
        $this->viewclicks = [];
        if($this->userproduct){
            foreach($this->userproduct as $product){
                foreach($this->orderdata as $order){
                    $this->cartdata = json_decode($order->products);
                    foreach($this->cartdata as $cartitem){
                        if($cartitem->product_id == $product->id){
                            $this->countitems += 1;
                            $priceWithoutDollarSign = (float) str_replace('$', '', $cartitem->product_image->productprice);
                            $total = $priceWithoutDollarSign * (int)$cartitem->quantity;
                            $this->orderdata1 += $total;
                            
                        }
                    }
                }
                $this->abd = 0;
                $this->view = 0;
                $this->abncart = 0;
                $this->valselected = 0;
                $cartData = cart::where('product_id', $product->id)->get();
                 foreach($cartData as $cartitemstats){
                     $this->abd += (int)$cartitemstats->addtocartclicks;
                     $this->view += (int)$cartitemstats->viewclicks;
                     $this->abncart += (int)$cartitemstats->Abandonedtimes;
                     if($cartitemstats->Selected){
                        $this->valselected += 1;
                     }
                 }
                    $this->viewclicks[] = $this->abd;
                    $this->viewarr[] = $this->view;
                    $this->abncart1[] = $this->abncart;
                    $this->valselected2[] = $this->valselected;
                // }
                // if($cartData){
                //     $this->viewclicks[] = $cartData;
                // }
                // else{
                //     // Create a new object for products without a cart
                //     $newObject = new \stdClass();
                //     $newObject->viewclicks = $this->number->values;
                //     $newObject->addtocartclicks = $this->number->values;
                //     $newObject->Abandonedtimes = $this->number->values;
                //     $this->viewclicks[] = $newObject;
                // }
            }
        }
    }
}
