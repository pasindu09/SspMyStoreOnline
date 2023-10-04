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
    public $ordertotal;
    public $tax;
    public $finaltotal;
    public $eachitemperpricefoquantity;
    public function render()
    {
        return view('livewire.checkout');
    }

    public function mount()
    {
        if (auth()->check()) {
            $this->ordertotal = 0;
            $this->tax = 0;
            $this->finaltotal = 0;
            $this->eachitemperpricefoquantity = [];
            $this->finduser = auth()->user()->id;
            $items = cart::with('productImage')->where('usersession', $this->finduser)->where('Selected', 1)->get();

            foreach ($items as $item) {
                $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                $this->eachitemperpricefoquantity[] = $totalPrice;
                $this->ordertotal += $totalPrice;
                $this->tax += $totalPrice * 0.01;
                $this->finaltotal = $this->ordertotal + $this->tax;
            }
            $this->items = $items;

            $this->adress = AdressBook::where('user_id', $this->finduser)->get();
        } else {
            $this->user = session()->getId();
            $items = cart::with('productImage')->where('usersession', $this->user)->where('Selected', 1)->get();
            $this->items = $items;
        }
    }
    public function placeorder()
    {
        $this->alertMessage = 'Item was placed successfully!';
        return redirect()->route('welcome')->with('success', $this->alertMessage);
    }


    public function CreateAdress()
    {
        return redirect()->route('addresscreate');
    }
}
