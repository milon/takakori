<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Transaction;
use App\Models\User;

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
            'account_id' => ::factory(),
            'category_id' => ::factory(),
            'currency_id' => ::factory(),
            'transaction_type' => $this->faker->word(),
            'amount' => $this->faker->numberBetween(-10000, 10000),
            'date' => $this->faker->dateTime(),
            'description' => $this->faker->text(),
        ];
    }
}
