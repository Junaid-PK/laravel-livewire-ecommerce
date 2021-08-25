<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistCount extends Component
{
    protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.wishlist-count');
    }
}
