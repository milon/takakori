<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Debt;
use App\Models\User;
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
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'type' => $this->faker->word(),
            'interest_rate' => $this->faker->randomFloat(0, 0, 9999999999.),
            'initial_amount' => $this->faker->numberBetween(-10000, 10000),
            'current_balance' => $this->faker->numberBetween(-10000, 10000),
            'min_payment' => $this->faker->numberBetween(-10000, 10000),
            'due_date' => $this->faker->date(),
            'currency_id' => Currency::factory(),
        ];
    }
}
