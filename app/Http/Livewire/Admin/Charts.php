<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class Charts extends Component
{
    public $datas = [];

    public $productLabels = [];
    public $totalSoldData = [];

    public function scopeTopSoldProductsLast7Days($query)
    {
        return $query->select('product_id', \DB::raw('SUM(quantity) as total_sold'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(3);
    }

    public function render()
    {
        $topSoldProducts = Order::select('products.name', \DB::raw('SUM(quantity) as total_sold'))
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.created_at', '>=', now()->subDays(7))
            ->groupBy('products.id', 'products.name')->whereHas('transaction', function ($query) {
            $query->where('status', 1)->where('store_id', auth()->user()->store_id);
        })
            ->orderByDesc('total_sold')
            ->take(5);

        // Prepare data for the bar graph
        $this->productLabels = $topSoldProducts->pluck('name')->toArray();
        $this->totalSoldData = $topSoldProducts->pluck('total_sold')->toArray();

        return view('livewire.admin.charts', [
            'hot_sales' => Order::select('products.id', \DB::raw('SUM(quantity) as total_sold'))
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->groupBy('products.id', 'products.name')->whereHas('transaction', function ($query) {
                $query->where('status', 1)->where('store_id', auth()->user()->store_id);
            })
                ->orderByDesc('total_sold')->get()
                ->take(3),
        ]);
    }
}
