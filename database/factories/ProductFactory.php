<?php

namespace Database\Factories;

use App\Models\ProductCategoryTest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $datas = ProductCategoryTest::all();
        $productCategoryIds = $datas->pluck('id')->toArray();

        $imageUrl = "https://picsum.photos/seed/". fake()->randomNumber(5)."/640/480";
        $imageName = "images_".uniqid().".jpg";
        file_put_contents(public_path('images/'.$imageName), file_get_contents($imageUrl));

        return [
            'name' => fake()->name(),
            'price' => fake()->randomFloat(2, 0, 1000),
            'quantity' => fake()->numberBetween(0, 100),
            'shipping' => fake()->numberBetween(0, 50),
            'weight' => fake()->randomFloat(2, 0.1, 10),
            'description' => fake()->paragraph(),
            'main_image' => $imageName,
            'status' => fake()->boolean(),
            'product_category_id' => fake()->randomElement($productCategoryIds),
        ];
    }
}
