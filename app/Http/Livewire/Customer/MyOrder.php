<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Transaction;

class MyOrder extends Component
{
    public function render()
    {
        return view('livewire.customer.my-order',[
            'transactions' => Transaction::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
