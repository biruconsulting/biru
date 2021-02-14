<?php

namespace App\Http\Livewire;

use App\Models\BuyerAd;
use App\Models\SellerAd;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $seller_ads = SellerAd::latest()->limit(7)->get();
        $buyer_ads = BuyerAd::latest()->limit(7)->get();

        $seller_general_ads = SellerAd::where('ad_type', 'general')->latest()->limit(7)->get();
        $seller_property_ads = SellerAd::where('ad_type', 'property')->latest()->limit(7)->get();
        $seller_job_ads = SellerAd::where('ad_type', 'job')->latest()->limit(7)->get();

        $buyer_general_ads = BuyerAd::where('ad_type', 'general')->latest()->limit(7)->get();
        $buyer_property_ads = BuyerAd::where('ad_type', 'property')->latest()->limit(7)->get();
        $buyer_job_ads = BuyerAd::where('ad_type', 'job')->latest()->limit(7)->get();

        return view('livewire.home-component', ['seller_ads'=>$seller_ads, 'buyer_ads'=>$buyer_ads, 'seller_general_ads'=>$seller_general_ads, 'seller_property_ads'=>$seller_property_ads, 'seller_job_ads'=>$seller_job_ads, 'buyer_general_ads'=>$buyer_general_ads, 'buyer_property_ads'=>$buyer_property_ads, 'buyer_job_ads'=>$buyer_job_ads])->layout('layouts.base');
    }
}
