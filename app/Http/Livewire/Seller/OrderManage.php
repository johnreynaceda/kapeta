<?php

namespace App\Http\Livewire\Seller;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;
use WireUi\traits\Actions;

class OrderManage extends Component
{
    use Actions;
    public $status;
    public $transaction_id;
    public function mount()
    {
        $this->transaction_id = request('id');
    }
    public function render()
    {
        return view('livewire.seller.order-manage', [
            'transactions' => Transaction::where('id', $this->transaction_id)->first(),
            'orders' => Order::where('transaction_id', $this->transaction_id)->get(),
            'customer' => Order::where('transaction_id', $this->transaction_id)->first(),
        ]);
    }

    public function updateOrder(){
        $trans = Transaction::where('id', $this->transaction_id)->first();
        $trans->update([
            'status' => $this->status,
        ]);

        $this->notification()->success(
            $title = 'Order updated',
            $description = 'The Order has been updated',
        );

        return redirect()->route('seller.order');
    }
}
