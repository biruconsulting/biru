<?php

namespace App\Http\Livewire\Admin\BuyerAd;

use App\Mail\AdDeletedInfoMail;
use App\Models\BuyerAd;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBuyerPropertyAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    protected $listeners = ['DeleteBuyerPropertyAd'];

    public function buyerPropertyAdDeleteConfirmation($buyer_property_ad_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteBuyerPropertyAd',
            'params'      => [$buyer_property_ad_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteBuyerPropertyAd($buyer_property_ad_id) {
        if($buyer_property_ad_id){
            $buyer_property_ad = BuyerAd::where('id', $buyer_property_ad_id)->first();
            $buyer_property_ad->delete();

            $adMailDetails = [
                'user_first_name' => $buyer_property_ad->user_first_name,
                'user_last_name' => $buyer_property_ad->user_last_name,
                'ad_title' => $buyer_property_ad->ad_title,
                'created_at' => $buyer_property_ad->created_at,
            ];

            Mail::to($buyer_property_ad->user_email)->send(new AdDeletedInfoMail($adMailDetails));

            $this->emit('alert', ['type' => 'success', 'message' => 'Property Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $buyer_property_ads = BuyerAd::where('ad_type', 'buyer-property')
                            ->where('ad_title', 'LIKE', $searchTerm)
                            ->paginate(10);

        return view('livewire.admin.buyer-ad.admin-buyer-property-ad-component', ['buyer_property_ads'=>$buyer_property_ads])->layout('layouts.admin');
    }
}
