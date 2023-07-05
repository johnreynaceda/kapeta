<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
        <div>
            <div class="border-x pb-10 border-b-2 shadow rounded-xl overflow-hidden">
                <div class="h-40 relative rounded-t-xl">
                    <img src="{{ Storage::url($shop->background_path) }}" alt=""
                        class="h-full w-full  object-cover rounded-t-xl">
                    <div class="absolute bg-gradient-to-t from-gray-600  top-0 w-full h-full"></div>
                </div>
                <div class="div -my-10 mx-6 flex space-x-4 items-end relative">
                    <img src="{{ $shop->profile_path == null ? 'https://ui-avatars.com/api/?name=' . $shop->name . '&color=7F9CF5&background=EBF4FF' : asset('storage/' . $shop->profile_path) }}"
                        alt="" class="h-24 w-24 bg-blue-400 ring-4 ring-red-600 rounded-full object-cover">
                    <div class="flex flex-col">
                        <span class="font-titan uppercase text-gray-600 text-xl">{{ $shop->name }}</span>
                        <div class="flex items-center space-x-2">
                            <span class="flex items-center truncate text-sm font-medium text-gray-600"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 fill-red-500">
                                    <path
                                        d="M11 17.9381C7.05369 17.446 4 14.0796 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.0796 16.9463 17.446 13 17.9381V20.0116C16.9463 20.1039 20 20.7351 20 21.5C20 22.3284 16.4183 23 12 23C7.58172 23 4 22.3284 4 21.5C4 20.7351 7.05369 20.1039 11 20.0116V17.9381ZM12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z">
                                    </path>
                                </svg> {{ $shop->address }}</span>

                        </div>

                    </div>

                </div>
                <div class=" mt-20 mx-6">
                    <div class="flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-red-600">
                            <path
                                d="M6 4H4V2H20V4H18V6C18 7.61543 17.1838 8.91468 16.1561 9.97667C15.4532 10.703 14.598 11.372 13.7309 12C14.598 12.628 15.4532 13.297 16.1561 14.0233C17.1838 15.0853 18 16.3846 18 18V20H20V22H4V20H6V18C6 16.3846 6.81616 15.0853 7.8439 14.0233C8.54682 13.297 9.40202 12.628 10.2691 12C9.40202 11.372 8.54682 10.703 7.8439 9.97667C6.81616 8.91468 6 7.61543 6 6V4ZM8 4V6C8 6.68514 8.26026 7.33499 8.77131 8H15.2287C15.7397 7.33499 16 6.68514 16 6V4H8ZM12 13.2219C10.9548 13.9602 10.008 14.663 9.2811 15.4142C9.09008 15.6116 8.92007 15.8064 8.77131 16H15.2287C15.0799 15.8064 14.9099 15.6116 14.7189 15.4142C13.992 14.663 13.0452 13.9602 12 13.2219Z">
                            </path>
                        </svg>
                        <span class="font-bold text-gray-600">{{ $shop->opening_hour }} -
                            {{ $shop->closing_hour }}</span>
                    </div>
                    <div class="flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-red-600">
                            <path
                                d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z">
                            </path>
                        </svg>
                        <span class="font-bold text-gray-600">{{ $shop->phone_number }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <header class="font-bold text-xl text-red-600 flex justify-between items-center">
                <span>PRODUCTS</span>

            </header>
            <div class="mt-5 grid grid-cols-4 gap-5">
                @forelse ($products as $key => $product)
                    <div wire:key="{{ $key }}" wire:click="addToCart({{ $product->id }})"
                        class=" h-56 cursor-pointer group relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-red-600 active:opacity-75 active:ring-indigo-500/25">
                        <img class="object-cover h-full w-full" src="{{ Storage::url($product->image_path) }}" />
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
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="hi-mini hi-play h-5 w-5 translate-x-0.5">
                    <path
                        d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                </svg> --}}
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
                    <div class="col-span-4 flex justify-start">
                        <span>No Products Available!</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
</div>
