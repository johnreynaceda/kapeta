<div x-data="{ as: @entangle('register_as') }">
    <div class="max-w-xl text-center lg:text-left w-full">
        <div class="flex space-x-2  justify-start items-end">
            <p class="text-3xl font-bold md:text-6xl text-slate-900">
                <img src="{{ asset('images/kapetalogo.png') }}" class="h-20" alt="">
            </p>
            <h1 class="font-titan text-xl text-red-600">CREATE YOUR ACCOUNT</h1>
            {{-- <p class="mt-2 font-bold text-red-600">Sign In to your Account</p>
            <p>Don't have an account? <a class="hover:text-red-600 underline" href="{{ route('register') }}">Click
                    here!</a></p> --}}
        </div>
        <div class="flex flex-col items-center border-t border-main gap-3 mt-5  lg:flex-row">
            <div class="w-full mt-3">
                <x-native-select label="Register As" wire:model="register_as">
                    <option hidden selected>Select an Option</option>
                    <option value="1">Seller</option>
                    <option value="2">Customer</option>
                </x-native-select>
            </div>

        </div>
        <div class="mt-5 " x-show="as==1" x-cloak>
            <div class="grid grid-cols-2 gap-2">
                <x-input label="Name of Shop" wire:model="shop_name" placeholder="" />
                <x-input label="Phone Number" wire:model="shop_number" placeholder="" />
                <div class="col-span-2">
                    <x-input label="Description" wire:model="shop_description" placeholder="" />
                </div>
                <div class="col-span-2">
                    <x-input label="Address" wire:model="shop_address" placeholder="" />
                </div>
                <x-input label="Opening Hour" wire:model="shop_opening" placeholder="" />
                <x-input label="Closing Hour" wire:model="shop_closing" placeholder="" />
                <x-input label="Email" wire:model="shop_email" placeholder="" />
                <x-inputs.password label="Password" wire:model="shop_password" placeholder="" />
                <div>
                    <label for="">Profile Photo</label>
                    <input type="file" wire:model="shop_image" name="" id="">
                </div>
                <div>
                    <label for="">Banner Photo</label>
                    <input type="file" wire:model="shop_banner" name="" id="">
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <x-button label="REGISTER" wire:click="registerUser" negative right-icon="arrow-right" rounded />
            </div>
        </div>
        <div class="mt-5" x-show="as==2" x-cloak>
            <div class="grid grid-cols-2 gap-2">
                <x-input label="Name" wire:model="name" placeholder="" />
                <x-input label="Email" wire:model="email" placeholder="" />

                <div class="col-span-2">
                    <x-input label="Address" wire:model="address" placeholder="" />
                </div>

                <x-input label="Phone Number" wire:model="phone" placeholder="" />
                <x-inputs.password label="Password" wire:model="password" placeholder="" />
                <div>
                    <label for="">Profile Photo</label>
                    <input type="file" wire:model="image" name="image" id="">
                </div>

            </div>
            <div class="mt-4 flex justify-end">
                <x-button label="REGISTER" wire:click="registerUser" negative right-icon="arrow-right" rounded />
            </div>
        </div>
    </div>
</div>
