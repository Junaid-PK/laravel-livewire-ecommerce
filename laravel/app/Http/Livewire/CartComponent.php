<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $item=Cart::get($rowId);
        $qty=$item->qty+1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $item=Cart::get($rowId);
        $qty=$item->qty-1;
        Cart::update($rowId,$qty);
    }
    public function deleteCartItem($rowId)
    {
        Cart::remove($rowId);
        session()->flash('message','Product Removed');
    }
    public function emptyCart()
    {
        Cart::destroy();
        
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('template.template');
    }
}
