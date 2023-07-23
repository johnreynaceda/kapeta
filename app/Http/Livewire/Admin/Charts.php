<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Charts extends Component
{
    public $datas = [];

    // public function mount()
    // {
    //     $startDate = Carbon::now()->subDays(7)->startOfDay();
    //     $endDate = Carbon::now()->endOfDay();

    //     $this->datas = Order::where('store_id', auth()->user()->store_id)->select(
    //         DB::raw('DATE(created_at) as date'),
    //         DB::raw('COUNT(*) as total_orders')
    //     )
    //     ->whereBetween('created_at', [$startDate, $endDate])
    //     ->groupBy('date')
    //     ->orderBy('date')
    //     ->get();

    // }

    public function render()
    {

        $startDate = Carbon::now()->subDays(7)->startOfDay();
    $endDate = Carbon::now()->endOfDay();

    $data = Order::where('store_id', auth()->user()->store_id)
        ->select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total_orders')
        )
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    // Prepare data for the Chart.js script

    foreach ($data as $item) {
        $this->datas[$item->date] = $item->total_orders;
    }
        return view('livewire.admin.charts');
    }
}
