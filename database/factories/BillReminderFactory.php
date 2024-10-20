<?php

namespace Database\Factories;

use App\Models\BillReminder;
use App\Models\Category;
use App\Models\Currency;
use App\Models\User;
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
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'currency_id' => Currency::factory(),
            'name' => $this->faker->name(),
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'due_date' => $this->faker->date(),
            'frequency' => $this->faker->word(),
            'is_paid' => $this->faker->boolean(),
        ];
    }
}
