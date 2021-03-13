<?php

namespace Database\Factories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_about_us' => 'ClassiHut is a classifieds site with millions of live ads in a wide range of categories - cars, housing, jobs and everything in between. We’re proud to provide a platform that connects Sri Lankans, helping them to buy great items in their community, make money off unused possessions cluttering up houses, and help the country waste less.',
            'site_contact_num' => 'site_contact_num',
            'site_email' => ' classihut@gmail.com',
            'site_location' => 'Canada',
        ];
    }
}
