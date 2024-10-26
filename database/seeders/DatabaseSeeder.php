<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\BillReminder;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Debt;
use App\Models\Goal;
use App\Models\Investment;
use App\Models\RecurringTransaction;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        $this->call(AdminUserSeeder::class);
        $this->call(CurrencySeeder::class);

        User::factory(25)->create();
        Tag::factory(30)->create();
        Category::factory(10)->create();
        Account::factory(50)->create();
        BillReminder::factory(20)->create();
        Budget::factory(15)->create();
        Debt::factory(15)->create();
        Goal::factory(15)->create();
        Investment::factory(15)->create();
        Transaction::factory(150)->create();
        RecurringTransaction::factory(150)->create();

        foreach ((range(1, 50)) as $index) {
            DB::table('taggables')->insert(
                [
                    'tag_id' => rand(1, 30),
                    'taggable_id' => rand(1, 20),
                    'taggable_type' => rand(0, 1) == 1 ? Transaction::class : RecurringTransaction::class,
                ]
            );
        }
    }
}
