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
        \App\Models\User::factory(15)->create();
        // \App\Models\SiteSetting::factory(1)->create();
        // \App\Models\SeoSetting::factory(1)->create();
        \App\Models\SellerAd::factory(15)->create();
        // \App\Models\Category::factory(5)->create();
        \App\Models\BuyerAd::factory(15)->create();
        // \App\Models\CarouselSlider::factory(3)->create();
    }
}
