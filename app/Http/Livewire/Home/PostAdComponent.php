<?php

namespace App\Http\Livewire\Home;

use App\Models\BuyerAd;
use App\Models\Category;
use App\Models\SellerAd;
use Illuminate\Support\Facades\Auth;
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

    public function clearSellerAdData() {
        $this->seller_user_first_name = '';
        $this->seller_user_last_name = '';
        $this->seller_user_email = '';
        $this->seller_user_phone_number = '';
        $this->seller_user_district = '';
        $this->seller_ad_type = '';
        $this->seller_general_ad_title = '';
        $this->seller_general_ad_category = '';
        $this->seller_general_ad_thumbnail_image = '';
        $this->seller_general_ad_other_images = '';
        $this->seller_general_ad_condition = '';
        $this->seller_general_ad_brand = '';
        $this->seller_general_ad_model = '';
        $this->seller_general_ad_price = '';
        $this->seller_general_ad_short_description = '';
        $this->seller_general_ad_description = '';
        $this->seller_property_ad_title = '';
        $this->seller_property_ad_category = '';
        $this->seller_property_ad_thumbnail_image = '';
        $this->seller_property_ad_other_images = '';
        $this->seller_property_ad_property_address = '';
        $this->seller_property_ad_condition = '';
        $this->seller_property_ad_price = '';
        $this->seller_property_ad_short_description = '';
        $this->seller_property_ad_description = '';
        $this->seller_job_ad_title = '';
        $this->seller_job_ad_category = '';
        $this->seller_job_ad_thumbnail_image = '';
        $this->seller_job_ad_job_type = '';
        $this->seller_job_ad_work_address = '';
        $this->seller_job_ad_salary = '';
        $this->seller_job_ad_education_level = '';
        $this->seller_job_ad_short_description = '';
        $this->seller_job_ad_description = '';
    }

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

    public function submitSellerAd(){

        $this->validate([
            'seller_user_first_name' => 'required|min:2',
            'seller_user_last_name' => 'required|min:2',
            'seller_user_email' => 'required|email',
            'seller_user_phone_number' => 'required|digits:10',
            'seller_user_district' => 'required',
            'seller_ad_type' => 'required',
        ]);
        
        if ($this->seller_ad_type == 'seller-general') {

            $this->validate([
                'seller_general_ad_title' => 'required|min:5',
                'seller_general_ad_category' => 'required',
                'seller_general_ad_thumbnail_image' => 'required|image',
                'seller_general_ad_other_images.*' => 'required|image',
                'seller_general_ad_condition' => 'required',
                'seller_general_ad_brand' => 'required',
                'seller_general_ad_model' => 'required',
                'seller_general_ad_price' => 'required|numeric',
                'seller_general_ad_short_description' => 'required|max:130',
                'seller_general_ad_description' => 'required|min:100',
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

                $new_seller_general_ad_thumbnail_image = 'images/general_ad/' . $fileNameToStore_thumbnail_image;


                // for other images
                $other_images_array = array();

                foreach ($this->seller_general_ad_other_images as $image) {
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

                    Storage::put("public/images/general_ad/{$fileNameToStore_image}", $resize_image->__toString());
                    
                    $other_images_array[] = 'images/general_ad/' . $fileNameToStore_image; 
                }
                $new_seller_general_ad_other_images = json_encode($other_images_array);
            }

            SellerAd::create([
                'user_id' => Auth::user()->id,
                'user_first_name' =>$this->seller_user_first_name,
                'user_last_name' =>$this->seller_user_last_name,
                'user_email' =>$this->seller_user_email,
                'user_phone_number' =>$this->seller_user_phone_number,
                'user_district' =>$this->seller_user_district,
                'ad_type' =>$this->seller_ad_type,
                'ad_title' =>$this->seller_general_ad_title,
                'ad_category' =>$this->seller_general_ad_category,
                'ad_thumbnail_image' =>$new_seller_general_ad_thumbnail_image,
                'ad_images' =>$new_seller_general_ad_other_images,
                'ad_condition' =>$this->seller_general_ad_condition,
                'ad_brand' =>$this->seller_general_ad_brand,
                'ad_model' =>$this->seller_general_ad_model,
                'ad_price' =>$this->seller_general_ad_price,
                'ad_short_description' =>$this->seller_general_ad_short_description,
                'ad_description' =>$this->seller_general_ad_description,
            ]);

            $this->clearSellerAdData();

            $this->emit('seller-general-summernote');

            $this->emit('alert', ['type' => 'success', 'message' => 'Seller General Advertisement Created Successfully.']);

        } 
        elseif ($this->seller_ad_type == 'seller-property') {

            $this->validate([
                'seller_property_ad_title' => 'required|min:5',
                'seller_property_ad_category' => 'required',
                'seller_property_ad_thumbnail_image' => 'required|image',
                'seller_property_ad_other_images.*' => 'required|image',
                'seller_property_ad_property_address' => 'required|min:5',
                'seller_property_ad_condition' => 'required',
                'seller_property_ad_price' => 'required|numeric',
                'seller_property_ad_short_description' => 'required|max:130',
                'seller_property_ad_description' => 'required|min:100',
            ]);

            $thumbnail_image = $this->seller_property_ad_thumbnail_image;
            $other_images = $this->seller_property_ad_other_images;

            if($thumbnail_image && $other_images)
            {
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

                $new_seller_property_ad_thumbnail_image = 'images/general_ad/' . $fileNameToStore_thumbnail_image;


                // for other images
                $other_images = array();
                
                foreach ($this->seller_property_ad_other_images as $image) {
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

                    Storage::put("public/images/general_ad/{$fileNameToStore_image}", $resize_image->__toString());

                    $other_images[] = 'images/general_ad/' . $fileNameToStore_image; 
                }
                $new_seller_property_ad_other_images = json_encode($other_images);
            }

            SellerAd::create([
                'user_id' => Auth::user()->id,
                'user_first_name' =>$this->seller_user_first_name,
                'user_last_name' =>$this->seller_user_last_name,
                'user_email' =>$this->seller_user_email,
                'user_phone_number' =>$this->seller_user_phone_number,
                'user_district' =>$this->seller_user_district,
                'ad_type' =>$this->seller_ad_type,
                'ad_title' =>$this->seller_property_ad_title,
                'ad_category' =>$this->seller_property_ad_category,
                'ad_thumbnail_image' =>$new_seller_property_ad_thumbnail_image,
                'ad_images' =>$new_seller_property_ad_other_images,
                'ad_condition' =>$this->seller_property_ad_condition,
                'ad_property_address' =>$this->seller_property_ad_property_address,
                'ad_price' =>$this->seller_property_ad_price,
                'ad_short_description' =>$this->seller_property_ad_short_description,
                'ad_description' =>$this->seller_property_ad_description,
            ]);

            $this->clearSellerAdData();

            $this->emit('seller-property-summernote');

            $this->emit('alert', ['type' => 'success', 'message' => 'Seller Property Advertisement Created Successfully.']);

        }
        elseif ($this->seller_ad_type == 'seller-job') {

            $this->validate([
                'seller_job_ad_title' => 'required|min:5',
                'seller_job_ad_category' => 'required',
                'seller_job_ad_thumbnail_image' => 'required|image',
                'seller_job_ad_job_type' => 'required',
                'seller_job_ad_work_address' => 'required|min:5',
                'seller_job_ad_salary' => 'required|numeric',
                'seller_job_ad_education_level' => 'required',
                'seller_job_ad_short_description' => 'required|max:130',
                'seller_job_ad_description' => 'required|min:100',
            ]);

            $thumbnail_image = $this->seller_job_ad_thumbnail_image;

            if ($thumbnail_image) {

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

                 $new_seller_job_ad_thumbnail_image = 'images/general_ad/' . $fileNameToStore_thumbnail_image;
            }

            SellerAd::create([
                'user_id' => Auth::user()->id,
                'user_first_name' =>$this->seller_user_first_name,
                'user_last_name' =>$this->seller_user_last_name,
                'user_email' =>$this->seller_user_email,
                'user_phone_number' =>$this->seller_user_phone_number,
                'user_district' =>$this->seller_user_district,
                'ad_type' =>$this->seller_ad_type,
                'ad_title' =>$this->seller_job_ad_title,
                'ad_category' =>$this->seller_job_ad_category,
                'ad_thumbnail_image' =>$new_seller_job_ad_thumbnail_image,
                'ad_job_type' =>$this->seller_job_ad_job_type,
                'ad_work_address' =>$this->seller_job_ad_work_address,
                'ad_salary' =>$this->seller_job_ad_salary,
                'ad_education_level' =>$this->seller_job_ad_education_level,
                'ad_short_description' =>$this->seller_job_ad_short_description,
                'ad_description' =>$this->seller_job_ad_description,
            ]);

            $this->clearSellerAdData();

            $this->emit('seller-job-summernote');

            $this->emit('alert', ['type' => 'success', 'message' => 'Seller Job Advertisement Created Successfully.']);

        }
    }


    public function submitBuyerAd(){

        $this->validate([
            'buyer_user_first_name' => 'required|min:2',
            'buyer_user_last_name' => 'required|min:2',
            'buyer_user_email' => 'required|email',
            'buyer_user_phone_number' => 'required|digits:10',
            'buyer_user_district' => 'required',
            'buyer_ad_type' => 'required',
        ]);

        if ($this->buyer_ad_type == 'buyer-general') {
            
            $this->validate([
                'buyer_general_ad_title' => 'required|min:5',
                'buyer_general_ad_category' => 'required',
                'buyer_general_ad_brand' => 'required',
                'buyer_general_ad_model' => 'required',
                'buyer_general_ad_ex_min_price' => 'required|numeric',
                'buyer_general_ad_ex_max_price' => 'required|numeric',
                'buyer_general_ad_short_description' => 'required|max:130',
                'buyer_general_ad_description' => 'required|min:100',
            ]);

            BuyerAd::create([
                'user_id' => Auth::user()->id,
                'user_first_name' => $this->buyer_user_first_name,
                'user_last_name' => $this->buyer_user_last_name,
                'user_email' => $this->buyer_user_email,
                'user_phone_number' => $this->buyer_user_phone_number,
                'user_district' => $this->buyer_user_district,
                'ad_type' => $this->buyer_ad_type,
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

            $this->emit('alert', ['type' => 'success', 'message' => 'Buyer General Advertisement Created Successfully.']);

        } 
        elseif ($this->buyer_ad_type == 'buyer-property') 
        {
            $this->validate([
                'buyer_property_ad_title' => 'required|min:5',
                'buyer_property_ad_category' => 'required',
                'buyer_property_ad_ex_district' => 'required',
                'buyer_property_ad_ex_min_price' => 'required|numeric',
                'buyer_property_ad_ex_max_price' => 'required|numeric',
                'buyer_property_ad_short_description' => 'required|max:130',
                'buyer_property_ad_description' => 'required|min:100',
            ]); 
            
            BuyerAd::create([
                'user_id' => Auth::user()->id,
                'user_first_name' => $this->buyer_user_first_name,
                'user_last_name' => $this->buyer_user_last_name,
                'user_email' => $this->buyer_user_email,
                'user_phone_number' => $this->buyer_user_phone_number,
                'user_district' => $this->buyer_user_district,
                'ad_type' => $this->buyer_ad_type,
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

            $this->emit('alert', ['type' => 'success', 'message' => 'Buyer Property Advertisement Created Successfully.']);

        }
        elseif ($this->buyer_ad_type == 'buyer-job') 
        {
            $this->validate([
                'buyer_job_ad_title' => 'required|min:5',
                'buyer_job_ad_category' => 'required',
                'buyer_job_ad_ex_district' => 'required',
                'buyer_job_ad_ex_job_type' => 'required',
                'buyer_job_ad_ex_education_level' => 'required',
                'buyer_job_ad_short_description' => 'required|max:130',
                'buyer_job_ad_description' => 'required|min:100',
            ]);

            BuyerAd::create([
                'user_id' => Auth::user()->id,
                'user_first_name' => $this->buyer_user_first_name,
                'user_last_name' => $this->buyer_user_last_name,
                'user_email' => $this->buyer_user_email,
                'user_phone_number' => $this->buyer_user_phone_number,
                'user_district' => $this->buyer_user_district,
                'ad_type' => $this->buyer_ad_type,
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

            $this->emit('alert', ['type' => 'success', 'message' => 'Buyer Job Advertisement Created Successfully.']);

        }
        
    }

    public function render()
    {

        $general_categories = Category::where('ad_type', 'general')->get();
        $property_categories = Category::where('ad_type', 'property')->get();
        $job_categories = Category::where('ad_type', 'job')->get();

        return view('livewire.home.post-ad-component', ['general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
