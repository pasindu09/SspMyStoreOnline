<?php

namespace App\Http\Livewire;

use App\Models\cart;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\sellers;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Arr;
use Livewire\Component;

class CartItems extends Component
{
    public $checkboxState = false;
    public $IsCheckedPerItem = false;
    public $selectedItemCount;
    public $selectedItemCount1;
    public $checkcount = 0;
    public $user;
    public $shipingPrice;
    public $finduser;
    public $cartItemsForUser;
    public $cartItemsForUser2;
    public $totalPriceForItem;
    public $totalPrice;
    public $arrayOfItemSelectedOrNot;
    public $selectedCartItems;
    public $cartquantitytotal;
    protected $listeners = [
        'refreshComponent' => 'mount',
        'checkboxClicked' => 'handleCheckboxClicked'
    ];
    //  public $seller = sellers::where('user_id', $this->finduser)->value('id');
    public $IsChecked = true;
    public $perCartTotal;
    public $checkboxItem = false;
    public function render()
    {
        return view('livewire.cart-items');
    }

    public function mount()
    {  $this->cartquantitytotal = 0;
        $this->selectedItemCount;
        $this->selectedItemCount1;
        $this->perCartTotal = 0.00;
        $this->selectedCartItems = [];
        if (auth()->check()) {
            $this->finduser = auth()->user()->id;
            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
            if ($this->cartItemsForUser) {
                $this->totalPriceForItem = []; // Initialize an empty array

                foreach ($this->cartItemsForUser as $item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                    $this->cartquantitytotal += (int)$item->quantity;
                }
                $this->perCartTotal = 0.00;
                $this->totalPrice = 0.00;
                $this->shipingPrice = 0.00;
            }
            $count = Cart::with('productImage')
                ->where('usersession', $this->finduser)
                ->get();
            if ($count) {
                $this->arrayOfItemSelectedOrNot = [];
                foreach ($count as $item) {
                    $this->arrayOfItemSelectedOrNot[] = $item->Selected;
                }
            }
            $this->openCart();
        } else {
            $this->user = session()->getId();
            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
            if ($this->cartItemsForUser) {
                $this->totalPriceForItem = []; // Initialize an empty array

                foreach ($this->cartItemsForUser as $item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                    $this->cartquantitytotal += (int)$item->quantity;
                }

                $this->perCartTotal = 0.00;
                $this->totalPrice = 0.00;
                $this->shipingPrice = 0.00;
            }
            $count = Cart::with('productImage')
                ->where('usersession', $this->user)
                ->get();
            if ($count) {
                $this->arrayOfItemSelectedOrNot = [];
                foreach ($count as $item) {
                    $this->arrayOfItemSelectedOrNot[] = $item->Selected;
                }
            }
            $this->openCart();
        }
    }





