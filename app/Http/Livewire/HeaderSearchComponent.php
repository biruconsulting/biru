<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $selectedCategory;
    public $headerSearch;

    public function render()
    {
        return view('livewire.header-search-component');
    }
}
