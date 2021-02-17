<?php

namespace App\Http\Livewire;

use App\Models\SellerAd;
use Livewire\Component;

class SellerAdDetailsComponent extends Component
{
    public $ad_id;

    public function mount($ad_id)
    { 
        $this->ad_id = $ad_id;
    }

    public function render()
    {
        $seller_ad = SellerAd::where('id', $this->ad_id)->first();
        return view('livewire.seller-ad-details-component', ['seller_ad'=>$seller_ad])->layout('layouts.base');
    }
}
