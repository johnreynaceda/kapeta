<?php

namespace App\Http\Livewire\Admin;

use App\Models\Transaction;
use Livewire\Component;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Charts extends Component
{
    public $datas = [];

    public function mount()
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now();

        $this->datas = Transaction::where('store_id', auth()->user()->store_id)->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as sum'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get()
            ->toArray();
    }

    public function render()
    {

        return view('livewire.admin.charts');
    }
}
