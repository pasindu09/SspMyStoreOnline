<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use App\Models\cart;
use Illuminate\Console\View\Components\Alert;

class Test1 extends Component
{

    public $products;
    public $cartforuser;
    public $cart = [];
    public $user;
    public $finduser;
    public $lemem;
    public $button = true;
    public $showQuantityButtons = true;
    protected $listeners = ['refreshComponent' => 'mount'];

    
  
    public function render()
    {
        return view('livewire.test1');
    }

    public function mount(){
        $this->products = Product::with('productImage')->get();
        $this->user = session()->getId();
        if(auth()->check()){
          $this->lemem = Cart::where('usersession', $this->finduser = auth()->user()->id)->get();
        }
        else{
               $this->lemem = Cart::where('usersession', $this->user)->get();
        }
        
        }

        public function addToCart($id)
        {
          $existsInCart = Cart::where('product_id', $id)->where('usersession',$this->finduser)->exists();
          $existsInCart2 = Cart::where('product_id', $id)->where('usersession',$this->user)->exists();
          if(auth()->check()){
            if(auth()->user()->role == 0){
              if ($existsInCart){
                $item = Cart::where('product_id', $id)->where('usersession', $this->finduser)->first();
          if ($item) {
           $data = (int)$item->quantity;
           $newdata = $data + 1;
           $data2 = (int)$item->addtocartclicks;
           $newdata2 = $data2 + 1;
         
           
           $item->update([
            'addtocartclicks' => $newdata2,
            'quantity' => $newdata
            ]);
 
            $this->lemem = Cart::where('usersession', $this->finduser)->get();
           
            return $item;
     }
              }
              else{
                $product = Product::with('productImage')->find($id);
                $imagePath = $product->productImage->path;
                $this->finduser = auth()->user()->id;
                cart::create([
                 'product_id' => $id,
                 'addtocartclicks' => '1',
                 'usersession'=>$this->finduser,
                 'quantity' => '1',
                 'imagepath' => $imagePath,
         ]);
         $this->lemem = Cart::where('usersession', $this->finduser)->get();
              }
           
        }
        }
        else{
          if($existsInCart2){
            $item = Cart::where('product_id', $id)->where('usersession', $this->user)->first();
      
            if ($item) {
             $data = (int)$item->quantity;
             $newdata = $data + 1;
             $data2 = (int)$item->addtocartclicks;
             $newdata2 = $data2 + 1;
   
             $item->update([
              'addtocartclicks' => $newdata2,
              'quantity' => $newdata
              ]);
   
              $this->lemem = Cart::where('usersession', $this->user)->get();
             
              return $item;
       }
          }
          else{
            $product = Product::with('productImage')->find($id);
            $imagePath = $product->productImage->path;
            cart::create([
              'product_id' => $id,
              'addtocartclicks' => '1',
              'usersession'=>$this->user,
              'quantity' => '1',
              'imagepath' => $imagePath,
      ]);
      $this->lemem = Cart::where('usersession', $this->user)->get();
          }
        }
        $this->emit('refreshComponent');
        }

      public function view($id){
        $existsInCart = Cart::where('product_id', $id)->where('usersession',$this->finduser)->exists();
          $existsInCart2 = Cart::where('product_id', $id)->where('usersession',$this->user)->exists();
        if(auth()->check()){
          if($existsInCart){
            $item = Cart::where('product_id', $id)->where('usersession', $this->finduser)->first();
    
            if ($item) {
             $data = (int)$item->viewclicks+ 1;
     
    
             $item->update([
              'viewclicks' => $data,
              ]);
             
       }
          }
          else{
            $this->finduser = auth()->user()->id;
                cart::create([
                 'product_id' => $id,
                 'addtocartclicks' => '0',
                 'usersession'=>$this->finduser,
                 'quantity' => '0',
                 'viewclicks' => '1',
         ]);
          }
      }
        else{
          if($existsInCart2){
            $item = Cart::where('product_id', $id)->where('usersession', $this->user)->first();
    
            if ($item) {
             $data = (int)$item->viewclicks + 1;
     
    
             $item->update([
              'viewclicks' => $data,
              ]);
             
       }

          }
          else{
            cart::create([
             'product_id' => $id,
             'addtocartclicks' => '0',
             'usersession'=>$this->user,
             'quantity' => '0',
             'viewclicks' => '1',
     ]);
          }
         
        }
      }


      public function viewcart(){

      }
    
}
