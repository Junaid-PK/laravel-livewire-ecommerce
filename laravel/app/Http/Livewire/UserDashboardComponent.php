<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.user-dashboard-component')->layout('template.template');
    }
}
