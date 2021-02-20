<?php

namespace App\Http\Livewire;

use App\Models\BuyerAd;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProfileMyBuyerAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['DeleteBuyerAd'];

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

        $user_buyer_ads = BuyerAd::where('user_id', $user_id)->paginate(5);
        
        return view('livewire.profile-my-buyer-ad-component', ['user_buyer_ads'=>$user_buyer_ads]);
    }
}
