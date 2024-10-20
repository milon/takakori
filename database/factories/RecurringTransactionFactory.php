<?php

namespace Database\Factories;

use App\Enums\BillingFrequency;
use App\Models\RecurringTransaction;
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
            'category_id' => rand(1, 10),
            'currency_id' => rand(1, 4),
            'amount' => $this->faker->numberBetween(100, 1000),
            'frequency' => $this->faker->randomElement(array_column(BillingFrequency::cases(), 'value')),
            'start_date' => $this->faker->dateTimeBetween(now()->subYears(2), now()->addYears(3)),
            'end_date' => $this->faker->dateTimeBetween(now()->subYears(1), now()->addYears(5)),
        ];
    }
}
