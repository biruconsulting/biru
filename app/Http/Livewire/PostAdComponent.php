<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SellerAd;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class PostAdComponent extends Component
{
    use WithFileUploads;

    // Seller Ad form
    public $seller_user_first_name;
    public $seller_user_last_name;
    public $seller_user_email;
    public $seller_user_phone_number;
    public $seller_user_district;
    public $seller_ad_type;
    public $seller_general_ad_title;
    public $seller_general_ad_category;
    public $seller_general_ad_thumbnail_image;
    public $seller_general_ad_other_images = [];
    public $seller_general_ad_condition;
    public $seller_general_ad_brand;
    public $seller_general_ad_model;
    public $seller_general_ad_price;
    public $seller_general_ad_short_description;
    public $seller_general_ad_description;
    public $seller_property_ad_title;
    public $seller_property_ad_category;
    public $seller_property_ad_thumbnail_image;
    public $seller_property_ad_other_images;
    public $seller_property_ad_property_address;
    public $seller_property_ad_condition;
    public $seller_property_ad_price;
    public $seller_property_ad_short_description;
    public $seller_property_ad_description;
    public $seller_job_ad_title;
    public $seller_job_ad_category;
    public $seller_job_ad_thumbnail_image;
    public $seller_job_ad_job_type;
    public $seller_job_ad_work_address;
    public $seller_job_ad_salary;
    public $seller_job_ad_education_level;
    public $seller_job_ad_short_description;
    public $seller_job_ad_description;

    // Buyer Ad form
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

    public function submitSellerAd(){

        if ($this->seller_ad_type == 'seller-general') {

            $this->validate([
                'seller_user_first_name' => 'required',
                'seller_user_last_name' => 'required',
                'seller_user_email' => 'required',
                'seller_user_phone_number' => 'required',
                'seller_user_district' => 'required',
                'seller_ad_type' => 'required',
                'seller_general_ad_title' => 'required',
                'seller_general_ad_category' => 'required',
                'seller_general_ad_thumbnail_image' => 'required|image',
                'seller_general_ad_other_images.*' => 'required|image',
                'seller_general_ad_condition' => 'required',
                'seller_general_ad_brand' => 'required',
                'seller_general_ad_model' => 'required',
                'seller_general_ad_price' => 'required',
                'seller_general_ad_short_description' => 'required',
                'seller_general_ad_description' => 'required',
            ]);

            $thumbnail_image = $this->seller_general_ad_thumbnail_image;
            $other_images = $this->seller_general_ad_other_images;

            if ($thumbnail_image && $other_images) {
                // for thumbnail image 
                // Get filename with extension
                $filenameWithExt_thumbnail_image = $thumbnail_image->getClientOriginalName();

                // Get file path
                $filename_thumbnail_image = pathinfo($filenameWithExt_thumbnail_image, PATHINFO_FILENAME);

                // Remove unwanted characters
                $filename_thumbnail_image = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_thumbnail_image);
                $filename_thumbnail_image = preg_replace("/\s+/", '-', $filename_thumbnail_image);

                // Get the original image extension
                $extension_thumbnail_image = $thumbnail_image->getClientOriginalExtension();

                // Create unique file name
                $fileNameToStore_thumbnail_image = $filename_thumbnail_image . '_' . time() . '.' . $extension_thumbnail_image;

                $resize_thumbnail_image = Image::make($thumbnail_image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                Storage::put("public/images/general_ad/{$fileNameToStore_thumbnail_image}", $resize_thumbnail_image->__toString());
                $this->seller_general_ad_thumbnail_image = 'images/general_ad/' . $fileNameToStore_thumbnail_image;


                // for other images
                foreach ($this->seller_general_ad_other_images as $key => $image) {
                    // Get filename with extension
                    $filenameWithExt_image = $image->getClientOriginalName();

                    // Get file path
                    $filename_image = pathinfo($filenameWithExt_image, PATHINFO_FILENAME);

                    // Remove unwanted characters
                    $filename_image = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_image);
                    $filename_image = preg_replace("/\s+/", '-', $filename_image);

                    // Get the original image extension
                    $extension_image = $image->getClientOriginalExtension();

                    // Create unique file name
                    $fileNameToStore_image = $filename_image . '_' . time() . '.' . $extension_image;

                    $resize_image = Image::make($image)->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('jpg');
                    $this->seller_general_ad_other_images[$key] = Storage::put("public/images/general_ad/{$fileNameToStore_image}", $resize_image->__toString());
                    // $this->seller_general_ad_other_images[$key] = 'images/general_ad/' . $fileNameToStore_image; 
                }
                $this->seller_general_ad_other_images = json_encode($this->seller_general_ad_other_images);
            }

            SellerAd::create([
                'user_id' => '2',
                'user_first_name' =>$this->seller_user_first_name,
                'user_last_name' =>$this->seller_user_last_name,
                'user_email' =>$this->seller_user_email,
                'user_phone_number' =>$this->seller_user_phone_number,
                'user_district' =>$this->seller_user_district,
                'ad_type' =>$this->seller_ad_type,
                'ad_title' =>$this->seller_general_ad_title,
                'ad_category' =>$this->seller_general_ad_category,
                'ad_thumbnail_image' =>$this->seller_general_ad_thumbnail_image,
                'ad_images' =>$this->seller_general_ad_other_images,
                'ad_condition' =>$this->seller_general_ad_condition,
                'ad_brand' =>$this->seller_general_ad_brand,
                'ad_model' =>$this->seller_general_ad_model,
                'ad_price' =>$this->seller_general_ad_price,
                'ad_short_description' =>$this->seller_general_ad_short_description,
                'ad_description' =>$this->seller_general_ad_description,
            ]);

            $this->emit('alert', ['type' => 'success', 'message' => 'Seller Advertisement Created Successfully.']);
        } 
        elseif ($this->seller_ad_type == 'seller-properties') {
            # code...
        }
        elseif ($this->seller_ad_type == 'seller-job') {

        }
    }

    public function submitBuyerAd(){

    }

    public function render()
    {
        $general_categories = Category::where('ad_type', 'general')->get();
        $property_categories = Category::where('ad_type', 'property')->get();
        $job_categories = Category::where('ad_type', 'job')->get();

        return view('livewire.post-ad-component', ['general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
