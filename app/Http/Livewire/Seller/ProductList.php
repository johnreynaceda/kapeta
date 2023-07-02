<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Product;
use DB;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ProductList extends Component
{
    use WithFileUploads;
    use Actions;
    public $add_modal = false;
    public $name, $price, $category, $status, $image_path = [], $image;
    public $selectedProduct = [];
    public function render()
    {
        return view('livewire.seller.product-list', [
            'products' => Product::where('store_id', auth()->user()->store->id)->get(),
        ]);
    }

    public function updatedImagePath()
    {
        foreach ($this->image_path as $key => $value) {
            $this->image = $value;
        }
    }

    public function selectProduct($productId)
    {
        foreach ($this->selectedProduct as $key => $value) {
            if ($value['id'] == $productId) {
                unset($this->selectedProduct[$key]);
                return;
            }
        }
        $this->selectedProduct[] = [
            'id' => $productId,
        ];
    }

    public function deleteSelected(){
        foreach ($this->selectedProduct as $key => $value) {
            Product::find($value['id'])->delete();
        };
        $this->notification()->success(
            $title = 'Product Deleted',
            $description = 'Product has been deleted from your store.',
        );
        return redirect()->route('seller.product');
    }

    public function createProduct()
    {

        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        DB::beginTransaction();
        Product::create([
            'store_id' => auth()->user()->store->id,
            'name' => $this->name,
            'price' => $this->price,
            'category' => $this->category,
            'status' => $this->status,
            'image_path' => $this->image->store('product_images', 'public')

        ]);
        $this->notification()->success(
            $title = 'Product Added',
            $description = 'Product has been added to your store.',
        );
        DB::commit();
        $this->reset('name', 'price', 'category', 'status', 'image_path', 'image');
        $this->add_modal = false;

    }
}
