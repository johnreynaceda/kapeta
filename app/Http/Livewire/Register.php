<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Store;
use App\Models\CustomerDetail;
use Livewire\WithFileUploads;
use DB;

class Register extends Component
{
    use WithFileUploads;
    public $register_as;

    //seller
    public $shop_name, $shop_number, $shop_address, $shop_description, $shop_image, $shop_banner, $shop_email, $shop_password, $shop_opening, $shop_closing;

    //customer
    public $name, $email, $password, $phone, $address, $image;
    public function render()
    {
        return view('livewire.register');
    }

    public function registerUser()
    {
        if ($this->register_as == 1) {
            DB::beginTransaction();
            $this->validate([
                'shop_name' => 'required',
                'shop_number' => 'required',
                'shop_address' => 'required',
                'shop_description' => 'required',
                'shop_image' => 'required|image',
                'shop_banner' => 'required|image',
                'shop_email' => 'required|email|unique:users,email',
                'shop_password' => 'required',
                'shop_opening' => 'required',
                'shop_closing' => 'required',
            ]);
            $shop = Store::create([
                'name' => $this->shop_name,
                'description' => $this->shop_description,
                'address' => $this->shop_address,
                'opening_hour' => $this->shop_opening,
                'closing_hour' => $this->shop_closing,
                'phone_number' => $this->shop_number,
                'profile_path' => $this->shop_image->store('profile', 'public'),
                'background_path' => $this->shop_banner->store('banner', 'public'),
            ]);
            $user = User::create([
                'name' => $this->shop_name,
                'email' => $this->shop_email,
                'password' => bcrypt($this->shop_password),
                'role_id' => 1,
                'store_id' => $shop->id,
            ]);
            DB::commit();
            auth()->loginUsingId($user->id);
            return redirect()->route('dashboard');
        } else {
            DB::beginTransaction();
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'image' => 'required|image',
            ]);
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role_id' => 2,
            ]);

            CustomerDetail::create([
                'user_id' => $user->id,
                'address' => $this->address,
                'phone_number' => $this->phone,
                'profile_path' => $this->image->store('profile', 'public'),
            ]);
            DB::commit();
            auth()->loginUsingId($user->id);
            return redirect()->route('dashboard');
        }
    }
}