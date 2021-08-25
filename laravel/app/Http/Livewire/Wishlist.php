<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class Wishlist extends Component
{
    public function removeFromWishlist($product_id)
    {
        # code...
        foreach(Cart::instance('wishlist')->content() as $item)
        {
            if($item->id == $product_id){
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('wishlist-count','refreshComponent');
                return;
            }
        }
    }
    public function addToCartFromWishlist($rowId)
    {
        
        $item=Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count','refreshComponent');
        $this->emitTo('cart-count','refreshComponent');
    }
    public function render()
    {
        return view('livewire.wishlist')->layout('template.template');
    }
}
