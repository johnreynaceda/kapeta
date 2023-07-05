<div>
    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-10 xl:max-w-7xl">
        <header class="text-xl font-titan text-red-600">MY PROFILE</header>
        <div class="flex space-x-5 items-start justify-start">
            <div class="w-64">
                <div class="bg-white p-5 border rounded-lg">
                    <div class="flex justify-center  items-center">
                        <div class="h-20 w-20 relative">
                            @if ($photo)
                                <img class="h-20 w-20 ring-2 ring-red-600 object-cover rounded-full"
                                    src="{{ $photo->temporaryUrl() }}" />
                            @else
                                <img class="h-20 w-20 ring-2 object-cover ring-red-600 rounded-full"
                                    src="{{ Storage::url(auth()->user()->customerDetail->profile_path) }}" />
                            @endif
                            <div class="absolute bottom-0 -right-1">
                                <x-button.circle wire:click="$set('upload_profile', true)" sm positive
                                    icon="pencil-alt" />
                            </div>
                        </div>
                    </div>
                    @if ($upload_profile)
                        <input type="file" wire:model="photo" class="mt-2">
                    @endif
                    <div class="mt-3 text-center">
                        {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <div class="p-5">
                    <header class="font-bold text-red-600">PERSONAL INFORMATION</header>
                    <div class="mt-3 grid grid-cols-2 gap-5">
                        <x-input wire:model="name" label="Name" placeholder="{{ auth()->user()->name }}" />
                        <x-input wire:model="email" label="Email" placeholder="{{ auth()->user()->email }}" />
                        <x-input wire:model="phone_number" label="Contact Number"
                            placeholder="{{ auth()->user()->customerDetail->phone_number }}" />
                        <x-inputs.password wire:model="password" label="Password" />
                        <div class="col-span-2">
                            <x-input wire:model="address" label="Address"
                                placeholder="{{ auth()->user()->customerDetail->address }}" />
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <x-button negative class="font-bold w-64 uppercase" wire:click="updateProfile"
                            spinner="updateProfile" rounded label="Update Profile" right-icon="arrow-right" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
