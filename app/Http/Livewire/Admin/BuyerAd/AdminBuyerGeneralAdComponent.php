<?php

namespace App\Http\Livewire\Admin\BuyerAd;

use App\Mail\AdDeletedInfoMail;
use App\Models\BuyerAd;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBuyerGeneralAdComponent extends Component
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

            $adMailDetails = [
                'user_first_name' => $buyer_general_ad->user_first_name,
                'user_last_name' => $buyer_general_ad->user_last_name,
                'ad_title' => $buyer_general_ad->ad_title,
                'created_at' => $buyer_general_ad->created_at,
            ];

            Mail::to($buyer_general_ad->user->email)->send(new AdDeletedInfoMail($adMailDetails));

            $this->emit('alert', ['type' => 'success', 'message' => 'General Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $buyer_general_ads = BuyerAd::where('ad_type', 'buyer-general')
                            ->where('ad_title', 'LIKE', $searchTerm)
                            ->paginate(10);

        return view('livewire.admin.buyer-ad.admin-buyer-general-ad-component', ['buyer_general_ads'=>$buyer_general_ads])->layout('layouts.admin');
    }
}
