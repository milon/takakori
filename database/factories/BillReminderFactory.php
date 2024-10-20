<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\BillReminder;
use App\Models\User;

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
            'category_id' => ::factory(),
            'currency_id' => ::factory(),
            'name' => $this->faker->name(),
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'due_date' => $this->faker->date(),
            'frequency' => $this->faker->word(),
            'is_paid' => $this->faker->boolean(),
        ];
    }
}