    public function openCart()
    {
        if (auth()->check()) {
            $this->finduser = auth()->user()->id;
            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
            $thevalue = Cart::where('usersession', $this->finduser)->where('Selected', 1)->count();
            $this->selectedItemCount1 = $thevalue;
            $thevalue2 = Cart::where('usersession', $this->finduser)->where('quantity', '>', 0)->count();
            $this->selectedItemCount = $thevalue2;
            if ($thevalue == $thevalue2) {
                $this->IsChecked = true;
            } else {
                $this->IsChecked = false;
            }
            $this->cartItemsForUser2 = cart::with('productImage')->where('usersession', $this->finduser)->where('Selected', 1)->get();
            if ($this->cartItemsForUser2) {
                $totalPriceForItem = []; // Initialize an empty array

                foreach ($this->cartItemsForUser2 as $item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $totalPriceForItem[] = $totalPrice; // Add the total price to the array
                }

                foreach ($totalPriceForItem as $item) {
                    $this->perCartTotal += $item;
                }
                if ($this->perCartTotal) {
                    $this->shipingPrice = 4.99;
                    $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                } else {
                    $this->perCartTotal = 0.00;
                    $this->totalPrice = 0.00;
                    $this->shipingPrice = 0.00;
                }
            }
        } else {
            $this->user = session()->getId();
            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
            $thevalue = Cart::where('usersession', $this->user)->where('Selected', 1)->count();
            $this->selectedItemCount1 = $thevalue;
            $thevalue2 = Cart::where('usersession', $this->user)->where('quantity', '>', 0)->count();
            $this->selectedItemCount = $thevalue2;
            if ($thevalue == $thevalue2) {
                $this->IsChecked = true;
            } else {
                $this->IsChecked = false;
            }
            $this->cartItemsForUser2 = cart::with('productImage')->where('usersession', $this->user)->where('Selected', 1)->get();
            if ($this->cartItemsForUser2) {
                $totalPriceForItem = []; // Initialize an empty array

                foreach ($this->cartItemsForUser2 as $item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $totalPriceForItem[] = $totalPrice; // Add the total price to the array
                }

                foreach ($totalPriceForItem as $item) {
                    $this->perCartTotal += $item;
                }
                if ($this->perCartTotal) {
                    $this->shipingPrice = 4.99;
                    $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                } else {
                    $this->perCartTotal = 0.00;
                    $this->totalPrice = 0.00;
                    $this->shipingPrice = 0.00;
                }
            }
        }
        $this->emit('refreshComponent');
    }



    public function increment($id)
    {
        if (auth()->check()) {
            $item = Cart::where('product_id', $id)->where('usersession', $this->finduser)->first();

            if ($item) {
                $data = (int)$item->quantity;
                $newdata = $data + 1;

                $item->update([
                    'quantity' => $newdata
                ]);

                $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
            }
        } else {

            $item = Cart::where('product_id', $id)->where('usersession', $this->user)->first();

            if ($item) {
                $data = (int)$item->quantity;
                $newdata = $data + 1;

                $item->update([
                    'quantity' => $newdata
                ]);

                $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
            }
        }

        $this->emit('refreshComponent');
    }


