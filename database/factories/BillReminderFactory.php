<?php

namespace Database\Factories;

use App\Enums\BillingFrequency;
use App\Models\BillReminder;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillReminderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BillReminder::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 25),
            'category_id' => rand(1, 10),
            'currency_id' => rand(1, 4),
            'name' => $this->faker->name(),
            'amount' => $this->faker->numberBetween(1, 10000),
            'due_date' => $this->faker->dateTimeBetween(now()->subYears(2), now()->addYears(3)),
            'frequency' => $this->faker->randomElement(array_column(BillingFrequency::cases(), 'value')),
            'is_paid' => $this->faker->boolean(),
        ];
    }
}
