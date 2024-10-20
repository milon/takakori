<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Investment;
use App\Models\User;

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
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'type' => $this->faker->word(),
            'purchase_date' => $this->faker->date(),
            'purchase_price' => $this->faker->numberBetween(-10000, 10000),
            'current_price' => $this->faker->numberBetween(-10000, 10000),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'currency_id' => $this->faker->randomNumber(),
        ];
    }
}
