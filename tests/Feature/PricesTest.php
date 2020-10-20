<?php

use App\Models\Prices;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PricesTest extends TestCase 
{
    use RefreshDatabase;

    function test_fetches_prices_items()
    {
        Prices::factory()->count(4)->create();
        Prices::factory()->create(['price' => 5]);
        $mostExpensive = Prices::factory()->create(['price' => 50]);

        $prices = Prices::highest();
        $this->assertEquals($mostExpensive->id,$prices->first()->id);
        $this->assertCount(6,$prices);
    }
}
