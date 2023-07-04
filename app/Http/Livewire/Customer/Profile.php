<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithFileUploads;


class Profile extends Component
{
    use WithFileUploads;
    public $upload_profile = false;
    public $photo;
    public $name, $email, $password, $address, $phone_number;
    public function render()
    {
        return view('livewire.customer.profile');
    }

    public function updateProfile()
    {
        auth()->user()->update([
            'name' => $this->name == null ? auth()->user()->name : $this->name,
            'email' => $this->email == null ? auth()->user()->email : $this->email,
            'password' => $this->password == null ? auth()->user()->password : bcrypt($this->password),
        ]);

        auth()->user()->customerDetail->update([
            'address' => $this->address == null ? auth()->user()->customerDetail->address : $this->address,
            'phone_number' => $this->phone_number == null ? auth()->user()->customerDetail->phone_number : $this->phone_number,
            'profile_path' => $this->photo == null ? auth()->user()->customerDetail->profile_path : $this->photo->store('profile', 'public'),
        ]);

        return redirect()->route('customer.profile');
    }
}