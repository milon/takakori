<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'name' => 'Nuruzzaman Milon',
            'email' => 'admin@takakori.app',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        User::factory(25)->create();
        Tag::factory(25)->create();
    }
}
