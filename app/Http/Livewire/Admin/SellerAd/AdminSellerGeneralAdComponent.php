<?php

namespace App\Http\Livewire\Admin\SellerAd;

use App\Mail\AdDeletedInfoMail;
use App\Models\SellerAd;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSellerGeneralAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    protected $listeners = ['DeleteSellerGeneralAd'];

    public function sellerGeneralAdDeleteConfirmation($seller_general_ad_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteSellerGeneralAd',
            'params'      => [$seller_general_ad_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteSellerGeneralAd($seller_general_ad_id) {
        if($seller_general_ad_id){
            $seller_general_ad = SellerAd::where('id', $seller_general_ad_id)->first();

            $thumbnail_image = $seller_general_ad->ad_thumbnail_image;

            $other_images = $seller_general_ad->ad_images;

            if ($thumbnail_image) {
                Storage::disk('public')->delete($thumbnail_image);
            }

            if ($other_images) {
                foreach (json_decode($other_images) as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $seller_general_ad->delete();

            $adMailDetails = [
                'user_first_name' => $seller_general_ad->user_first_name,
                'user_last_name' => $seller_general_ad->user_last_name,
                'ad_title' => $seller_general_ad->ad_title,
                'created_at' => $seller_general_ad->created_at,
            ];

            Mail::to($seller_general_ad->user_email)->send(new AdDeletedInfoMail($adMailDetails));

            $this->emit('alert', ['type' => 'success', 'message' => 'General Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $seller_general_ads = SellerAd::where('ad_type', 'seller-general')
                            ->where('ad_title', 'LIKE', $searchTerm)
                            ->paginate(10);

        return view('livewire.admin.seller-ad.admin-seller-general-ad-component', ['seller_general_ads'=>$seller_general_ads])->layout('layouts.admin');
    }
}
