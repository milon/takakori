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
            'user_id' => User::factory(),
            'account_id' => Account::factory(),
            'category_id' => Category::factory(),
            'currency_id' => Currency::factory(),
            'transaction_type' => $this->faker->word(),
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'date' => $this->faker->dateTime(),
            'description' => $this->faker->text(),
        ];
    }
}
