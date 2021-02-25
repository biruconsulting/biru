<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;


class ProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.home.profile.profile-component')->layout('layouts.base');
    }
}
