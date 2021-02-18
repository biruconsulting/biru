<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SellerAd;
use Livewire\Component;

class SellerAdDetailsComponent extends Component
{
    public $seller_ad_id;

    public function mount($seller_ad_id)
    { 
        $this->seller_ad_id = $seller_ad_id;
    }

    public function render()
    {
        $seller_ad = SellerAd::where('id', $this->seller_ad_id)->first();
        $seller_category = Category::where('id', $seller_ad->ad_category)->first();
        return view('livewire.seller-ad-details-component', ['seller_ad'=>$seller_ad, 'seller_category'=>$seller_category])->layout('layouts.base');
    }
}
