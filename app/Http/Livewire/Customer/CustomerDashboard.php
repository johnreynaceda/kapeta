<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Store;

class CustomerDashboard extends Component
{
    public function render()
    {
        return view('livewire.customer.customer-dashboard', [
            'stores' => Store::all(),
        ]);
    }
}