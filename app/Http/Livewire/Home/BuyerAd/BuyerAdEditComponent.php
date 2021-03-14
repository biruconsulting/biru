<?php

namespace App\Http\Livewire\Home\BuyerAd;

use App\Models\BuyerAd;
use App\Models\Category;
use Livewire\Component;

class BuyerAdEditComponent extends Component
{
    public $buyer_ad_id;
    public $buyer_user_first_name;
    public $buyer_user_last_name;
    public $buyer_user_email;
    public $buyer_user_phone_number;
    public $buyer_user_district;
    public $buyer_ad_type;
    public $buyer_general_ad_title;
    public $buyer_general_ad_category;
    public $buyer_general_ad_brand;
    public $buyer_general_ad_model;
    public $buyer_general_ad_ex_min_price;
    public $buyer_general_ad_ex_max_price;
    public $buyer_general_ad_short_description;
    public $buyer_general_ad_description;
    public $buyer_property_ad_title;
    public $buyer_property_ad_category;
    public $buyer_property_ad_ex_district;
    public $buyer_property_ad_ex_min_price;
    public $buyer_property_ad_ex_max_price;
    public $buyer_property_ad_short_description;
    public $buyer_property_ad_description;
    public $buyer_job_ad_title;
    public $buyer_job_ad_category;
    public $buyer_job_ad_ex_district;
    public $buyer_job_ad_ex_job_type;
    public $buyer_job_ad_ex_education_level;
    public $buyer_job_ad_short_description;
    public $buyer_job_ad_description;

    public function clearBuyerAdData() {
        $this->buyer_user_first_name = '';
        $this->buyer_user_last_name = '';
        $this->buyer_user_email = '';
        $this->buyer_user_phone_number = '';
        $this->buyer_user_district = '';
        $this->buyer_ad_type = '';
        $this->buyer_general_ad_title = '';
        $this->buyer_general_ad_category = '';
        $this->buyer_general_ad_brand = '';
        $this->buyer_general_ad_model = '';
        $this->buyer_general_ad_ex_min_price = '';
        $this->buyer_general_ad_ex_max_price = '';
        $this->buyer_general_ad_short_description = '';
        $this->buyer_general_ad_description = '';
        $this->buyer_property_ad_title = '';
        $this->buyer_property_ad_category = '';
        $this->buyer_property_ad_ex_district = '';
        $this->buyer_property_ad_ex_min_price = '';
        $this->buyer_property_ad_ex_max_price = '';
        $this->buyer_property_ad_short_description = '';
        $this->buyer_property_ad_description = '';
        $this->buyer_job_ad_title = '';
        $this->buyer_job_ad_category = '';
        $this->buyer_job_ad_ex_district = '';
        $this->buyer_job_ad_ex_job_type = '';
        $this->buyer_job_ad_ex_education_level = '';
        $this->buyer_job_ad_short_description = '';
        $this->buyer_job_ad_description = '';
    }

    public function mount($buyer_ad_id)
    { 
        $this->buyer_ad_id = $buyer_ad_id;

        $buyer_ad = BuyerAd::where('id', $buyer_ad_id)->first();

        $this->buyer_user_first_name = $buyer_ad->user_first_name;
        $this->buyer_user_last_name = $buyer_ad->user_last_name;
        $this->buyer_user_email = $buyer_ad->user_email;
        $this->buyer_user_phone_number = $buyer_ad->user_phone_number;
        $this->buyer_user_district = $buyer_ad->user_district;
        $this->buyer_ad_type = $buyer_ad->ad_type;

        if ($buyer_ad->ad_type == 'buyer-general') {
            
            $this->buyer_general_ad_title = $buyer_ad->ad_title;
            $this->buyer_general_ad_category = $buyer_ad->ad_category;
            $this->buyer_general_ad_brand = $buyer_ad->ad_brand;
            $this->buyer_general_ad_model = $buyer_ad->ad_model;
            $this->buyer_general_ad_ex_min_price = $buyer_ad->ad_ex_min_price;
            $this->buyer_general_ad_ex_max_price = $buyer_ad->ad_ex_max_price;
            $this->buyer_general_ad_short_description = $buyer_ad->ad_short_description;
            $this->buyer_general_ad_description = $buyer_ad->ad_description;
            
        }
        else if ($buyer_ad->ad_type == 'buyer-property') {

            $this->buyer_property_ad_title = $buyer_ad->ad_title;
            $this->buyer_property_ad_category = $buyer_ad->ad_category;
            $this->buyer_property_ad_ex_district = $buyer_ad->ad_ex_district;
            $this->buyer_property_ad_ex_min_price = $buyer_ad->ad_ex_min_price;
            $this->buyer_property_ad_ex_max_price = $buyer_ad->ad_ex_max_price;
            $this->buyer_property_ad_short_description = $buyer_ad->ad_short_description;
            $this->buyer_property_ad_description = $buyer_ad->ad_description;

        }
        else if ($buyer_ad->ad_type == 'buyer-job') {

            $this->buyer_job_ad_title = $buyer_ad->ad_title;
            $this->buyer_job_ad_category = $buyer_ad->ad_category;
            $this->buyer_job_ad_ex_district = $buyer_ad->ad_ex_district;
            $this->buyer_job_ad_ex_job_type = $buyer_ad->ad_ex_job_type;
            $this->buyer_job_ad_ex_education_level = $buyer_ad->ad_ex_education_level;
            $this->buyer_job_ad_short_description = $buyer_ad->ad_short_description;
            $this->buyer_job_ad_description = $buyer_ad->ad_description;
        }
    }

