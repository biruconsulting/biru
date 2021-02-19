<?php

namespace App\Http\Livewire;

use App\Models\BuyerAd;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class BuyerAdHeaderSearchComponent extends Component
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
        $buyer_ads = BuyerAd::where('ad_type', 'LIKE', '%'.$this->selectedCategory.'%')
                    ->where('ad_title', 'LIKE', '%'.$this->headerSearch.'%')
                    ->orWhere('user_district', 'LIKE', '%'.$this->headerSearch.'%')
                    ->paginate(12);

        return view('livewire.buyer-ad-header-search-component', ['buyer_ads'=>$buyer_ads])->layout('layouts.base');
    }
}
