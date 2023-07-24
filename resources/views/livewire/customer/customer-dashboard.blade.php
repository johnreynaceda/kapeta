<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
        <p class="font-titan text-lg text-red-500">
            Hello/Welcome, Mangape diay ta!
        </p>
        <header class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-red-600">
                <path
                    d="M21 13V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V13H2V11L3 6H21L22 11V13H21ZM5 13V19H19V13H5ZM6 14H14V17H6V14ZM3 3H21V5H3V3Z">
                </path>
            </svg>
            <span class="text-red-600 font-titan text-xl">ALL SHOPS</span>
        </header>
        <div class="mt-4 grid grid-cols-1 xl:grid-cols-2 gap-4">
            @forelse ($stores as $store)
                <a href="{{ route('customer.shop', ['name' => $store->name . '' . $store->id]) }}">
                    <div class="border-x pb-16 border-b-2 shadow rounded-xl overflow-hidden">
                        <div class="h-24 relative rounded-t-xl">
                            <img src="{{ Storage::url($store->background_path) }}" alt=""
                                class="h-full w-full  object-cover rounded-t-xl">
                            <div class="absolute bg-gradient-to-t from-gray-600  top-0 w-full h-full"></div>
                        </div>
                        <div class="div -my-6 mx-6 flex space-x-2 items-end relative">
                            <img src="{{ $store->profile_path == null ? 'https://ui-avatars.com/api/?name=' . $store->name . '&color=7F9CF5&background=EBF4FF' : asset('storage/' . $store->profile_path) }}"
                                alt=""
                                class="h-24 w-24 bg-blue-400 ring-4 ring-red-600 rounded-full object-cover">
                            <div class="flex flex-col">
                                <span class="font-titan uppercase text-gray-600 text-xl">{{ $store->name }}</span>
                                <p class="w-96 ml-3 truncate text-sm text-gray-700">{{$store->description}}</p>
                                <div class="flex items-center space-x-2">
                                    <span class="flex items-center truncate text-sm font-medium text-gray-600"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="h-4 w-4 fill-red-500">
                                            <path
                                                d="M11 17.9381C7.05369 17.446 4 14.0796 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.0796 16.9463 17.446 13 17.9381V20.0116C16.9463 20.1039 20 20.7351 20 21.5C20 22.3284 16.4183 23 12 23C7.58172 23 4 22.3284 4 21.5C4 20.7351 7.05369 20.1039 11 20.0116V17.9381ZM12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z">
                                            </path>
                                        </svg> {{ $store->address }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            @empty
            @endforelse

        </div>
    </div>
</div>
