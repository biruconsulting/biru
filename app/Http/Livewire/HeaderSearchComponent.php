<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $selectedCategory;
    public $header_ad_category;
    public $header_search;

    public function render()
    {
        return view('livewire.header-search-component');
    }
}
