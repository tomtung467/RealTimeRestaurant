<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    protected $model = Table::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'table_number' => $this->faker->unique()->numberBetween(1, 50),
            'qr_code_token' => Str::uuid()->toString(),
            'status' => $this->faker->randomElement(['empty', 'occupied']),
        ];
    }
}
