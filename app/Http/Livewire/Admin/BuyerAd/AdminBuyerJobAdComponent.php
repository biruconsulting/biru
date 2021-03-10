<?php

namespace App\Http\Livewire\Admin\BuyerAd;

use App\Mail\AdDeletedInfoMail;
use App\Models\BuyerAd;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBuyerJobAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    protected $listeners = ['DeleteBuyerJobAd'];

    public function buyerJobAdDeleteConfirmation($buyer_job_ad_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteBuyerJobAd',
            'params'      => [$buyer_job_ad_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteBuyerJobAd($buyer_job_ad_id) {
        if($buyer_job_ad_id){
            $buyer_job_ad = BuyerAd::where('id', $buyer_job_ad_id)->first();
            $buyer_job_ad->delete();

            $adMailDetails = [
                'user_first_name' => $buyer_job_ad->user_first_name,
                'user_last_name' => $buyer_job_ad->user_last_name,
                'ad_title' => $buyer_job_ad->ad_title,
                'created_at' => $buyer_job_ad->created_at,
            ];

            Mail::to($buyer_job_ad->user->email)->send(new AdDeletedInfoMail($adMailDetails));

            $this->emit('alert', ['type' => 'success', 'message' => 'Job Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $buyer_job_ads = BuyerAd::where('ad_type', 'buyer-job')
                        ->where('ad_title', 'LIKE', $searchTerm)
                        ->latest()
                        ->paginate(10);

        return view('livewire.admin.buyer-ad.admin-buyer-job-ad-component', ['buyer_job_ads'=>$buyer_job_ads])->layout('layouts.admin');
    }
}
