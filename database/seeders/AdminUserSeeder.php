<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Nuruzzaman Milon',
            'email' => 'admin@takakori.app',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }
}
