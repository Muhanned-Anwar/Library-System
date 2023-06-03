<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'author' => $this->faker->name,
            'release_date' => $this->faker->date,
            'description' => $this->faker->paragraph,
            'classification' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
