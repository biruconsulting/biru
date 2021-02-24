<?php

namespace App\Http\Livewire\Admin\BuyerAd;

use App\Models\BuyerAd;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGeneralAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    protected $listeners = ['DeleteBuyerGeneralAd'];

    public function buyerGeneralAdDeleteConfirmation($buyer_general_ad_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteBuyerGeneralAd',
            'params'      => [$buyer_general_ad_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteBuyerGeneralAd($buyer_general_ad_id) {
        if($buyer_general_ad_id){
            $buyer_general_ad = BuyerAd::where('id', $buyer_general_ad_id)->first();
            $buyer_general_ad->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'General Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $buyer_general_ads = BuyerAd::where('ad_type', 'buyer-general')
                            ->where('ad_title', 'LIKE', $searchTerm)
                            ->paginate(10);

        return view('livewire.admin.buyer-ad.admin-general-ad-component', ['buyer_general_ads'=>$buyer_general_ads])->layout('layouts.admin');
    }
}
