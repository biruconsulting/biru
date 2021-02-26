<?php

namespace Database\Factories;

use App\Models\BuyerAd;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyerAdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BuyerAd::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'user_first_name'=>$this->faker->name,
            'user_last_name'=>$this->faker->name,
            'user_email'=>$this->faker->unique()->safeEmail,
            'user_phone_number'=>'0764524354',
            'user_district'=>$this->faker->text(5),
            'ad_type'=>'buyer-general',
            'ad_title'=>$this->faker->unique()->words($nb=2, $asText=true),
            'ad_category'=>$this->faker->numberBetween(1, 20),
            'ad_ex_district'=>$this->faker->text(5),
            'ad_brand'=>$this->faker->text(5),
            'ad_model'=>$this->faker->text(5),
            'ad_ex_min_price'=>$this->faker->numberBetween(1000, 20000),
            'ad_ex_max_price'=>$this->faker->numberBetween(20000, 30000),
            'ad_ex_job_type'=>'full time',
            'ad_ex_education_level'=>$this->faker->text(5),
            'ad_short_description'=>$this->faker->text(100),
            'ad_description'=>$this->faker->text(500),
        ];
    }
}
