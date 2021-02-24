<?php

namespace App\Http\Livewire\Admin\SellerAd;

use App\Models\SellerAd;
use Livewire\Component;
use Livewire\WithPagination;

class AdminJobAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    protected $listeners = ['DeleteSellerJobAd'];

    public function sellerJobAdDeleteConfirmation($seller_job_ad_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteSellerJobAd',
            'params'      => [$seller_job_ad_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteSellerJobAd($seller_job_ad_id) {
        if($seller_job_ad_id){
            $seller_job_ad = SellerAd::where('id', $seller_job_ad_id)->first();
            $seller_job_ad->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'Job Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $seller_job_ads = SellerAd::where('ad_type', 'seller-job')
                        ->where('ad_title', 'LIKE', $searchTerm)
                        ->paginate(10);

        return view('livewire.admin.seller-ad.admin-job-ad-component', ['seller_job_ads'=>$seller_job_ads])->layout('layouts.admin');
    }
}
