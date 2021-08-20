<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class AdminCategories extends Component
{
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin-categories',['categories'=>$categories])->layout('admintemplate.template');
    }
}
