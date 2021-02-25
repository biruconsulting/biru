<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;

class HeaderSearchComponent extends Component
{
    public $selectedCategory;
    public $headerSearch;

    public function mount()
    {
        $this->fill(request()->only('selectedCategory', 'headerSearch'));
    }

    public function render()
    {
        return view('livewire.home.header-search-component');
    }
}
