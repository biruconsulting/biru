<?php

namespace Database\Factories;

use App\Models\CarouselSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselSliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarouselSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image'=> 'images/carousel_slider/slider_'. $this->faker->unique()->numberBetween(1, 3).'.jpg',
            'title'=>$this->faker->unique()->words($nb=2, $asText=true),
            'description'=>$this->faker->text(300),
            'link'=>$this->faker->text(5),
        ];
    }
}
