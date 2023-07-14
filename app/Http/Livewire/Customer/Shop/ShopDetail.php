<?php

namespace App\Http\Livewire\Customer\Shop;

use Livewire\Component;
use App\Models\Store;
use App\Models\Product;
use App\Models\Order;
use WireUi\Traits\Actions;

class ShopDetail extends Component
{
    use Actions;
    public $store_id;

    public function mount()
    {
        $id             = request('name');
        $this->store_id = $id[strlen($id) - 1];
    }

    public function render()
    {
        return view('livewire.customer.shop.shop-detail', [
            'shop' => Store::where('id', $this->store_id)->first(),
            'products' => Product::where('store_id', $this->store_id)->get(),
        ]);
    }

    public function addToCart($product_id)
    {
        $order = order::where('product_id', $product_id)->where('status', 0)->where('transaction_id', null)->where('user_id', auth()->user()->id)->get();
        // dd(Product::where('id', $product_id)->first());

        if (Product::where('id', $product_id)->first()->status == 'No Stock') {
            $this->notification()->error(
                $title = 'Product Out of Stock',
                $description = 'Product is out of stock',
            );
        }else{
               if ($order->count() == 1) {
            $order->first()->update([
                'quantity' => $order->first()->quantity + 1,
            ]);
            $this->emit('cart');
            $this->notification()->success(
                $title = 'Product Addedd to Cart',
                $description = 'Product has been added to your cart',
            );
        } else {
            Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id,
                'store_id' => $this->store_id,
            ]);
            $this->emit('cart');
            $this->notification()->success(
                $title = 'Product Addedd to Cart',
                $description = 'Product has been added to your cart',
            );
        }
        }


    }
}
