<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prices;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prices::factory()->count(10)->create();
    }
}
