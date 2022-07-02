<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count = Product::count() + 1;
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name,
            'book_id' => 'BK-' . $count,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(10000, 100000),
            'category_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(300, 300),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
