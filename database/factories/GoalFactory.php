<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\User;
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
            'currency_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            'target_amount' => $this->faker->numberBetween(-10000, 10000),
            'current_amount' => $this->faker->numberBetween(-10000, 10000),
            'deadline' => $this->faker->dateTimeBetween(now(), now()->addYears(3)),
        ];
    }
}
