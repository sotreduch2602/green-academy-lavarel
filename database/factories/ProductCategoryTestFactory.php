<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductCategoryTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();


        return [
            'name'=> $name,
            'slug' => Str::slug($name),
            'status' => fake()->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
