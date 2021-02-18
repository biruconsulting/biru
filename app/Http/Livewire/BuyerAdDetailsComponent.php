<?php

namespace App\Http\Livewire;

use App\Models\BuyerAd;
use App\Models\Category;
use Livewire\Component;

class BuyerAdDetailsComponent extends Component
{
    public $buyer_ad_id;

    public function mount($buyer_ad_id)
    { 
        $this->buyer_ad_id = $buyer_ad_id;
    }

    public function render()
    {
        $buyer_ad = BuyerAd::where('id', $this->buyer_ad_id)->first();
        $buyer_category = Category::where('id', $buyer_ad->ad_category)->first();
        return view('livewire.buyer-ad-details-component', ['buyer_ad'=>$buyer_ad , 'buyer_category'=>$buyer_category])->layout('layouts.base');
    }
}
