<?php

namespace App\Http\Livewire\Admin\SellerAd;

use App\Mail\AdDeletedInfoMail;
use App\Models\SellerAd;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSellerJobAdComponent extends Component
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

            $thumbnail_image = $seller_job_ad->ad_thumbnail_image;

            $other_images = $seller_job_ad->ad_images;

            if ($thumbnail_image) {
                Storage::disk('public')->delete($thumbnail_image);
            }

            if ($other_images) {
                foreach (json_decode($other_images) as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $seller_job_ad->delete();

            $adMailDetails = [
                'user_first_name' => $seller_job_ad->user_first_name,
                'user_last_name' => $seller_job_ad->user_last_name,
                'ad_title' => $seller_job_ad->ad_title,
                'created_at' => $seller_job_ad->created_at,
            ];

            Mail::to($seller_job_ad->user->email)->send(new AdDeletedInfoMail($adMailDetails));

            $this->emit('alert', ['type' => 'success', 'message' => 'Job Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $seller_job_ads = SellerAd::where('ad_type', 'seller-job')
                        ->where('ad_title', 'LIKE', $searchTerm)
                        ->paginate(10);

        return view('livewire.admin.seller-ad.admin-seller-job-ad-component', ['seller_job_ads'=>$seller_job_ads])->layout('layouts.admin');
    }
}
