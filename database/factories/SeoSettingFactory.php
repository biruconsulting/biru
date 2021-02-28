<?php

namespace Database\Factories;

use App\Models\SeoSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeoSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SeoSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meta_title' => 'meta_title',
            'meta_author' => 'meta_author',
            'meta_keywords' => 'meta_keywords',
            'meta_description' => 'meta_description',
        ];
    }
}