    public function decreaseQuantity($id)
    {
        if (auth()->check()) {
            $item = Cart::where('product_id', $id)->where('usersession', $this->finduser)->first();

            if ($item) {
                $data = (int)$item->quantity;
                $newdata = $data - 1;

                $item->update([
                    'quantity' => $newdata
                ]);
            }


            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->finduser)->get();
            if ($this->cartItemsForUser) {
                $this->totalPriceForItem = []; // Initialize an empty array

                foreach ($this->cartItemsForUser as $item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                }
            }
        } else {
            $item = Cart::where('product_id', $id)->where('usersession', $this->user)->first();

            if ($item) {
                $data = (int)$item->quantity;
                $newdata = $data - 1;

                $item->update([
                    'quantity' => $newdata
                ]);
            }

            $this->cartItemsForUser = cart::with('productImage')->where('usersession', $this->user)->get();
            if ($this->cartItemsForUser) {
                $this->totalPriceForItem = []; // Initialize an empty array

                foreach ($this->cartItemsForUser as $item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                    $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                    $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                }
            }
        }
        $this->emit('refreshComponent');
    }




    public function updatedIsChecked()
    {
        if (auth()->check()) {

            if ($this->IsChecked) {
                $cartItem =  Cart::where('usersession', $this->finduser)->where('quantity', '>', 0)->get();
                foreach ($cartItem as $item) {
                    $item->update([
                        'Selected' => 1,
                    ]);
                }
                $this->perCartTotal = 0.00;
                $this->totalPrice = 0.00;
                $this->shipingPrice = 0.00;
                $this->checkboxState = !$this->checkboxState;
                if ($this->cartItemsForUser) {
                    $this->checkboxItem = true;
                    $this->totalPriceForItem = []; // Initialize an empty array

                    foreach ($this->cartItemsForUser as $item) {
                        $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                        $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                        $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                    }


                    foreach ($this->totalPriceForItem as $item) {
                        $this->perCartTotal += $item;
                    }
                    if ($this->perCartTotal) {
                        $this->shipingPrice = 4.99;
                        $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                    } else {
                        $this->totalPrice = 0.00;
                        $this->shipingPrice = 0.00;
                    }
                }
            } else {
                $cartItem =  Cart::where('usersession', $this->finduser)->where('quantity', '>', 0)->get();
                foreach ($cartItem as $item) {
                    $item->update([
                        'Selected' => null,
                    ]);
                }
                $this->checkboxState = false;
                $this->checkboxItem = false;
                $this->perCartTotal = 0.00;
                $this->totalPrice = 0.00;
                $this->shipingPrice = 0.00;
            }
        } else {

            if ($this->IsChecked) {
                $cartItem =  Cart::where('usersession', $this->user)->where('quantity', '>', 0)->get();
                foreach ($cartItem as $item) {
                    $item->update([
                        'Selected' => 1,
                    ]);
                }
                $this->perCartTotal = 0.00;
                $this->totalPrice = 0.00;
                $this->shipingPrice = 0.00;
                $this->checkboxState = !$this->checkboxState;
                if ($this->cartItemsForUser) {
                    $this->checkboxItem = true;
                    $this->totalPriceForItem = []; // Initialize an empty array

                    foreach ($this->cartItemsForUser as $item) {
                        $priceWithoutDollarSign = (float) str_replace('$', '', $item->productImage->productprice);
                        $totalPrice = $priceWithoutDollarSign * (int) $item->quantity;
                        $this->totalPriceForItem[] = $totalPrice; // Add the total price to the array
                    }


                    foreach ($this->totalPriceForItem as $item) {
                        $this->perCartTotal += $item;
                    }
                    if ($this->perCartTotal) {
                        $this->shipingPrice = 4.99;
                        $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                    } else {
                        $this->totalPrice = 0.00;
                        $this->shipingPrice = 0.00;
                    }
                }
            } else {
                $cartItem =  Cart::where('usersession', $this->user)->where('quantity', '>', 0)->get();
                foreach ($cartItem as $item) {
                    $item->update([
                        'Selected' => null,
                    ]);
                }
                $this->checkboxState = false;
                $this->checkboxItem = false;
                $this->perCartTotal = 0.00;
                $this->totalPrice = 0.00;
                $this->shipingPrice = 0.00;
            }
        }
    }

    public function ischeckworking()
    {
        $this->IsChecked = true;
    }

    public function handleCheckboxClicked($isChecked, $id, $isCheckedd)
    {
        if (auth()->check()) {
            $item = cart::with('productImage')->where('usersession', $this->finduser)->where('id', $id)->get();
            $cartItem =  Cart::where('id', $id)->where('usersession', $this->finduser)->first();

            if ($isChecked) {
                if ($cartItem) {
                    $cartItem->update([
                        'Selected' => 1,
                    ]);
                }
                //  $this->increment($itemchecked->product_id);

                if ($item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item[0]->productImage->productprice);
                    $itemQuantity = (int) $item[0]->quantity;
                    $this->perCartTotal += $priceWithoutDollarSign * $itemQuantity;
                    if ($this->perCartTotal) {
                        $this->shipingPrice = 4.99;
                        $this->totalPrice =  $this->perCartTotal + $this->shipingPrice;
                    } else {
                        $this->totalPrice = 0.00;
                        $this->shipingPrice = 0.00;
                    }
                }
            } else {
                if ($cartItem) {
                    $cartItem->update([
                        'Selected' => null,
                    ]);
                }
                if ($item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item[0]->productImage->productprice);
                    $itemQuantity = (int) $item[0]->quantity;
                    $this->perCartTotal -= ($priceWithoutDollarSign * (float)$itemQuantity);
                    $this->perCartTotal = round($this->perCartTotal, 2);


                    if ($this->perCartTotal) {
                        $this->shipingPrice = 4.99;
                        $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                    } else {
                        $this->totalPrice = 0.00;
                        $this->shipingPrice = 0.00;
                    }
                }
            }
            $thevalue = Cart::where('usersession', $this->finduser)->where('Selected', 1)->count();
            $thevalue2 = Cart::where('usersession', $this->finduser)->where('quantity', '>', 0)->count();
            if ($thevalue == $thevalue2) {
                $this->ischeckworking();
                $this->updatedIsChecked();
            } else {
                $this->IsChecked = false;
            }
        } else {
            $item = cart::with('productImage')->where('usersession', $this->user)->where('id', $id)->get();
            $cartItem =  Cart::where('id', $id)->where('usersession', $this->user)->first();
            //    $itemchecked = Cart::where('id', $id)->where('usersession', $this->user)->first();

            if ($isChecked) {
                if ($cartItem) {
                    $cartItem->update([
                        'Selected' => 1,
                    ]);
                }

                if ($item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item[0]->productImage->productprice);
                    $itemQuantity = (int) $item[0]->quantity;
                    $this->perCartTotal += $priceWithoutDollarSign * $itemQuantity;
                    if ($this->perCartTotal) {
                        $this->shipingPrice = 4.99;
                        $this->totalPrice =  $this->perCartTotal + $this->shipingPrice;
                    } else {
                        $this->totalPrice = 0.00;
                        $this->shipingPrice = 0.00;
                    }
                }
            } else {
                if ($cartItem) {
                    $cartItem->update([
                        'Selected' => null,
                    ]);
                }
                if ($item) {
                    $priceWithoutDollarSign = (float) str_replace('$', '', $item[0]->productImage->productprice);
                    $itemQuantity = (int) $item[0]->quantity;
                    $this->perCartTotal -= ($priceWithoutDollarSign * (float)$itemQuantity);
                    $this->perCartTotal = round($this->perCartTotal, 2);


                    if ($this->perCartTotal) {
                        $this->shipingPrice = 4.99;
                        $this->totalPrice = $this->perCartTotal + $this->shipingPrice;
                    } else {
                        $this->totalPrice = 0.00;
                        $this->shipingPrice = 0.00;
                    }
                }
            }

            $thevalue = Cart::where('usersession', $this->user)->where('Selected', 1)->count();
            $thevalue2 = Cart::where('usersession', $this->user)->where('quantity', '>', 0)->count();
            if ($thevalue == $thevalue2) {
                $this->ischeckworking();
                $this->updatedIsChecked();
            } else {
                $this->IsChecked = false;
            }
        }
    }

    public function removeCartItem($id)
    {
        if (auth()->check()) {
            $item = Cart::where('id', $id)->where('usersession', $this->finduser)->first();
            $item->update([
                'quantity' => 0,
                'Selected' => null,
                'Abandonedtimes' => 0,
            ]);
            $this->emit('refreshComponent');
        } else {
            $item = Cart::where('id', $id)->where('usersession', $this->user)->first();
            $item->update([
                'quantity' => 0,
                'Selected' => null,
                'Abandonedtimes' => 0,
            ]);
            $this->emit('refreshComponent');
        }
    }


    public function checkout()
    {
        $products = Cart::with('productImage')->where('usersession', $this->finduser)->where('Selected', 1)->get();
        $invoiceNumber = 'INV-' . uniqid();
        if (auth()->check()) {
            $user = auth()->user()->id;
            $item = Cart::where('usersession', $user)->where('Selected', 1)->count();
            if ($item > 0) {
                if (auth()->user()->role == 0) {
                    $invoice = Invoice::create([
                        'user_id' => auth()->user()->id,
                        'products' => $products,
                        'invoice_number' => $invoiceNumber,
                        'status' => 'pending',
                    ]);
                    return redirect()->route('checkout');
                }
            }

        } else {
            return redirect()->route('register');
        }
    }
}
