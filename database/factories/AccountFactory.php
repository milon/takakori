<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'currency_id' => rand(1, 4),
            'name' => $this->faker->words(2, true),
            'type' => $this->faker->randomElement(['savings', 'checking', 'credit-card']),
            'balance' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
