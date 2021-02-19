<?php

namespace App\Http\Livewire;

use App\Models\BuyerAd;
use App\Models\SellerAd;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProfileComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user_id = Auth::user()->id;

        $user_seller_ads = SellerAd::where('user_id', $user_id)->paginate(5);

        $user_buyer_ads = BuyerAd::where('user_id', $user_id)->paginate(5);

        return view('livewire.profile-component', ['user_seller_ads'=>$user_seller_ads, 'user_buyer_ads'=>$user_buyer_ads])->layout('layouts.base');
    }
}
