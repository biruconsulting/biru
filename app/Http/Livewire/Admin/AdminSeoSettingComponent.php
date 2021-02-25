<?php

namespace App\Http\Livewire\Admin;

use App\Models\SeoSetting;
use Livewire\Component;

class AdminSeoSettingComponent extends Component
{
    public $seo_setting_id;
    public $seo_meta_title;
    public $seo_meta_author;
    public $seo_meta_tag;
    public $seo_meta_description;
    public $seo_google_analytics;
    public $seo_bing_analytics;

    protected $rules = [
        'seo_meta_title' => 'required|min:50|max:60',
        'seo_meta_author' => 'required',
        'seo_meta_tag' => 'required',
        'seo_meta_description' => 'required|max:160',
        'seo_google_analytics' => 'required',
        'seo_bing_analytics' => 'required',
    ];

    public function mount() {
        $seo_setting = SeoSetting::first();

        $this->seo_setting_id = $seo_setting->id;
        $this->seo_meta_title = $seo_setting->meta_title;
        $this->seo_meta_author = $seo_setting->meta_author;
        $this->seo_meta_tag = $seo_setting->meta_tag;
        $this->seo_meta_description = $seo_setting->meta_description;
        $this->seo_google_analytics = $seo_setting->google_analytics;
        $this->seo_bing_analytics = $seo_setting->bing_analytics;
    }


    public function submitSeoSetting() {

        $this->validate();

        $seo_setting = SeoSetting::find($this->seo_setting_id);

        $seo_setting->update([
            'meta_title' => $this->seo_meta_title,
            'meta_author' => $this->seo_meta_author,
            'meta_tag' => $this->seo_meta_tag,
            'meta_description' => $this->seo_meta_description,
            'google_analytics' => $this->seo_google_analytics,
            'bing_analytics' => $this->seo_bing_analytics,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Seo Setting Updated Successfully.']);
    }

    public function render()
    {
        return view('livewire.admin.admin-seo-setting-component')->layout('layouts.admin');
    }
}
