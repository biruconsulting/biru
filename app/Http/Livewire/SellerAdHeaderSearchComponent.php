<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SellerAd;
use Livewire\Component;
use Livewire\WithPagination;

class SellerAdHeaderSearchComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selectedCategory;

    public $headerSearch;

    public function mount()
    {
        $this->fill(request()->only('selectedCategory', 'headerSearch'));
    }

    public function render()
    {
        
        $seller_ads = SellerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                    ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                    ->orWhere('user_district', 'LIKE', '%'.$this->headerSearch.'%')
                    ->paginate(9);
        

        return view('livewire.seller-ad-header-search-component',['seller_ads' => $seller_ads])->layout('layouts.base');
    }
}
