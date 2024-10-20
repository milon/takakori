<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::factory()->create([
            'name' => 'US Dollar',
            'code' => 'USD',
        ]);

        Currency::factory()->create([
            'name' => 'Canadian Dollar',
            'code' => 'CAD',
        ]);

        Currency::factory()->create([
            'name' => 'Euro',
            'code' => 'EUR',
        ]);

        Currency::factory()->create([
            'name' => 'Bangladeshi Taka',
            'code' => 'BDT',
        ]);
    }
}
