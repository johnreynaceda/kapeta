<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Store;
use App\Models\Product;

class SellerDashboard extends Component
{
    public $store_data = [];
    public function render()
    {
        $this->store_data = auth()->user()->store;
        return view('livewire.seller.seller-dashboard',[
            'products' => Product::where('store_id', auth()->user()->store->id)->get()->take(3),
            'hot_sales' => Product::where('store_id', auth()->user()->store->id)->with('orders')->get()->sortBy(
                function($query){
                    return $query->orders->count();
                }
            )->take(3),
        ]);
    }
}
