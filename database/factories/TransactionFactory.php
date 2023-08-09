<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['income', 'expense']),
            'category' => fake()->randomElement(['food & drink', 'electric bill', 'water bill', 'rent', 'transportation', 'beauty', 'education', 'clothing', 'health']),
            'amount' => fake()->randomNumber(6, false),
            'date' => fake()->date('Y_m_d'),
            'user_id' => User::factory()
        ];
    }
}
