<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-5 xl:max-w-7xl">
        <header class="text-xl text-red-600 font-titan">ORDER #: {{ $transactions->order_number }}</header>
        <div class="flex space-x-5">
            <div class="flex-1">
                <div>
                    <table id="example" class="table-auto mt-5" style="width:100%">
                        <thead class="font-normal">
                            <tr>
                                <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">PRODUCTS ORDERED
                                </th>
                                <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">
                                </th>
                                <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">
                                </th>
                                <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">AMOUNT</th>
                                <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">QUANTITY</th>
                                <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">SUBTOTAL</th>

                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($orders as $item)
                                <tr class="border-b">
                                    <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                                        <div class="flex space-x-2 items-center">
                                            <img src="{{ Storage::url($item->product->image_path) }}"
                                                class="h-12 rounded-lg object-cover w-12" alt="">
                                            <span
                                                class="uppercase font-bold text-lg text-red-600">{{ $item->product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                                    </td>
                                    <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                                    </td>
                                    <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                                        &#8369;{{ number_format($item->product->price, 2) }}
                                    </td>
                                    <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                                        &#8369;{{ number_format($item->product->price * $item->quantity, 2) }}
                                    </td>

                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
                                    <div class="flex justify-end text-red-600  font-medium">
                                        TOTAL:
                                        &#8369;{{ number_format($orders->map(
                                            function ($item) {
                                                return $item->product->price * $item->quantity;
                                            }
                                        )->sum(), 2
                                        ) }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-72">
                <div class="border p-4 rounded-lg">
                    <x-native-select label="Order Status" wire:model="status">
                        <option selected hidden>Select an option</option>
                        <option value="0">Pending</option>
                        <option value="1">Completed</option>
                        <option value="2">Cancelled</option>
                    </x-native-select>
                    <div class="mt-3">
                        <x-button label="UPDATE" wire:click="updateOrder" spinner="updateOrder" class="w-full font-bold"
                            sm negative rounded />
                    </div>
                </div>
                <div class="mt-4 border rounded-lg p-4">
                    <header class="font-bold text-red-600">CUSTOMER DETAILS</header>
                    <div class="mt-3">
                        <h1>Customer: {{ $customer->user->name }}</h1>
                        <h1>Phone Number: {{ $customer->user->customerDetail->phone_number }}</h1>
                        <h1>Email: {{ $customer->user->email }}</h1>
                        <p>Address: {{ $customer->user->customerDetail->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
