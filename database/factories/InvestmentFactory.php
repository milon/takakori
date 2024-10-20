<?php

namespace Database\Factories;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'name' => $this->faker->name(),
            'type' => $this->faker->word(),
            'purchase_date' => $this->faker->dateTimeBetween(now()->subYears(2), now()->addYears(3)),
            'purchase_price' => $this->faker->numberBetween(-10000, 10000),
            'current_price' => $this->faker->numberBetween(-10000, 10000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'currency_id' => rand(1, 4),
        ];
    }
}
