<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'Admnistrator'
        ]);

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id
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

        $role = Role::create([
            'name' => 'Seller'
        ]);

        $user = User::create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id
        ]);
    }
}
