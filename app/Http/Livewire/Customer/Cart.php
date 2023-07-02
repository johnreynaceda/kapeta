<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;

class Cart extends Component
{
    protected $listeners = ['cart' => 'render'];
    public function render()
    {
        return view('livewire.customer.cart',[
            'orders' => Order::where('user_id', auth()->user()->id)->where('status', 0)->count(),
        ]);
    }
}
