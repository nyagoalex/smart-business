<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'price' => $this->faker->numberBetween($min = 10, $max = 300),
            'rating' => $this->faker->numberBetween($min = 1, $max = 5),
            'description' => $this->faker->paragraph(),
            'details' => [$this->detailsItem(), $this->detailsItem(), $this->detailsItem()],
            'colors' => ['bg-gray-700', 'bg-teal-700', 'bg-yellow-700'],
        ];
    }

    private function detailsItem()
    {
        return [
            'name' => $this->faker->word,
            'items' => [$this->faker->sentence(3), $this->faker->sentence(4)]
        ];
    }
}

