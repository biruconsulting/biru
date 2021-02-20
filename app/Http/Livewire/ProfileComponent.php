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

    protected $listeners = ['DeleteSellerAd', 'DeleteBuyerAd'];

    public function sellerAdDeleteConfirmation($seller_ad_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteSellerAd',
            'params'      => [$seller_ad_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteSellerAd($seller_ad_id) {
        if($seller_ad_id){
            $seller_ad = SellerAd::where('id', $seller_ad_id);
            $seller_ad->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'Your Seller Advertisement Deleted Successfully.']);
        }
    }

    public function buyerAdDeleteConfirmation($buyer_ad_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteBuyerAd',
            'params'      => [$buyer_ad_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteBuyerAd($buyer_ad_id) {
        if($buyer_ad_id){
            $buyer_ad = BuyerAd::where('id', $buyer_ad_id);
            $buyer_ad->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'Your Buyer Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $user_id = Auth::user()->id;

        $user_seller_ads = SellerAd::where('user_id', $user_id)->paginate(5, ['*'], 'user_seller_ads');

        $user_buyer_ads = BuyerAd::where('user_id', $user_id)->paginate(5, ['*'], 'user_buyer_ads');

        return view('livewire.profile-component', ['user_seller_ads'=>$user_seller_ads, 'user_buyer_ads'=>$user_buyer_ads])->layout('layouts.base');
    }
}
