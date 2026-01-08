<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Appetizers', 'Main Courses', 'Desserts', 'Beverages', 'Soups', 'Salads'];

        return [
            // Use unique to satisfy categories.name unique index; pool (6) > seeds (5)
            'name' => $this->faker->unique()->randomElement($categories),
            'description' => $this->faker->sentence(),
        ];
    }
}
