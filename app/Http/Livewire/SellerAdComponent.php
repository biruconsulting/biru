<?php

namespace App\Http\Livewire;

use App\Models\SellerAd;
use Livewire\Component;
use Livewire\WithPagination;

class SellerAdComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $seller_ads = SellerAd::Where('ad_name', 'LIKE', $searchTerm)                   
                        ->orWhere('ad_brand', 'LIKE', $searchTerm)
                        ->paginate(9);

        return view('livewire.seller-ad-component',['seller_ads' => $seller_ads])->layout('layouts.base');
    }
}
