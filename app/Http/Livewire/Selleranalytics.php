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
    public function render()
    {
        return view('livewire.selleranalytics');
    }

    public function mount(){
        
        $this->seller = sellers::where('user_id', auth()->user()->id)->first();
        $this->userproduct = Product::where('seller_id', $this->seller->id)->get();
        $items = cart::with('productImage')->where('usersession', $this->user)->where('Selected',1)->get();
        
    }
}
