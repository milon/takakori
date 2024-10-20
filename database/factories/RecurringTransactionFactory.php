<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
use App\Models\RecurringTransaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => rand(1, 20),
            'account_id' => rand(1, 20),
            'category_id' => rand(1, 20),
            'currency_id' => rand(1, 4),
            'transaction_type' => $this->faker->word(),
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'frequency' => $this->faker->word(),
            'start_date' => $this->faker->dateTimeBetween(now()->subYears(2), now()->addYears(3)),
            'end_date' => $this->faker->dateTimeBetween(now()->subYears(1), now()->addYears(5)),
        ];
    }
}
