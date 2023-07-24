<div>
    <div>
        <canvas id="barChart" width="400" height="200"></canvas>

    </div>

    <section class="space-y-6 mt-20">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-red-600">
                🔥🔥HOT SALES🔥🔥
            </h2>
            <a href="javascript:void(0)"
                class="group flex items-center space-x-1 text-sm text-slate-400 transition hover:text-red-600 active:text-slate-400">
                {{-- <span>See All</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="h-5 w-5 opacity-50 transition ease-out group-hover:opacity-100 group-active:translate-x-2">
                    <path fill-rule="evenodd"
                        d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                        clip-rule="evenodd" />
                </svg> --}}
            </a>
        </div>
        <nav class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
            <!-- Movie -->
            @forelse ($hot_sales as $product)
                <div
                    class=" h-56 group relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-red-600 active:opacity-75 active:ring-indigo-500/25">
                    <img class="object-cover"
                        src="{{ Storage::url(\App\Models\Product::where('id', $product->id)->first()->image_path) }}" />
                    <div
                        class="absolute inset-0 flex flex-col justify-between bg-gradient-to-b from-transparent via-black/75 to-black">
                        <div class="flex items-center justify-start space-x-2 p-4">
                            <div
                                class="flex items-center space-x-1 rounded-lg bg-slate-800/50 px-1.5 py-1 font-medium fill-white hover:fill-red-500 text-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                                    <path
                                        d="M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C9.5 20 2 16 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-end justify-between space-x-2 px-4 py-5">
                            <div class="space-y-1">
                                <h3 class="text-xl font-semibold text-white">
                                    {{ \App\Models\Product::where('id', $product->id)->first()->name }}
                                </h3>
                                <p class="text-sm font-semibold text-slate-400">
                                    &#8369;{{ number_format(\App\Models\Product::where('id', $product->id)->first()->price, 2) }}
                                </p>
                            </div>
                            {{ $product->totalQuantity }}
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 fill-white transition group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white group-active:scale-100">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 translate-x-0.5"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M6.00488 9H19.9433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V9ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <h1 class="  text-gray-600">No Products Yet!</h1>
                </div>
            @endforelse
            <!-- END Movie -->

        </nav>

        {{-- @foreach ($hot_sales as $item)
            {{$item->name}} - {{$item->orders->sum('quantity')}}
        @endforeach --}}
    </section>

    <script>
        // Get data from PHP
        var productLabels = @json($productLabels);
        var totalSoldData = @json($totalSoldData);

        $backgroundColor = ['#546FC6', '#91CD77', '#FBC958', '1B1B1B', 'DC2626'];
        // Create a bar chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productLabels,
                datasets: [{
                    label: 'Total Sold Products',
                    data: totalSoldData,
                    backgroundColor: $backgroundColor,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</div>
