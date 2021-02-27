<?php

namespace App\Http\Livewire\Admin;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class AdminSiteSettingComponent extends Component
{
    use WithFileUploads;
    
    public $site_setting_id;
    public $site_about_us;
    public $site_logo;
    public $site_contact_number;
    public $existing_site_logo;
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
        $this->existing_site_logo = $site_setting->site_logo;
        $this->site_contact_number = $site_setting->site_contact_num;
        $this->site_email = $site_setting->site_email;
        $this->site_location = $site_setting->site_location;
    }

    public function submitSiteSetting() {
        
        $this->validate();
        
        $site_setting = SiteSetting::find($this->site_setting_id);

        $update_site_logo = $this->site_logo;

        if ($update_site_logo) {

            if ($this->existing_site_logo) {
                Storage::disk('public')->delete($this->existing_site_logo);
            }

            // for thumbnail image 
            // Get filename with extension
            $filenameWithExt_site_logo = $update_site_logo->getClientOriginalName();

            // Get file path
            $filename_site_logo = pathinfo($filenameWithExt_site_logo, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename_site_logo = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_site_logo);
            $filename_site_logo = preg_replace("/\s+/", '-', $filename_site_logo);

            // Get the original image extension
            $extension_site_logo = $update_site_logo->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore_site_logo = $filename_site_logo . '_' . time() . '.' . $extension_site_logo;

            $resize_site_logo = Image::make($update_site_logo)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('png');

            Storage::put("public/images/{$fileNameToStore_site_logo}", $resize_site_logo->__toString());

            $new_site_logo = 'images/' . $fileNameToStore_site_logo;

            $site_setting->update([
                'site_logo' => $new_site_logo,
                'site_about_us' => $this->site_about_us,
                'site_contact_num' => $this->site_contact_number,
                'site_email' => $this->site_email,
                'site_location'=> $this->site_location,
            ]);

            $this->emit('alert', ['type' => 'success', 'message' => 'Site Setting Updated Successfully.']);
        }
        else {
            $site_setting->update([
                'site_about_us' => $this->site_about_us,
                'site_contact_num' => $this->site_contact_number,
                'site_email' => $this->site_email,
                'site_location'=> $this->site_location,
            ]);

            $this->emit('alert', ['type' => 'success', 'message' => 'Site Setting Updated Successfully.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-site-setting-component')->layout('layouts.admin');
    }
}
