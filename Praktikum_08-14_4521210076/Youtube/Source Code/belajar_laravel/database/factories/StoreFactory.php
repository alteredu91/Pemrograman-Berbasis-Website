<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'slug' => Str::slug($this->faker->unique()->company()),
            'description' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}