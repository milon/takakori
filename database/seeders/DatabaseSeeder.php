<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\BillReminder;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Debt;
use App\Models\Goal;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}
