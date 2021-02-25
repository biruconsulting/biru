<?php

namespace App\Http\Livewire\Home\SellerAd;

use App\Models\Category;
use App\Models\SellerAd;
use Livewire\Component;

class SellerAdDetailsComponent extends Component
{
    public $seller_ad_id;

    public function mount($seller_ad_id)
    { 
        $this->seller_ad_id = $seller_ad_id;
    }

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
                unlink('storage/' . $thumbnail_image);
            }

            if ($other_images) {
                foreach (json_decode($other_images) as $image) {
                    unlink('storage/' . $image);
                }
            }

            $seller_ad->delete();

            session()->flash('message', 'Your Seller Advertisement Deleted Successfully.');

            return redirect()->route('home');
        }
    }

    public function render()
    {
        $seller_ad = SellerAd::where('id', $this->seller_ad_id)->first();
        $seller_category = Category::where('id', $seller_ad->ad_category)->first();
        return view('livewire.home.seller-ad.seller-ad-details-component', ['seller_ad'=>$seller_ad, 'seller_category'=>$seller_category])->layout('layouts.base');
    }
}
