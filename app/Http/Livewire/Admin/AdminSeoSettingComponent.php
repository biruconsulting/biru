<?php

namespace App\Http\Livewire\Admin;

use App\Models\SeoSetting;
use Livewire\Component;

class AdminSeoSettingComponent extends Component
{
    public $seo_setting_id;
    public $seo_meta_title;
    public $seo_meta_author;
    public $seo_meta_keywords;
    public $seo_meta_description;


    protected $rules = [
        'seo_meta_title' => 'required|max:60',
        'seo_meta_author' => 'required',
        'seo_meta_keywords' => 'required',
        'seo_meta_description' => 'required|max:160',
    ];

    public function mount() {
        $seo_setting = SeoSetting::first();

        $this->seo_setting_id = $seo_setting->id;
        $this->seo_meta_title = $seo_setting->meta_title;
        $this->seo_meta_author = $seo_setting->meta_author;
        $this->seo_meta_keywords = $seo_setting->meta_keywords;
        $this->seo_meta_description = $seo_setting->meta_description;
    }


    public function submitSeoSetting() {

        $this->validate();

        $seo_setting = SeoSetting::find($this->seo_setting_id);

        $seo_setting->update([
            'meta_title' => $this->seo_meta_title,
            'meta_author' => $this->seo_meta_author,
            'meta_keywords' => $this->seo_meta_keywords,
            'meta_description' => $this->seo_meta_description,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Seo Setting Updated Successfully.']);
    }

    public function render()
    {
        return view('livewire.admin.admin-seo-setting-component')->layout('layouts.admin');
    }
}
