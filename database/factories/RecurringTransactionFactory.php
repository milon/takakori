<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\RecurringTransaction;
use App\Models\User;

class RecurringTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecurringTransaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'account_id' => ::factory(),
            'category_id' => ::factory(),
            'currency_id' => ::factory(),
            'transaction_type' => $this->faker->word(),
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'frequency' => $this->faker->word(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
