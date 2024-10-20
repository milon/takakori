<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Faker\Generator;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        // Admin User
        $this->call(AdminUserSeeder::class);

        $this->call(CurrencySeeder::class);

        User::factory(25)->create();
        Tag::factory(25)->create();
        Category::factory(10)->create();

    }
}
