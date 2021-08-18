<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;

class ShopComponent extends Component
{
    
    public function render()
    {
        return view('livewire.shop-component',[
            'products' => Product::paginate(10),
        ])->layout('template.template');
    }
}
