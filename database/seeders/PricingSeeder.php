<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pricing;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = ['name' => 'Silver', 'amount' => 10000, 'rooms' => 40, 'gallery_up' => 2, 'support' => 'limited'];
        $s2 = ['name' => 'Gold', 'amount' => 20000, 'rooms' => 100000, 'gallery_up' => 20, 'support' => 'unlimited'];

        Pricing::create($s1);
        Pricing::create($s2);
    }
}
