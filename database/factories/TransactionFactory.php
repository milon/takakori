<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

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
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'date' => $this->faker->dateTime(),
            'description' => $this->faker->text(),
        ];
    }
}
