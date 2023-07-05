<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use Livewire\WithFileUploads;

class SellerProfile extends Component
{
    use WithFileUploads;
    public $photo;
    public $banner;
    public $upload_profile = false;
    public $upload_banner = false;

    public $name, $email, $password, $address, $phone_number, $description, $opening_hour, $closing_hour;
    public function updatedBanner()
    {
        $this->upload_banner = false;
    }
    public function render()
    {
        return view('livewire.seller.seller-profile');
    }

    public function updateProfile()
    {
        auth()->user()->update([
            'name' => $this->name == null ? auth()->user()->name : $this->name,
            'email' => $this->email == null ? auth()->user()->email : $this->email,
            'password' => $this->password == null ? auth()->user()->password : bcrypt($this->password),
        ]);

        auth()->user()->store->update([
            'address' => $this->address == null ? auth()->user()->store->address : $this->address,
            'phone_number' => $this->phone_number == null ? auth()->user()->store->phone_number : $this->phone_number,
            'profile_path' => $this->photo == null ? auth()->user()->store->profile_path : $this->photo->store('profile', 'public'),
            'description' => $this->description == null ? auth()->user()->store->description : $this->description,
            'opening_hour' => $this->opening_hour == null ? auth()->user()->store->opening_hour : $this->opening_hour,
            'closing_hour' => $this->closing_hour == null ? auth()->user()->store->closing_hour : $this->closing_hour,
            'background_path' => $this->banner == null ? auth()->user()->store->background_path : $this->banner->store('banner', 'public'),

        ]);

        return redirect()->route('seller.profile');
    }
}