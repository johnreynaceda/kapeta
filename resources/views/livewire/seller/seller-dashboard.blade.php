<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-5 xl:max-w-7xl">
        <p class="font-titan text-lg text-red-500">
            Hello/Welcome Barista! See what you've got today.
        </p>


        <div class="flex space-x-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-amber-900">
                <path
                    d="M21 13V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V13H2V11L3 6H21L22 11V13H21ZM5 13V19H19V13H5ZM6 14H14V17H6V14ZM3 3H21V5H3V3Z">
                </path>
            </svg>
            <span class="text-xl text-gray-700 font-titan uppercase pr-2">{{ $store_data->name }} </span> - <span
                class="flex items-center text-sm font-medium text-gray-600"><svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" class="h-4 w-4 fill-red-500">
                    <path
                        d="M11 17.9381C7.05369 17.446 4 14.0796 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.0796 16.9463 17.446 13 17.9381V20.0116C16.9463 20.1039 20 20.7351 20 21.5C20 22.3284 16.4183 23 12 23C7.58172 23 4 22.3284 4 21.5C4 20.7351 7.05369 20.1039 11 20.0116V17.9381ZM12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z">
                    </path>
                </svg> {{ $store_data->address }}</span>
        </div>
        <section class=" flex space-x-4 relative">
            <div class=" p-4 border py-3 rounded-lg w-64 relative overflow-hidden bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Completed Transaction</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-green-600">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11.0026 16L18.0737 8.92893L16.6595 7.51472L11.0026 13.1716L8.17421 10.3431L6.75999 11.7574L11.0026 16Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span
                        class="text-3xl font-bold text-gray-700">{{ \App\Models\Transaction::where('store_id', auth()->user()->store_id)->where('status', 1)->count() }}</span>
                </div>
                <div class="absolute -right-2 -bottom-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 w-20 fill-green-600 opacity-10">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11.0026 16L18.0737 8.92893L16.6595 7.51472L11.0026 13.1716L8.17421 10.3431L6.75999 11.7574L11.0026 16Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class=" p-4 border py-3 rounded-lg w-64 relative overflow-hidden bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Pending Orders</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-yellow-500">
                        <path
                            d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12H4C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.53614 4 7.33243 5.11383 5.86492 6.86543L8 9H2V3L4.44656 5.44648C6.28002 3.33509 8.9841 2 12 2ZM13 7L12.9998 11.585L16.2426 14.8284L14.8284 16.2426L10.9998 12.413L11 7H13Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span
                        class="text-3xl font-bold text-gray-700">{{ \App\Models\Transaction::where('store_id', auth()->user()->store_id)->where('status', 0)->count() }}</span>
                </div>
                <div class="absolute -right-2 -bottom-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 w-20 fill-yellow-500 opacity-10 ">
                        <path
                            d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12H4C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.53614 4 7.33243 5.11383 5.86492 6.86543L8 9H2V3L4.44656 5.44648C6.28002 3.33509 8.9841 2 12 2ZM13 7L12.9998 11.585L16.2426 14.8284L14.8284 16.2426L10.9998 12.413L11 7H13Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class=" p-4 border py-3 rounded-lg w-64 relative overflow-hidden bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Cancelled Orders</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-red-600 h-5 w-5">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 10.5858L9.17157 7.75736L7.75736 9.17157L10.5858 12L7.75736 14.8284L9.17157 16.2426L12 13.4142L14.8284 16.2426L16.2426 14.8284L13.4142 12L16.2426 9.17157L14.8284 7.75736L12 10.5858Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span
                        class="text-3xl font-bold text-gray-700">{{ \App\Models\Transaction::where('store_id', auth()->user()->store_id)->where('status', 2)->count() }}</span>
                </div>
                <div class="absolute -right-2 -bottom-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="fill-red-600 h-20 w-20 opacity-10">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 10.5858L9.17157 7.75736L7.75736 9.17157L10.5858 12L7.75736 14.8284L9.17157 16.2426L12 13.4142L14.8284 16.2426L16.2426 14.8284L13.4142 12L16.2426 9.17157L14.8284 7.75736L12 10.5858Z">
                        </path>
                    </svg>
                </div>
            </div>
        </section>
        <section class=" flex space-x-4 relative">
            <div class=" p-4 border py-3 rounded-lg w-64 relative overflow-hidden bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Products Purchased</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-green-600">
                        <path
                            d="M6.00488 9H19.9433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V9ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span
                        class="text-3xl font-bold text-gray-700">{{ \App\Models\Order::where('store_id', auth()->user()->store_id)->where('status', 1)->count() }}</span>
                </div>
                <div class="absolute -right-2 -bottom-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 w-20 opacity-10 fill-green-600">
                        <path
                            d="M6.00488 9H19.9433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V9ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class=" p-4 border py-3 rounded-lg w-64 relative overflow-hidden bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Total Sales</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-red-600">
                        <path
                            d="M22.0049 6H15.0049C11.6912 6 9.00488 8.68629 9.00488 12C9.00488 15.3137 11.6912 18 15.0049 18H22.0049V20C22.0049 20.5523 21.5572 21 21.0049 21H3.00488C2.4526 21 2.00488 20.5523 2.00488 20V4C2.00488 3.44772 2.4526 3 3.00488 3H21.0049C21.5572 3 22.0049 3.44772 22.0049 4V6ZM15.0049 8H23.0049V16H15.0049C12.7957 16 11.0049 14.2091 11.0049 12C11.0049 9.79086 12.7957 8 15.0049 8ZM15.0049 11V13H18.0049V11H15.0049Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span
                        class="text-2xl font-bold text-gray-700">&#8369;{{ number_format(\App\Models\Transaction::where('store_id', auth()->user()->store_id)->where('status', 1)->sum('total_amount'),2) }}</span>
                </div>
                <div class="absolute -right-2 -bottom-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 w-20 opacity-10 fill-red-600">
                        <path
                            d="M22.0049 6H15.0049C11.6912 6 9.00488 8.68629 9.00488 12C9.00488 15.3137 11.6912 18 15.0049 18H22.0049V20C22.0049 20.5523 21.5572 21 21.0049 21H3.00488C2.4526 21 2.00488 20.5523 2.00488 20V4C2.00488 3.44772 2.4526 3 3.00488 3H21.0049C21.5572 3 22.0049 3.44772 22.0049 4V6ZM15.0049 8H23.0049V16H15.0049C12.7957 16 11.0049 14.2091 11.0049 12C11.0049 9.79086 12.7957 8 15.0049 8ZM15.0049 11V13H18.0049V11H15.0049Z">
                        </path>
                    </svg>
                </div>
            </div>
        </section>

        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-red-600">
                    My Products
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
                @forelse ($products as $product)
                    <div
                        class=" h-56 group relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-red-600 active:opacity-75 active:ring-indigo-500/25">
                        <img class="object-cover" src="{{ Storage::url($product->image_path) }}" />
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
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-sm font-semibold text-slate-400">
                                        &#8369;{{ number_format($product->price, 2) }}</p>
                                </div>
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

        </section>
        <section class="space-y-6">
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
                        <img class="object-cover" src="{{ Storage::url($product->image_path) }}" />
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
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-sm font-semibold text-slate-400">
                                        &#8369;{{ number_format($product->price, 2) }}</p>
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
    </div>
    <x-modal wire:model.defer="sale_modal">

        <x-card title="Sales">

            @foreach ($total_sales as $item)
                <p>{{ \Carbon\Carbon::parse($item->date)->format('F d, Y') }} -
                    &#8369;{{ number_format($item->total_sales, 2) }}</p>
            @endforeach



            <x-slot name="footer">

                <div class="flex justify-end gap-x-4">

                    <x-button rounded label="Cancel" x-on:click="close" />

                </div>

            </x-slot>

        </x-card>

    </x-modal>
</div>
