<?php

namespace App\Http\Livewire;

use App\Models\Order as ModelsOrder;
use Livewire\Component;

class Order extends Component
{
    public $userorder;
    public $arrayofpro;
    public $arrayofpro2;
    public $cartquantitytotal;
    public function render()
    {
        return view('livewire.order');
    }


    public function mount()
    {
        $this->cartquantitytotal = 0;
        $this->userorder = ModelsOrder::where('user_id', auth()->user()->id)->first();
         $this->arrayofpro2 = [];
         $this->arrayofpro = json_decode($this->userorder->products);
         foreach($this->arrayofpro as $item){
            $priceWithoutDollarSign = (float) str_replace('$', '', $item->product_image->productprice);
            $totalPrice = $priceWithoutDollarSign * (int)$item->quantity;
            $this->arrayofpro2[] = $totalPrice; // Add the total price to the array
           // $this->cartquantitytotal += (int)$item->quantity;
         }
         foreach($this->arrayofpro2 as $item){
            $this->cartquantitytotal += $item;
         }
    }
    
}
