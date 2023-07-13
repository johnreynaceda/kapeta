<div>

    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-5 xl:max-w-7xl">
        <header>
            <span class="font-titan text-xl text-red-600">MY ORDERS</span>
        </header>
        <div class="mt-4">
            @forelse ($transactions as $item)
                <div class=" border my-2 p-5 shadow">
                    <header class="text-bold flex justify-between items-center"> <span>ORDER:
                            {{ $item->order_number }}</span>
                        <div class="flex space-x-2 items-center">
                            <span class="text-sm">{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</span>
                            <span>|</span>
                            <span class="text-sm font-medium text-red-600">
                                @switch($item->status)
                                    @case(0)
                                        PENDING
                                    @break

                                    @case(1)
                                        COMPLETED
                                    @break

                                    @case(2)
                                        CANCELLED
                                    @break

                                    @default
                                @endswitch
                            </span>
                        </div>
                    </header>
                    @foreach ($item->orders as $order)
                        <div class="mt-2 bg-white border rounded-lg p-5">
                            <div class="flex space-x-2  items-center">
                                <img src="{{ Storage::url($order->product->image_path) }}" class="h-12 rounded-lg w-12"
                                    alt="">
                                <div class="flex-1">
                                    <h1 class="font-medium text-gray-700 uppercase text-lg">{{ $order->product->name }}</h1>
                                    <flex class="flex justify-between">
                                        <h1>x{{ $order->quantity }}</h1>
                                        <h1 class="font-medium text-red-600">
                                            ₱{{ number_format($order->product->price, 2) }}
                                        </h1>
                                    </flex>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="flex mt-4 space-x-2 justify-end items-end">
                        <span class="">Order Total:</span>
                        <span class="font-bold text-xl text-red-600">
                            &#8369;{{ number_format($item->total_amount, 2) }}</span>
                    </div>
                </div>

                @empty
                @endforelse
            </div>
        </div>
    </div>
