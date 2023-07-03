<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Store;
use App\Models\CustomerDetail;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $role = Role::create([
            'name' => 'Seller'
        ]);

        $store = Store::create([
            'name' => 'Brew Cafe',
            'description' => 'Bew Cafe is a coffee shop that sells coffee and other beverages.',
            'address' => 'Jl. Raya Kedung Baruk No.98, Kedung Baruk, Kec. Rungkut, Kota SBY, Jawa Timur 60298',
            'opening_hour' => '08:00AM',
            'closing_hour' => '10:00PM',
            'phone_number' => '081234567890',
        ]);

        $user = User::create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'store_id' => $store->id
        ]);

        $store = Store::create([
            'name' => 'Coffee Station',
            'description' => 'Bew Cafe is a coffee shop that sells coffee and other beverages.',
            'address' => 'Jl. Raya Kedung Baruk No.98, Kedung Baruk, Kec. Rungkut, Kota SBY, Jawa Timur 60298',
            'opening_hour' => '08:00AM',
            'closing_hour' => '10:00PM',
            'phone_number' => '081234567890',
        ]);

        $user = User::create([
            'name' => 'Seller1',
            'email' => 'selle1r@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'store_id' => $store->id
        ]);

        $role = Role::create([
            'name' => 'Customer'
        ]);

        $user = User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id
        ]);

        CustomerDetail::create([
            'user_id' => $user->id,
            'address' => 'Jl. Raya Kedung Baruk No.98, Kedung Baruk, Kec. Rungkut, Kota SBY, Jawa Timur 60298',
            'phone_number' => '081234567890',
        ]);
    }
}
