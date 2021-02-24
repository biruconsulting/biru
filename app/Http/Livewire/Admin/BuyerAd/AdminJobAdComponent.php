<?php

namespace App\Http\Livewire\Admin\BuyerAd;

use App\Models\BuyerAd;
use Livewire\Component;
use Livewire\WithPagination;

class AdminJobAdComponent extends Component
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

            $this->emit('alert', ['type' => 'success', 'message' => 'Job Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $buyer_job_ads = BuyerAd::where('ad_type', 'buyer-job')
                        ->where('ad_title', 'LIKE', $searchTerm)
                        ->paginate(10);

        return view('livewire.admin.buyer-ad.admin-job-ad-component', ['buyer_job_ads'=>$buyer_job_ads])->layout('layouts.admin');
    }
}
