<?php

namespace App\Http\Livewire\Customer\Cart;

use Livewire\Component;
use App\Models\Order;
use App\Models\Store;

class CartList extends Component
{
    public function render()
    {
        return view('livewire.customer.cart.cart-list',[
               'stores' => Order::get()->groupBy('store_id'),
        ]);
    }
}
