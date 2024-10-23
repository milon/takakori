<?php

namespace Database\Factories;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Budget::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'category_id' => rand(1, 10),
            'currency_id' => rand(1, 4),
            'amount' => $this->faker->numberBetween(100, 1000),
            'start_date' => $this->faker->dateTimeBetween(now()->subYears(2), now()),
            'end_date' => $this->faker->dateTimeBetween(now()->subYears(1), now()->addYears(2)),
        ];
    }
}
