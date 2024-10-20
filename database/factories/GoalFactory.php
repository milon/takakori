<?php

namespace Database\Factories;

use App\Models\Goal;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Goal::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'currency_id' => rand(1, 4),
            'name' => $this->faker->words(2, true),
            'target_amount' => $this->faker->numberBetween(10, 10000),
            'current_amount' => $this->faker->numberBetween(100, 9000),
            'deadline' => $this->faker->dateTimeBetween(now(), now()->addYears(3)),
        ];
    }
}
