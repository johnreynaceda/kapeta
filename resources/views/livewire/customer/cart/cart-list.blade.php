<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
        <header class="font-titan text-xl text-red-600 flex justify-between items-center">
            <span>MY COFFEE BASKET</span>
        </header>
        <div class="">
            @foreach ($stores as $key => $item)
                <div class="bg-white border p-2 px-4 rounded-xl">
                    <div class="border p-2 rounded-xl">
                        <div class="flex space-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-red-600">
                                <path
                                    d="M21 13V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V13H2V11L3 6H21L22 11V13H21ZM5 13V19H19V13H5ZM6 14H14V17H6V14ZM3 3H21V5H3V3Z">
                                </path>
                            </svg>
                            <span class="font-bold font-mont">{{ App\Models\Store::find($key)->name }}</span>
                        </div>
                        @forelse ($item as $order)
                            <div class="mt-2 border-t p-2">
                                <div class="flex justify-between items-center">
                                    <div class="flex space-x-2 items-center">
                                        <img src="{{ Storage::url($order->product->image_path) }}"
                                            class="h-12 rounded w-12" alt="">
                                        <div>
                                            <h1 class="text-bold uppercase">{{ $order->product->name }}</h1>
                                            <h1 class="text-sm leading-3">
                                                &#8369;{{ number_format($order->product->price, 2) }}</h1>
                                        </div>
                                    </div>
                                    <div>
                                        <div x-data="{ count: {{ $order->quantity }} }" class="flex items-center gap-x-2">
                                            <x-button x-hold.click.repeat.200ms="count--" xs icon="minus" />

                                            <span class="bg-red-600 text-white px-3 py-0.5" x-text="count"></span>

                                            <x-button x-hold.click.repeat.200ms="count++" xs icon="plus" />
                                        </div>
                                    </div>
                                    <span
                                        class="font-bold font-mont text-gray-600">&#8369;{{ number_format($order->product->price * $order->quantity, 2) }}</span>
                                    <span
                                        class="flex space-x-1 cursor-pointer hover:border-b border-red-600 item-center text-red-600 text-sm fill-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24">
                                            <path
                                                d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM13.4142 13.9997L15.182 15.7675L13.7678 17.1817L12 15.4139L10.2322 17.1817L8.81802 15.7675L10.5858 13.9997L8.81802 12.232L10.2322 10.8178L12 12.5855L13.7678 10.8178L15.182 12.232L13.4142 13.9997ZM9 4V6H15V4H9Z">
                                            </path>
                                        </svg>
                                        <span>delete</span>
                                    </span>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <div class="flex border-t justify-end">
                            <span class="font-bold">Subtotal:</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div
            class="fixed bottom-0 left-0 right-0  border rounded-t-xl  mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
            <div class="flex space-x-4 items-center justify-end">
                <div class="font-bold text-xl text-gray-600">
                    &#8369;TOTAL AMOUNT
                </div>
                <x-button negative label="CHECKOUT" right class="font-bold w-64" />
            </div>
        </div>
    </div>
</div>