    public function updateBuyerAd($buyer_ad_id) {

        $buyer_ad = BuyerAd::find($buyer_ad_id);

        $this->validate([
            'buyer_user_first_name' => 'required|min:2',
            'buyer_user_last_name' => 'required|min:2',
            'buyer_user_email' => 'required|email',
            'buyer_user_phone_number' => 'required|digits:10',
            'buyer_user_district' => 'required',
        ]);

        if ($buyer_ad->ad_type == 'buyer-general') {
            
            $this->validate([
                'buyer_general_ad_title' => 'required|min:5|max:20',
                'buyer_general_ad_category' => 'required',
                'buyer_general_ad_brand' => 'required',
                'buyer_general_ad_ex_min_price' => 'required|numeric',
                'buyer_general_ad_ex_max_price' => 'required|numeric',
                'buyer_general_ad_short_description' => 'required|min:80|max:130',
                'buyer_general_ad_description' => 'required|min:100',
            ]);

            $buyer_ad->update([
                'user_first_name' => $this->buyer_user_first_name,
                'user_last_name' => $this->buyer_user_last_name,
                'user_email' => $this->buyer_user_email,
                'user_phone_number' => $this->buyer_user_phone_number,
                'user_district' => $this->buyer_user_district,
                'ad_title' => $this->buyer_general_ad_title,
                'ad_category' => $this->buyer_general_ad_category,
                'ad_brand' => $this->buyer_general_ad_brand,
                'ad_model' => $this->buyer_general_ad_model,
                'ad_ex_min_price' => $this->buyer_general_ad_ex_min_price,
                'ad_ex_max_price' => $this->buyer_general_ad_ex_max_price,
                'ad_short_description' => $this->buyer_general_ad_short_description,
                'ad_description' => $this->buyer_general_ad_description,
            ]);

            $this->clearBuyerAdData();

            $this->emit('buyer-general-summernote');

            session()->flash('message', 'Buyer General Advertisement Updated Successfully.');

            return redirect()->route('buyer_ad.details',['buyer_ad_id'=>$buyer_ad->id]);

        } 
        elseif ($buyer_ad->ad_type == 'buyer-property') 
        {
            $this->validate([
                'buyer_property_ad_title' => 'required|min:5|max:20',
                'buyer_property_ad_category' => 'required',
                'buyer_property_ad_ex_district' => 'required',
                'buyer_property_ad_ex_min_price' => 'required|numeric',
                'buyer_property_ad_ex_max_price' => 'required|numeric',
                'buyer_property_ad_short_description' => 'required|min:80|max:130',
                'buyer_property_ad_description' => 'required|min:100',
            ]); 
            
            $buyer_ad->update([
                'user_first_name' => $this->buyer_user_first_name,
                'user_last_name' => $this->buyer_user_last_name,
                'user_email' => $this->buyer_user_email,
                'user_phone_number' => $this->buyer_user_phone_number,
                'user_district' => $this->buyer_user_district,
                'ad_title' => $this->buyer_property_ad_title,
                'ad_category' => $this->buyer_property_ad_category,
                'ad_ex_district' => $this->buyer_property_ad_ex_district,
                'ad_ex_min_price' => $this->buyer_property_ad_ex_min_price,
                'ad_ex_max_price' => $this->buyer_property_ad_ex_max_price,
                'ad_short_description' => $this->buyer_property_ad_short_description,
                'ad_description' => $this->buyer_property_ad_description,
            ]);

            $this->clearBuyerAdData();

            $this->emit('buyer-property-summernote');

            session()->flash('message', 'Buyer Property Advertisement Updated Successfully.');

            return redirect()->route('buyer_ad.details',['buyer_ad_id'=>$buyer_ad->id]);

        }
        elseif ($buyer_ad->ad_type == 'buyer-job') 
        {
            $this->validate([
                'buyer_job_ad_title' => 'required|min:5|max:20',
                'buyer_job_ad_category' => 'required',
                'buyer_job_ad_ex_district' => 'required',
                'buyer_job_ad_ex_job_type' => 'required',
                'buyer_job_ad_ex_education_level' => 'required',
                'buyer_job_ad_short_description' => 'required|min:80|max:200',
                'buyer_job_ad_description' => 'required|min:100',
            ]);

            $buyer_ad->update([
                'user_first_name' => $this->buyer_user_first_name,
                'user_last_name' => $this->buyer_user_last_name,
                'user_email' => $this->buyer_user_email,
                'user_phone_number' => $this->buyer_user_phone_number,
                'user_district' => $this->buyer_user_district,
                'ad_title' => $this->buyer_job_ad_title,
                'ad_category' => $this->buyer_job_ad_category,
                'ad_ex_district' => $this->buyer_job_ad_ex_district,
                'ad_ex_job_type' => $this->buyer_job_ad_ex_job_type,
                'ad_ex_education_level' => $this->buyer_job_ad_ex_education_level,
                'ad_short_description' => $this->buyer_job_ad_short_description,
                'ad_description' => $this->buyer_job_ad_description,
            ]);

            $this->clearBuyerAdData();

            $this->emit('buyer-job-summernote');

            session()->flash('message', 'Buyer Job Advertisement Updated Successfully.');

            return redirect()->route('buyer_ad.details',['buyer_ad_id'=>$buyer_ad->id]);

        }

    }

    public function render()
    {
        $general_categories = Category::where('ad_type', 'general')->get();
        $property_categories = Category::where('ad_type', 'property')->get();
        $job_categories = Category::where('ad_type', 'job')->get();
        
        return view('livewire.home.buyer-ad.buyer-ad-edit-component', ['general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
