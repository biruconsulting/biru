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

    public $selected_location = [];

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

        $selected_location_term = $this->selected_location;

        if ($general_category_term) 
        {
            $seller_ads = SellerAd::where('ad_type', 'seller-general')->where('ad_category', $general_category_term)->paginate(9);
        } 
        elseif ($property_category_term)
        {
            $seller_ads = SellerAd::where('ad_type', 'seller-property')->where('ad_category', $property_category_term)->paginate(9);
        }
        elseif ($job_category_term)
        {
            $seller_ads = SellerAd::where('ad_type', 'seller-job')->where('ad_category', $job_category_term)->paginate(9);
        }
        elseif ($latest_post_term)
        {
            $seller_ads = SellerAd::latest()->paginate(9);
        }
        elseif ($oldest_post_term)
        {
            $seller_ads = SellerAd::oldest()->paginate(9);
        }
        elseif ($selected_location_term)
        {
            $seller_ads = SellerAd::where('user_district', 'LIKE', $selected_location_term)->paginate(9);
        }
        else 
        {
            $seller_ads = SellerAd::where('ad_title', 'LIKE', $searchTerm)                   
                        ->orWhere('ad_brand', 'LIKE', $searchTerm)
                        ->paginate(9);
        }

        $sidebar_seller_ads_data = SellerAd::all();
    
        return view('livewire.seller-ad-component',['sidebar_seller_ads_data'=>$sidebar_seller_ads_data, 'seller_ads' => $seller_ads, 'general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
