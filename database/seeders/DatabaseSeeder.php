<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(22)->create();
        \App\Models\SellerAd::factory(10)->create();
        // \App\Models\Category::factory(5)->create();
        // \App\Models\BuyerAd::factory(5)->create();
    }
}
