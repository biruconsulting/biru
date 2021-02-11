<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostAdComponent extends Component
{
    public function render()
    {
        return view('livewire.post-ad-component')->layout('layouts.base');
    }
}
