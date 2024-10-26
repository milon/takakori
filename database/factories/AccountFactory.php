<?php

namespace Database\Factories;

use App\Enums\AccountType;
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
            'number' => $this->faker->randomNumber(8, true),
            'institute' => $this->faker->words(3, true),
            'type' => $this->faker->randomElement(array_column(AccountType::cases(), 'value')),
            'balance' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
