<?php

namespace App\Http\Livewire\Customer\Cart;

use Livewire\Component;
use App\Models\Order;
use App\Models\Store;
use WireUi\Traits\Actions;

class CartList extends Component
{
    use Actions;
    public function render()
    {
        return view('livewire.customer.cart.cart-list',[
               'stores' => Order::where('status', 0)->get()->groupBy('store_id'),
        ]);
    }

    public function addQuantity($order_id){
        $order = Order::where('id', $order_id)->first();
        $order->update([
            'quantity' => $order->quantity + 1,
        ]);
        $this->notification()->success(
            $title = 'Added',
            $description = 'Quantity added',
        );
    }

    public function minusQuantity($order_id){
        $order = Order::where('id', $order_id)->first();
        if ($order->quantity > 1) {
            $order->update([
                'quantity' => $order->quantity - 1,
            ]);
        }else{
            $this->dialog()->confirm([
                'title'       => 'Are you Sure?',
                'description' => 'you want to delete this order?',
                'icon'        => 'question',
                'accept'      => [
                    'label'  => 'Yes, delete it',
                    'method' => 'deleteOrder',
                    'color' =>  'negative',
                    'params' => $order_id,
                ],
                'reject' => [
                    'label'  => 'No, cancel',
                ],
            ]);
        }
    }

    public function deleteOrder($id){
        $order = Order::where('id', $id)->first();
        $order->delete();
        $this->notification()->success(
            $title = 'Deleted',
            $description = 'Order deleted',
        );
    }
}
