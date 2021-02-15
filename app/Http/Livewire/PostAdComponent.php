<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SellerAd;
use Livewire\Component;

class PostAdComponent extends Component
{
    public $ad_short_description;

    public function submitAd() {
        SellerAd::create([
            'ad_description' => $this->ad_short_description,
        ]);
    }

    public function render()
    {
        $general_categories = Category::where('ad_type', 'general')->get();
        $property_categories = Category::where('ad_type', 'property')->get();
        $job_categories = Category::where('ad_type', 'job')->get();

        return view('livewire.post-ad-component', ['general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
