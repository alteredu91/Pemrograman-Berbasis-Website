<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'partner']);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $admin->roles()->attach($adminRole);

        User::factory(20)->create()->each(function ($user) {
            $user->roles()->attach(Role::where('name', 'user')->first());
        });

        Store::factory(30)->create()->each(function ($store) {
            Product::factory(rand(5, 10))->create([
                'store_id' => $store->id
            ]);
        });
    }
}