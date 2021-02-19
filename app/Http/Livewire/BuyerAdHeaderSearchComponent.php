<?php

namespace App\Http\Livewire;

use App\Models\BuyerAd;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class BuyerAdHeaderSearchComponent extends Component
{
    public $selectedCategory;

    public $headerSearch;

    public function mount()
    {
        $this->fill(request()->only('selectedCategory', 'headerSearch'));
    }

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
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->where('ad_type', 'buyer-general')
                        ->where('ad_category', 'LIKE', $general_category_term)
                        ->paginate(12);
        } 
        elseif ($property_category_term)
        {
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->where('ad_type', 'buyer-property')
                        ->where('ad_category', 'LIKE', $property_category_term)
                        ->paginate(12);
        }
        elseif ($job_category_term)
        {
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->where('ad_type', 'buyer-job')
                        ->where('ad_category', 'LIKE', $job_category_term)
                        ->paginate(12);
        }
        elseif ($latest_post_term)
        {
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->latest()
                        ->paginate(12);
        }
        elseif ($oldest_post_term)
        {
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->oldest()
                        ->paginate(12);
        }
        elseif ($selected_location_term)
        {
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->where('user_district', $selected_location_term)
                        ->paginate(12);
        }
        elseif ($searchTerm)
        {
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->where('ad_title', 'LIKE', $searchTerm)                   
                        ->paginate(12);
        }
        else 
        {
            $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                        ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                        ->paginate(12);
        }

        $sidebar_buyer_ads_data = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                                ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                                ->get();

        return view('livewire.buyer-ad-header-search-component', ['sidebar_buyer_ads_data'=>$sidebar_buyer_ads_data , 'buyer_ads'=>$buyer_ads, 'general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
