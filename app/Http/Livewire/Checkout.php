<?php

namespace App\Http\Livewire;

use App\Models\AdressBook;
use App\Models\cart;
use Livewire\Component;

class Checkout extends Component
{
    public $user;
    public $items;
    public $finduser;
    public $adress;
    public $alertMessage;
    public function render()
    {
        return view('livewire.checkout');
    }

    public function mount(){
        if(auth()->check()){
            $this->finduser = auth()->user()->id;
            $items = cart::with('productImage')->where('usersession', $this->finduser)->where('Selected',1)->get();
            $this->items = $items;
            $this->adress = AdressBook::where('user_id', $this->finduser)->get();
        }
        else{
            $this->user = session()->getId();
            $items = cart::with('productImage')->where('usersession', $this->user)->where('Selected',1)->get();
            $this->items = $items;
        }
        
    }
    public function placeorder(){
        $this->alertMessage = 'Item was placed successfully!';
        return redirect()->route('welcome')->with('success', $this->alertMessage);
    }


    public function CreateAdress(){
        return redirect()->route('addresscreate');
    }
}
