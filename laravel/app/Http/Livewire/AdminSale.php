<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;

class AdminSale extends Component
{
    public $sale_date;
    public $status;
    public function mount()
    {
        $sale = Sale::find(1);
        $this->sale_date=$sale->sale_date;
        $this->status=$sale->status;
    }
    public function updateSale()
    {
        $sale = Sale::find(1);
        $sale->sale_date=$this->sale_date;
        $sale->status=$this->status;
        $sale->save();
        session()->flash('message','Sale Data updated Successfully');
    }
    public function render()
    {
        return view('livewire.admin-sale')->layout('admintemplate.template');
    }
}
