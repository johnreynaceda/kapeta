<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
        <header class="font-bold text-xl text-red-600 flex justify-between items-center">
            <span>MY PRODUCTS</span>
            <div class="flex items-center relative space-x-2">
                @if ($selectedProduct)
                    <x-button label="Delete Selected" wire:click="deleteSelected" spinner="deleteSelected" icon="trash"
                        rounded negative />
                @endif
                <x-button label="New Products" wire:click="$set('add_modal', true)" icon="plus" rounded dark />
            </div>
        </header>
        <div class="mt-5 grid grid-cols-4 gap-5">
            @forelse ($products as $key => $product)
                <div wire:key="{{ $key }}"
                    class="border cursor-pointer border-gray-400 hover:ring-2 relative hover:ring-red-600 rounded-t-2xl rounded-b-3xl shadow bg-white bg-opacity-50">
                    <div class="h-28  rounded-t-2xl  relative">
                        <img src="{{ Storage::url($product->image_path) }}" alt=""
                            class="object-cover h-full w-full rounded-t-xl  rounded-b-3xl ">
                        <div
                            class="absolute top-0 bottom-0 right-0 left-0 bg-gradient-to-t from-gray-700 rounded-xl w-full h-full">
                        </div>
                    </div>
                    <div class="p-2 py-4 px-4">
                        <div class="flex justify-between items-center">
                            <h1 class="font-bold text-red-600 text-lg">{{ $product->name }}</h1>
                            @switch($product->category)
                                @case('Appetizer')
                                    <x-badge label="{{ $product->category }}" xs amber />
                                @break

                                @case('Coffee')
                                    <x-badge label="{{ $product->category }}" xs positive />
                                @break

                                @case('Dessert')
                                    <x-badge label="{{ $product->category }}" xs negative />
                                @break

                                @default
                            @endswitch
                        </div>
                        <h1 class="leading-3 text-sm text-gray-600 font-medium">
                            &#8369;{{ number_format($product->price, 2) }}</h1>
                    </div>
                    <div class="absolute top-2 left-2" wire:ignore>
                        <x-checkbox id="{{ $product->id }}" wire:click="selectProduct({{ $product->id }})" />
                    </div>
                </div>
                @empty
                    <div class="col-span-4 flex justify-start">
                        <span>No Products Available!</span>
                    </div>
                @endforelse
            </div>
        </div>

        <x-modal wire:model.defer="add_modal" align="center" max-width="3xl">
            <x-card title="New Product">
                <div>
                    <div class="border rounded-xl p-4 grid grid-cols-2 gap-4">
                        <x-input label="Name" placeholder="" wire:model="name" />
                        <x-input label="Price" prefix="₱" placeholder="" wire:model="price" />
                        <div class="cols-span-2">
                            <input type="file" wire:model="image_path" class="w-full" />
                        </div>
                        <div class="col-span-2">
                            @if ($image)
                                Photo Preview:

                                <img src="{{ $image->temporaryUrl() }}" class="border rounded-xl h-56 ">
                            @endif
                        </div>
                    </div>
                    <div class="border rounded-xl mt-3 p-4 grid grid-cols-2 gap-4">
                        <x-native-select label="Category" wire:model="category">
                            <option selected hidden>Select an Option</option>
                            <option value="Appetizer">Appetizer</option>
                            <option value="Coffee">Coffee</option>
                            <option value="Dessert">Dessert</option>
                        </x-native-select>
                        <x-native-select label="Status" wire:model="status">
                            <option selected hidden>Select an Option</option>
                            <option value="In Stock">In Stock</option>
                            <option value="No Stock">No Stock</option>
                        </x-native-select>
                    </div>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-end gap-x-2">
                        <x-button flat rounded negative label="Cancel" x-on:click="close" />
                        <x-button dark rounded label="Submit" wire:click="createProduct" spinner="createProduct"
                            right-icon="arrow-right" />
                    </div>
                </x-slot>
            </x-card>
        </x-modal>
    </div>
