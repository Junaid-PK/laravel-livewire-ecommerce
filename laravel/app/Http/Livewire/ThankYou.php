<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThankYou extends Component
{
    public function render()
    {
        return view('livewire.thank-you')->layout('template.template');
    }
}
