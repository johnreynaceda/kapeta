<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Order;

class SellerOrder extends Component
{
    public function render()
    {
        return view('livewire.seller.seller-order', [
            'transactions' => Transaction::where('store_id', auth()->user()->store->id)->orderBy('created_at', 'desc')->get()->sortBy('status'),
        ]);
    }
}
