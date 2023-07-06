<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-5 xl:max-w-7xl">
        <header>
            <span class="font-titan text-xl text-red-600">LOCATE SHOPS</span>
        </header>
        <div>
            <form method="POST">
                @if ($stores->count() >= 5)
                    <x-native-select label="Shops" wire:model="get_shop">
                        <option>Select an Option</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach

                    </x-native-select>
                @else
                    <div class="flex items-center space-x-2">
                        @foreach ($stores as $store)
                            <div wire:click="shop({{ $store->id }})"
                                class="{{ $store_id == $store->id ? 'border-red-600 fill-red-600 text-red-600' : '' }} flex space-x-1 cursor-pointer hover:border-red-600 items-center rounded-full border px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4">
                                    <path
                                        d="M21 13V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V13H2V11L3 6H21L22 11V13H21ZM5 13V19H19V13H5ZM6 14H14V17H6V14ZM3 3H21V5H3V3Z">
                                    </path>
                                </svg>
                                <span>{{ $store->name }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
                <iframe width="100%" height="500" class="mt-5"
                    src="https://maps.google.com/maps?q={{ $store_address }}}&output=embed"></iframe>

            </form>

        </div>
    </div>
