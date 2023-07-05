<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Store;

class LocateShop extends Component
{
    public $store_address;
    public $store_id;
    public function render()
    {
        return view('livewire.customer.locate-shop',[
            'stores' => Store::all()
        ]);
    }

    public function shop($id){
        $store = Store::where('id',$id)->first();
        $this->store_id = $store->id;
        $this->store_address = $store->address;
    }

}
