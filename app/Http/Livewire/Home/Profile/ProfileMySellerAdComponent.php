<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\SellerAd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ProfileMySellerAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['DeleteSellerAd'];

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

            $seller_ad = SellerAd::where('id', $seller_ad_id)->first();

            $thumbnail_image = $seller_ad->ad_thumbnail_image;

            $other_images = $seller_ad->ad_images;

            if ($thumbnail_image) {
                Storage::disk('public')->delete($thumbnail_image);
            }

            if ($other_images) {
                foreach (json_decode($other_images) as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $seller_ad->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'Your Seller Advertisement Deleted Successfully.']);
        }
    }

    public function render()
    {
        $user_id = Auth::user()->id;

        $user_seller_ads = SellerAd::where('user_id', $user_id)->paginate(5);
        
        return view('livewire.home.profile.profile-my-seller-ad-component', ['user_seller_ads'=>$user_seller_ads]);
    }
}
