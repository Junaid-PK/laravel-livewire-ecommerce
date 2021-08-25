<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $item=Cart::instance('cart')->get($rowId);
        $qty=$item->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $item=Cart::instance('cart')->get($rowId);
        $qty=$item->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count','refreshComponent');
    }
    public function deleteCartItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count','refreshComponent');
        session()->flash('message','Product Removed');
    }
    public function emptyCart()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count','refreshComponent');
        
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('template.template');
    }
}
