<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard-component')->layout('admintemplate.template');
    }
}
