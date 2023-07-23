<?php

namespace App\Http\Livewire\Seller;

use App\Models\Transaction;
use Livewire\Component;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SellerDashboard extends Component
{
    public $sale_modal = false;
    public $store_data = [];
    public function render()
    {
        $this->store_data = auth()->user()->store;
        return view('livewire.seller.seller-dashboard',[
            'products' => Product::where('store_id', auth()->user()->store->id)->get()->take(3),
            'hot_sales' => Product::where('store_id', auth()->user()->store->id)
            ->with(['orders' => function ($query) {
                $query->whereHas('transaction', function ($q) {
                    $q->where('status', 1);
                });
            }])
            ->get()
            ->sortByDesc(function ($product) {
                return $product->orders->sum('quantity');
            })
            ->take(3),
            'total_sales' => Transaction::selectRaw('DATE(created_at) as date, SUM(total_amount) as total_sales')
            ->where('store_id', auth()->user()->store->id)
            ->where('status', 1)
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get(),

        ]);
    }
}
