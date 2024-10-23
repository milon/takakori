<?php

namespace Database\Factories;

use App\Enums\DebtType;
use App\Models\Debt;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebtFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Debt::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'name' => $this->faker->words(2, true),
            'type' => $this->faker->randomElement(array_column(DebtType::cases(), 'value')),
            'interest_rate' => $this->faker->randomFloat(0, 0, 10),
            'initial_amount' => $this->faker->numberBetween(-10000, 10000),
            'current_balance' => $this->faker->numberBetween(-10000, 10000),
            'min_payment' => $this->faker->numberBetween(-10000, 10000),
            'due_date' => $this->faker->dateTimeBetween(now()->subYears(2), now()->addYears(3)),
            'currency_id' => rand(1, 4),
        ];
    }
}
