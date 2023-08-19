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
            'category' => fake()->randomElement(['salary', 'business', 'allowance', 'pension', 'savings', 'food and drink', 'electric bill', 'water bill', 'rent', 'transportation', 'study', 'beauty', 'health', 'entertainment', 'debt payments', 'personal care', 'gifts and donations', 'insurance', 'miscellaneous', 'utilities', 'pets', 'subscriptions', 'home improvement', 'vacation and travel', 'clothing', 'electronic and gadgets']),
            'amount' => fake()->randomNumber(6, false),
            'date' => fake()->date('Y_m_d'),
            'note' => fake()->realText(),
            'user_id' => User::factory()
        ];
    }
}
