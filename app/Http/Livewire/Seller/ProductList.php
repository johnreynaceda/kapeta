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
    public $edit_modal = false;

    public $name, $price, $description, $category, $status, $image_path = [], $image;

    public $product_id;
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
            'description' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        DB::beginTransaction();
        Product::create([
            'store_id' => auth()->user()->store->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
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

    public function editProduct($id){
        $product = Product::where('id', $id)->first();
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->category = $product->category;
        $this->status = $product->status;
        $this->product_id = $product->id;
        // $this->image_path = $product->image_path;

        $this->edit_modal = true;
    }

    public function updateProduct(){
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'status' => 'required',
            'image_path' => 'required',

        ]);

        DB::beginTransaction();
        Product::where('id', $this->product_id)->update([
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'category' => $this->category,
            'status' => $this->status,
            'image_path' => $this->image == null ? $this->image_path : $this->image->store('product_images', 'public'),

        ]);
        $this->notification()->success(
            $title = 'Product Updated',
            $description = 'Product has been updated.',
        );
        DB::commit();
        $this->reset('name', 'price', 'category', 'status', 'image_path', 'image');
        $this->edit_modal = false;
    }

    public function closeModal(){
        $this->reset('name', 'price', 'category', 'status', 'image_path', 'image');
        $this->add_modal = false;
        $this->edit_modal = false;
    }
}
