<div>

    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-5 xl:max-w-7xl">
        <header>
            <span class="font-titan text-xl text-red-600">MY ORDERS</span>
        </header>
        <div class="mt-4">
            @forelse ($transactions as $item)
                <div class="bg-white border p-5">
                    <header class="text-bold"> ORDER: {{ $item->store_id }}</header>
                    @foreach ($item->orders as $order)
                        <div class="mt-5 border p-5">
                            sdsd
                        </div>
                    @endforeach
                </div>

            @empty
            @endforelse
        </div>
    </div>
</div>
