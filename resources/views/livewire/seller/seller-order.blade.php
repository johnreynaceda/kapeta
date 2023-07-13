<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
        <header class="font-titan text-xl text-red-600 flex justify-between items-center">
            <span>ORDERS</span>
        </header>

        <table id="example" class="table-auto mt-5" style="width:100%">
            <thead class="font-normal">
                <tr>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">ORDER NO.
                    </th>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">CUSTOMER</th>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">
                    </th>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">
                    </th>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">AMOUNT</th>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">STATUS</th>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">DATE</th>
                    <th class=" text-left px-2 text-sm font-medium text-gray-500 py-2">
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($transactions as $item)
                    <tr class="border-b">
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                            {{ $item->order_number }}</td>
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                            {{ $item->user->name }}</td>
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                        </td>
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                        </td>
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                            &#8369;{{ number_format($item->total_amount, 2) }}</td>
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                            @switch($item->status)
                                @case(0)
                                    <x-badge label="PENDING" amber />
                                @break

                                @case(1)
                                    <x-badge label="COMPLETED" positive />
                                @break

                                @case(2)
                                    <x-badge label="CANCELLED" gray />
                                @break

                                @default
                            @endswitch
                        </td>
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</td>
                        <td class="text-left px-2 text-sm font-medium text-gray-500 py-2">
                            <x-button label="MANAGE" xs rounded dark right-icon="arrow-right"
                                href="{{ route('seller.order-manage', ['id' => $item->id]) }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
