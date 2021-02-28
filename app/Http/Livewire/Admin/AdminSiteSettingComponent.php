<?php

namespace App\Http\Livewire\Admin;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminSiteSettingComponent extends Component
{    
    public $site_setting_id;
    public $site_about_us;
    public $site_contact_number;
    public $site_email;
    public $site_location;

    protected $rules = [
        'site_about_us' => 'required|min:100|max:400',
        'site_contact_number' => 'required',
        'site_email' => 'required|email',
        'site_location' => 'required',
    ];

    public function mount() {
        $site_setting = SiteSetting::first();

        $this->site_setting_id = $site_setting->id;
        $this->site_about_us = $site_setting->site_about_us;
        $this->site_contact_number = $site_setting->site_contact_num;
        $this->site_email = $site_setting->site_email;
        $this->site_location = $site_setting->site_location;
    }

    public function submitSiteSetting() {
        
        $this->validate();
        
        $site_setting = SiteSetting::find($this->site_setting_id);

        $site_setting->update([
            'site_about_us' => $this->site_about_us,
            'site_contact_num' => $this->site_contact_number,
            'site_email' => $this->site_email,
            'site_location'=> $this->site_location,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Site Setting Updated Successfully.']);
        
    }

    public function render()
    {
        return view('livewire.admin.admin-site-setting-component')->layout('layouts.admin');
    }
}
