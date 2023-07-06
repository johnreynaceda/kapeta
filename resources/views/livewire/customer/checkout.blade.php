<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-5 xl:max-w-7xl">
        <header class="text-xl text-red-600 font-titan">CHECKOUT</header>
        <div class="bg-gray-50 -t-4 -red-600 -dashed p-5">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-red-600">
                    <path
                        d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z">
                    </path>
                </svg>
                <span class="text-lg text-red-600">Delivery Address</span>
            </div>
            <div class="mt-3">
                <div class="flex justify-between items-center">
                    <p class="font-medium">{{ auth()->user()->name }}
                        ({{ auth()->user()->customerDetail->phone_number }})</p>
                    <p class="font-medium">{{ auth()->user()->customerDetail->address }}</p>
                    <div>
                        <span>Change</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white border p-5">
            <table id="example" class="table-auto mt-5" style="width:100%">
                <thead class="font-normal">
                    <tr>
                        <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">PRODUCTS ORDERED
                        </th>
                        <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2"></th>
                        <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">
                        </th>
                        <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">
                        </th>
                        <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">Unit Price</th>
                        <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">Quantity</th>
                        <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">Item Subtotal</th>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse ($stores as $key => $item)
                        <tr>
                            <td colspan="7" class="flex space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="h-5 w-5 fill-red-600">
                                    <path
                                        d="M21 13V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V13H2V11L3 6H21L22 11V13H21ZM5 13V19H19V13H5ZM6 14H14V17H6V14ZM3 3H21V5H3V3Z">
                                    </path>
                                </svg>
                                <span
                                    class="font-titan uppercase text-red-600">{{ App\Models\Store::find($key)->name }}</span>
                            </td>
                        </tr>
                        @foreach ($item as $order)
                            <tr class="border-b">
                                <td colspan="4" class="py-2">{{ $order->product->name }}</td>
                                <td class="py-2">&#8369;{{ number_format($order->product->price, 2) }}</td>
                                <td class="py-2">{{ $order->quantity }}</td>
                                <td class="py-2">
                                    &#8369;{{ number_format($order->product->price * $order->quantity, 2) }}</td>
                            </tr>
                        @endforeach

                        <tr class="">
                            <td colspan="6" class="text-right pr-2 py-2">TOTAL({{ $item->count() }} item):
                            </td>
                            <td>&#8369;{{ number_format(
                                $item->map(function ($item) {
                                        return $item->product->price * $item->quantity;
                                    })->sum(),
                                2,
                            ) }}
                            </td>

                        </tr>

                    @empty

                    @endforelse
                </tbody>
            </table>

        </div>
        <div class="flex space-x-5 justify-end items-end">
            <span class="font-medium">Total Payment:</span>
            <span class="font-bold text-2xl text-red-600">
                &#8369;{{ number_format(
                    $stores->map(function ($item) {
                            return $item->map(function ($item) {
                                    return $item->product->price * $item->quantity;
                                })->sum();
                        })->sum(),
                    2,
                ) }}</span>
        </div>
        <div class="flex justify-end">
            <x-button negative rounded class="font-bold w-64" label="PLACE ORDER" wire:click="placeOrder"
                spinner="placeOrder" />
        </div>
    </div>
</div>
