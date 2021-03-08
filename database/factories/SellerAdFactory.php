<?php

namespace Database\Factories;

use App\Models\SellerAd;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerAdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SellerAd::class;

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
            'ad_type'=>'seller-general',
            'ad_title'=>$this->faker->unique()->words($nb=2, $asText=true),
            'ad_category'=>$this->faker->numberBetween(1, 20),
            'ad_thumbnail_image'=> 'images/general_ad/general_'. $this->faker->unique()->numberBetween(1, 22).'.jpg',
            'ad_condition'=>$this->faker->text(5),
            'ad_brand'=>$this->faker->text(5),
            'ad_model'=>$this->faker->text(5),
            'ad_price'=>$this->faker->numberBetween(1000, 20000),
            'ad_short_description'=>$this->faker->text(100),
            'ad_description'=>$this->faker->text(500),
            'expired_at'=> Carbon::now()->addMinutes(1),
        ];
    }
}
