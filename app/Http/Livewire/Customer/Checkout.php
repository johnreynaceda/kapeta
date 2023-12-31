<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;
use App\Models\Transaction;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.customer.checkout', [
            'stores' => Order::where('status', 0)->where('user_id', auth()->user()->id)->get()->groupBy('store_id'),
        ]);
    }

    public function placeOrder()
    {
        $orders = Order::where('user_id', auth()->user()->id)->where('status', 0)->get();
        $store  = $orders->groupBy('store_id');
        foreach ($store as $key => $value) {
            $total       = array_sum($value->map(
                function ($q) {
                    return $q->product->price * $q->quantity;
                }
            )->toArray());
            $transaction = Transaction::create([
                'store_id' => $key,
                'order_number' => mt_rand(100000, 999999),
                'user_id' => auth()->user()->id,
                'total_amount' => $total,
                'status' => 0,
            ]);
            foreach ($value as $key => $order) {
                $order->update([
                    'transaction_id' => $transaction->id,
                    'status' => 1,
                ]);
            }
        }
        return redirect()->route('customer.place-order');


        // $orders = Order::where('user_id', auth()->user()->id)->where('status', 0)->get();
        // $total  = array_sum($orders->map(
        //     function ($q) {
        //         return $q->product->price * $q->quantity;
        //     }
        // )->toArray());

        // $transaction = Transaction::create([
        //     'store_id' => mt_rand(100000, 999999),
        //     'user_id' => auth()->user()->id,
        //     'total_amount' => $total,
        //     'status' => 0,
        // ]);
        // foreach ($orders as $key => $order) {
        //     $order->update([
        //         'transaction_id' => $transaction->id,
        //         'status' => 1,
        //     ]);
        // }
        // $this->emit('cart');
        // return redirect()->route('customer.place-order');
    }
}