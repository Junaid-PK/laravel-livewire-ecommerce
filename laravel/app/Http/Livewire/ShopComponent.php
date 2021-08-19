<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;
use Cart;
class ShopComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
        {
            Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
            session()->flash('message','product added');
            return redirect()->route('product.cart'); 
              
        }
    public function render()
    {
        return view('livewire.shop-component',[
            'products' => Product::paginate(10),
        ])->layout('template.template');
    }
}
