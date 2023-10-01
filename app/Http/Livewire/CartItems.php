<?php

namespace App\Http\Livewire;

use App\Models\cart;
use App\Models\Product;
use App\Models\sellers;
use Illuminate\Support\Arr;
use Livewire\Component;

class CartItems extends Component
{
    public $cartforuser;
    public $user;
    public $shipingPrice;
    public $finduser;
    public $cartItemsForUser;
    public $totalPriceForItem;
    public $totalPrice;
    public $selectedCartItems;
    protected $listeners = ['refreshComponent' => 'mount'];
  //  public $seller = sellers::where('user_id', $this->finduser)->value('id');

    public $perCartTotal;
    public function render()
    {
        return view('livewire.cart-items');
    }

    public function mount() {
        $this->perCartTotal = 0.00;
        $this->selectedCartItems = [];
        if (auth()->check()) {
            $this->finduser = auth()->user()->id;
            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
            if($this->cartItemsForUser){
                $this->totalPriceForItem = []; // Initialize an empty array

                foreach($this->cartItemsForUser as $item){
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                    }


                foreach($this->totalPriceForItem as $item){
                    $this->perCartTotal += $item;
                    }
                 if($this->perCartTotal){
                    $this->shipingPrice = 4.99;
                $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                 }
                 else{
                    $this->totalPrice = 0.00;
                    $this->shipingPrice = 0.00;
                 }
            }
        }
        else{
            $this->user = session()->getId();
            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
            if($this->cartItemsForUser){
                $this->totalPriceForItem = []; // Initialize an empty array

                foreach($this->cartItemsForUser as $item){
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                    }


                foreach($this->totalPriceForItem as $item){
                    $this->perCartTotal += $item;
                    }
                 if($this->perCartTotal){
                    $this->shipingPrice = 4.99;
                $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                 }
                 else{
                    $this->totalPrice = 0.00;
                    $this->shipingPrice = 0.00;
                 }
            }
        }
    }
    




   public function openCart(){
    if (auth()->check()) {
        $this->finduser = auth()->user()->id;
        $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
    }
    else{
        $this->user = session()->getId();
        $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
    }
    $this->emit('refreshComponent');
   }


   
   public function increment($id)
   {
       if(auth()->check()){
        $item = Cart::where('product_id', $id)->where('usersession', $this->finduser)->first();
    
        if ($item) {
         $data = (int)$item->quantity;
         $newdata = $data + 1;

         $item->update([
            'quantity' => $newdata
          ]);

          $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
   }

   if($this->cartItemsForUser){
    $this->totalPriceForItem = []; // Initialize an empty array

foreach($this->cartItemsForUser as $item){
$priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
$totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
$this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
}

}
  }
       else{
       $item = Cart::where('product_id',$id)->where('usersession', $this->user)->first();
    
       if ($item) {
        $data = (int)$item->quantity;
        $newdata = $data + 1;

        $item->update([
           'quantity' => $newdata
         ]);

         $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
         
  }

  if($this->cartItemsForUser){
    $this->totalPriceForItem = []; // Initialize an empty array

foreach($this->cartItemsForUser as $item){
$priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
$totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
$this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
}

}

}

$this->emit('refreshComponent');
}
        

      public function decreaseQuantity($id)
      {
        if(auth()->check()){
          $item = Cart::where('product_id', $id)->where('usersession', $this->finduser)->first();
    
        if ($item) {
         $data = (int)$item->quantity;
         $newdata = $data - 1;

         $item->update([
            'quantity' => $newdata
          ]);
   }

   
   $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
   if($this->cartItemsForUser){
    $this->totalPriceForItem = []; // Initialize an empty array

foreach($this->cartItemsForUser as $item){
$priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
$totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
$this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
}

}
        }
          else{
        $item = Cart::where('product_id', $id)->where('usersession', $this->user)->first();

        if ($item) {
         $data = (int)$item->quantity;
         $newdata = $data - 1;

         $item->update([
            'quantity' => $newdata
          ]);

   }

   $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
   if($this->cartItemsForUser){
    $this->totalPriceForItem = []; // Initialize an empty array

foreach($this->cartItemsForUser as $item){
$priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
$totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
$this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
}

}
      }
      $this->emit('refreshComponent');
    }

}
