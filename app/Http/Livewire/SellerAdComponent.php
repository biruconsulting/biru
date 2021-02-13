<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SellerAd;
use Livewire\Component;
use Livewire\WithPagination;

class SellerAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    public $selected_general_category = [];
    public $selected_property_category = [];
    public $selected_job_category = [];

    public $latestPost;
    public $oldestPost;

    public function render()
    {
        $general_categories = Category::where('ad_type', 'general')->get();
        $property_categories = Category::where('ad_type', 'property')->get();
        $job_categories = Category::where('ad_type', 'job')->get();

        $searchTerm = '%'.$this->Search.'%';

        $general_category_term = $this->selected_general_category;
        $property_category_term = $this->selected_property_category;
        $job_category_term = $this->selected_job_category;

        $latest_post_term = $this->latestPost;
        $oldest_post_term = $this->oldestPost;

        if ($general_category_term) 
        {
            $seller_ads = SellerAd::where('ad_type', 'general')->where('ad_category', 'LIKE', $general_category_term)->paginate(9);
        } 
        elseif ($property_category_term)
        {
            $seller_ads = SellerAd::where('ad_type', 'property')->where('ad_category', 'LIKE', $property_category_term)->paginate(9);
        }
        elseif ($job_category_term)
        {
            $seller_ads = SellerAd::where('ad_type', 'job')->where('ad_category', 'LIKE', $job_category_term)->paginate(9);
        }
        elseif ($latest_post_term)
        {
            $seller_ads = SellerAd::latest()->paginate(9);
        }
        elseif ($oldest_post_term)
        {
            $seller_ads = SellerAd::oldest()->paginate(9);
        }
        else 
        {
            $seller_ads = SellerAd::where('ad_name', 'LIKE', $searchTerm)                   
                        ->orWhere('ad_brand', 'LIKE', $searchTerm)
                        ->orWhere('ad_category', 'LIKE', $general_category_term)
                        ->orWhere('ad_category', 'LIKE', $property_category_term)
                        ->orWhere('ad_category', 'LIKE', $job_category_term)
                        ->paginate(9);
        }

    
        return view('livewire.seller-ad-component',['seller_ads' => $seller_ads, 'general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
