<?php

namespace App\Http\Livewire\Home\SellerAd;

use App\Models\Category;
use App\Models\SellerAd;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class SellerAdEditComponent extends Component
{
    use WithFileUploads;

    public $seller_ad_id;
    public $seller_user_first_name;
    public $seller_user_last_name;
    public $seller_user_email;
    public $seller_user_phone_number;
    public $seller_user_district;
    public $seller_ad_type;
    public $seller_general_ad_title;
    public $seller_general_ad_category;
    public $seller_general_existing_ad_thumbnail_image;
    public $seller_general_ad_thumbnail_image;
    public $seller_general_existing_ad_other_images = [];
    public $seller_general_ad_other_images = [];
    public $seller_general_ad_condition;
    public $seller_general_ad_brand;
    public $seller_general_ad_model;
    public $seller_general_ad_price;
    public $seller_general_ad_short_description;
    public $seller_general_ad_description;
    public $seller_property_ad_title;
    public $seller_property_ad_category;
    public $seller_property_existing_ad_thumbnail_image;
    public $seller_property_ad_thumbnail_image;
    public $seller_property_existing_ad_other_images = [];
    public $seller_property_ad_other_images = [];
    public $seller_property_ad_property_address;
    public $seller_property_ad_condition;
    public $seller_property_ad_price;
    public $seller_property_ad_short_description;
    public $seller_property_ad_description;
    public $seller_job_ad_title;
    public $seller_job_ad_category;
    public $seller_job_existing_ad_thumbnail_image;
    public $seller_job_ad_thumbnail_image;
    public $seller_job_ad_job_type;
    public $seller_job_ad_work_address;
    public $seller_job_ad_salary;
    public $seller_job_ad_education_level;
    public $seller_job_ad_short_description;
    public $seller_job_ad_description;

    public function clearSellerAdData() {
        $this->seller_user_first_name = '';
        $this->seller_user_last_name = '';
        $this->seller_user_email = '';
        $this->seller_user_phone_number = '';
        $this->seller_user_district = '';
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

    public function mount($seller_ad_id)
    { 
        $this->seller_ad_id = $seller_ad_id;

        $seller_ad = SellerAd::where('id', $seller_ad_id)->first();

        $this->seller_user_first_name = $seller_ad->user_first_name;
        $this->seller_user_last_name = $seller_ad->user_last_name;
        $this->seller_user_email = $seller_ad->user_email;
        $this->seller_user_phone_number = $seller_ad->user_phone_number;
        $this->seller_user_district = $seller_ad->user_district;
        $this->seller_ad_type = $seller_ad->ad_type;

        if ($seller_ad->ad_type == 'seller-general') {
            
            $this->seller_general_ad_title = $seller_ad->ad_title;
            $this->seller_general_ad_category = $seller_ad->ad_category;
            $this->seller_general_existing_ad_thumbnail_image = $seller_ad->ad_thumbnail_image;
            $this->seller_general_existing_ad_other_images = $seller_ad->ad_images;
            $this->seller_general_ad_condition = $seller_ad->ad_condition;
            $this->seller_general_ad_brand = $seller_ad->ad_brand;
            $this->seller_general_ad_model = $seller_ad->ad_model;
            $this->seller_general_ad_price = $seller_ad->ad_price;
            $this->seller_general_ad_short_description = $seller_ad->ad_short_description;
            $this->seller_general_ad_description = $seller_ad->ad_description;
            
        }
        else if ($seller_ad->ad_type == 'seller-property') {

            $this->seller_property_ad_title = $seller_ad->ad_title;
            $this->seller_property_ad_category= $seller_ad->ad_category;
            $this->seller_property_existing_ad_thumbnail_image = $seller_ad->ad_thumbnail_image;
            $this->seller_property_existing_ad_other_images = $seller_ad->ad_images;
            $this->seller_property_ad_property_address = $seller_ad->ad_property_address;
            $this->seller_property_ad_condition = $seller_ad->ad_condition;
            $this->seller_property_ad_model = $seller_ad->ad_model;
            $this->seller_property_ad_price = $seller_ad->ad_price;
            $this->seller_property_ad_short_description = $seller_ad->ad_short_description;
            $this->seller_property_ad_description = $seller_ad->ad_description;

        }
        else if ($seller_ad->ad_type == 'seller-job') {

            $this->seller_job_ad_title = $seller_ad->ad_title;
            $this->seller_job_ad_category = $seller_ad->ad_category;
            $this->seller_job_existing_ad_thumbnail_image = $seller_ad->ad_thumbnail_image;
            $this->seller_job_ad_job_type = $seller_ad->ad_job_type;
            $this->seller_job_ad_work_address = $seller_ad->ad_work_address;
            $this->seller_job_ad_salary = $seller_ad->ad_salary;
            $this->seller_job_ad_education_level = $seller_ad->ad_education_level;
            $this->seller_job_ad_short_description = $seller_ad->ad_short_description;
            $this->seller_job_ad_description = $seller_ad->ad_description;
        }
    }

    public function updateSellerAd($seller_ad_id) {

        $seller_ad = SellerAd::find($seller_ad_id);

        $this->validate([
            'seller_user_first_name' => 'required|min:2',
            'seller_user_last_name' => 'required|min:2',
            'seller_user_email' => 'required|email',
            'seller_user_phone_number' => 'required|digits:10',
            'seller_user_district' => 'required',
        ]);
        
        if ($this->seller_ad_type == 'seller-general') {

            $new_seller_general_ad_thumbnail_image = $this->seller_general_ad_thumbnail_image;

            $new_seller_general_ad_other_images = $this->seller_general_ad_other_images;

            if ($new_seller_general_ad_thumbnail_image && $new_seller_general_ad_other_images) {

                if ($this->seller_general_ad_thumbnail_image) {
                    Storage::disk('public')->delete($this->seller_general_existing_ad_thumbnail_image);
                }

                if ($this->seller_general_ad_other_images) {
                    foreach (json_decode($this->seller_general_existing_ad_other_images) as $image) {
                        Storage::disk('public')->delete($image);
                    }
                }

                $this->validate([
                    'seller_general_ad_title' => 'required|min:5|max:20',
                    'seller_general_ad_category' => 'required',
                    'seller_general_ad_thumbnail_image' => 'required|image',
                    'seller_general_ad_other_images.*' => 'required|image',
                    'seller_general_ad_condition' => 'required',
                    'seller_general_ad_brand' => 'required',
                    'seller_general_ad_price' => 'required|numeric',
                    'seller_general_ad_short_description' => 'required|min:80|max:130',
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
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
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
    
                session()->flash('message', 'Seller General Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }
            else if ($new_seller_general_ad_thumbnail_image) {

                if ($this->seller_general_ad_thumbnail_image) {
                    Storage::disk('public')->delete($this->seller_general_existing_ad_thumbnail_image);
                }

                $this->validate([
                    'seller_general_ad_title' => 'required|min:5|max:20',
                    'seller_general_ad_category' => 'required',
                    'seller_general_ad_thumbnail_image' => 'required|image',
                    'seller_general_ad_condition' => 'required',
                    'seller_general_ad_brand' => 'required',
                    'seller_general_ad_price' => 'required|numeric',
                    'seller_general_ad_short_description' => 'required|min:80|max:130',
                    'seller_general_ad_description' => 'required|min:100',
                ]);
    
                $thumbnail_image = $this->seller_general_ad_thumbnail_image;
    
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
        
                        $new_seller_general_ad_thumbnail_image = 'images/general_ad/' . $fileNameToStore_thumbnail_image;
        
                

                }
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
                    'ad_title' =>$this->seller_general_ad_title,
                    'ad_category' =>$this->seller_general_ad_category,
                    'ad_thumbnail_image' =>$new_seller_general_ad_thumbnail_image,
                    'ad_condition' =>$this->seller_general_ad_condition,
                    'ad_brand' =>$this->seller_general_ad_brand,
                    'ad_model' =>$this->seller_general_ad_model,
                    'ad_price' =>$this->seller_general_ad_price,
                    'ad_short_description' =>$this->seller_general_ad_short_description,
                    'ad_description' =>$this->seller_general_ad_description,
                ]);
    
                $this->clearSellerAdData();
    
                $this->emit('seller-general-summernote');
    
                session()->flash('message', 'Seller General Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }
            else if ($new_seller_general_ad_other_images){

                if ($this->seller_general_ad_other_images) {
                    foreach (json_decode($this->seller_general_existing_ad_other_images) as $image) {
                        Storage::disk('public')->delete($image);
                    }
                }

                $this->validate([
                    'seller_general_ad_title' => 'required|min:5|max:20',
                    'seller_general_ad_category' => 'required',
                    'seller_general_ad_other_images.*' => 'required|image',
                    'seller_general_ad_condition' => 'required',
                    'seller_general_ad_brand' => 'required',
                    'seller_general_ad_price' => 'required|numeric',
                    'seller_general_ad_short_description' => 'required|min:80|max:130',
                    'seller_general_ad_description' => 'required|min:100',
                ]);
    
                $other_images = $this->seller_general_ad_other_images;
    
                if ($other_images) {

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
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
                    'ad_title' =>$this->seller_general_ad_title,
                    'ad_category' =>$this->seller_general_ad_category,
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
    
                session()->flash('message', 'Seller General Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);
                
            }
            else {

                $this->validate([
                    'seller_general_ad_title' => 'required|min:5|max:20',
                    'seller_general_ad_category' => 'required',
                    'seller_general_ad_condition' => 'required',
                    'seller_general_ad_brand' => 'required',
                    'seller_general_ad_price' => 'required|numeric',
                    'seller_general_ad_short_description' => 'required|min:80|max:130',
                    'seller_general_ad_description' => 'required|min:100',
                ]);
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
                    'ad_title' =>$this->seller_general_ad_title,
                    'ad_category' =>$this->seller_general_ad_category,
                    'ad_condition' =>$this->seller_general_ad_condition,
                    'ad_brand' =>$this->seller_general_ad_brand,
                    'ad_model' =>$this->seller_general_ad_model,
                    'ad_price' =>$this->seller_general_ad_price,
                    'ad_short_description' =>$this->seller_general_ad_short_description,
                    'ad_description' =>$this->seller_general_ad_description,
                ]);
    
                $this->clearSellerAdData();
    
                $this->emit('seller-general-summernote');
    
                session()->flash('message', 'Seller General Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }

        } 
        elseif ($this->seller_ad_type == 'seller-property') {

            $new_seller_property_ad_thumbnail_image = $this->seller_property_ad_thumbnail_image;

            $new_seller_property_ad_other_images = $this->seller_property_ad_other_images;

            if ($new_seller_property_ad_thumbnail_image && $new_seller_property_ad_other_images) {

                if ($this->seller_property_ad_thumbnail_image) {
                    Storage::disk('public')->delete($this->seller_property_existing_ad_thumbnail_image);
                }

                if ($this->seller_property_ad_other_images) {
                    foreach (json_decode($this->seller_property_existing_ad_other_images) as $image) {
                        Storage::disk('public')->delete($image);
                    }
                }

                $this->validate([
                    'seller_property_ad_title' => 'required|min:5|max:20',
                    'seller_property_ad_category' => 'required',
                    'seller_property_ad_thumbnail_image' => 'required|image',
                    'seller_property_ad_other_images.*' => 'required|image',
                    'seller_property_ad_property_address' => 'required|min:5',
                    'seller_property_ad_condition' => 'required',
                    'seller_property_ad_price' => 'required|numeric',
                    'seller_property_ad_short_description' => 'required|min:80|max:130',
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
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
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
    
                session()->flash('message', 'Seller Property Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }
            else if ($new_seller_property_ad_thumbnail_image) {

                if ($this->seller_property_ad_thumbnail_image) {
                    Storage::disk('public')->delete($this->seller_property_existing_ad_thumbnail_image);
                }

                $this->validate([
                    'seller_property_ad_title' => 'required|min:5|max:20',
                    'seller_property_ad_category' => 'required',
                    'seller_property_ad_thumbnail_image' => 'required|image',
                    'seller_property_ad_property_address' => 'required|min:5',
                    'seller_property_ad_condition' => 'required',
                    'seller_property_ad_price' => 'required|numeric',
                    'seller_property_ad_short_description' => 'required|min:80|max:130',
                    'seller_property_ad_description' => 'required|min:100',
                ]);
    
                $thumbnail_image = $this->seller_property_ad_thumbnail_image;
    
                if($thumbnail_image)
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
    
                }
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
                    'ad_title' =>$this->seller_property_ad_title,
                    'ad_category' =>$this->seller_property_ad_category,
                    'ad_thumbnail_image' =>$new_seller_property_ad_thumbnail_image,
                    'ad_condition' =>$this->seller_property_ad_condition,
                    'ad_property_address' =>$this->seller_property_ad_property_address,
                    'ad_price' =>$this->seller_property_ad_price,
                    'ad_short_description' =>$this->seller_property_ad_short_description,
                    'ad_description' =>$this->seller_property_ad_description,
                ]);
    
                $this->clearSellerAdData();
    
                $this->emit('seller-property-summernote');
    
                session()->flash('message', 'Seller Property Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }
            else if ($new_seller_property_ad_other_images) {

                if ($this->seller_property_ad_other_images) {
                    foreach (json_decode($this->seller_property_existing_ad_other_images) as $image) {
                        Storage::disk('public')->delete($image);
                    }
                }

                $this->validate([
                    'seller_property_ad_title' => 'required|min:5|max:20',
                    'seller_property_ad_category' => 'required',
                    'seller_property_ad_other_images.*' => 'required|image',
                    'seller_property_ad_property_address' => 'required|min:5',
                    'seller_property_ad_condition' => 'required',
                    'seller_property_ad_price' => 'required|numeric',
                    'seller_property_ad_short_description' => 'required|min:80|max:130',
                    'seller_property_ad_description' => 'required|min:100',
                ]);
    
                $other_images = $this->seller_property_ad_other_images;
    
                if($other_images)
                {
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
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
                    'ad_title' =>$this->seller_property_ad_title,
                    'ad_category' =>$this->seller_property_ad_category,
                    'ad_images' =>$new_seller_property_ad_other_images,
                    'ad_condition' =>$this->seller_property_ad_condition,
                    'ad_property_address' =>$this->seller_property_ad_property_address,
                    'ad_price' =>$this->seller_property_ad_price,
                    'ad_short_description' =>$this->seller_property_ad_short_description,
                    'ad_description' =>$this->seller_property_ad_description,
                ]);
    
                $this->clearSellerAdData();
    
                $this->emit('seller-property-summernote');
    
                session()->flash('message', 'Seller Property Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }
            else {

                $this->validate([
                    'seller_property_ad_title' => 'required|min:5|max:20',
                    'seller_property_ad_category' => 'required',
                    'seller_property_ad_property_address' => 'required|min:5',
                    'seller_property_ad_condition' => 'required',
                    'seller_property_ad_price' => 'required|numeric',
                    'seller_property_ad_short_description' => 'required|min:80|max:130',
                    'seller_property_ad_description' => 'required|min:100',
                ]);
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
                    'ad_title' =>$this->seller_property_ad_title,
                    'ad_category' =>$this->seller_property_ad_category,
                    'ad_condition' =>$this->seller_property_ad_condition,
                    'ad_property_address' =>$this->seller_property_ad_property_address,
                    'ad_price' =>$this->seller_property_ad_price,
                    'ad_short_description' =>$this->seller_property_ad_short_description,
                    'ad_description' =>$this->seller_property_ad_description,
                ]);
    
                $this->clearSellerAdData();
    
                $this->emit('seller-property-summernote');
    
                session()->flash('message', 'Seller Property Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }

        }
        elseif ($this->seller_ad_type == 'seller-job') {

            $new_seller_job_ad_thumbnail_image = $this->seller_job_ad_thumbnail_image;

            if ($new_seller_job_ad_thumbnail_image) {

                if ($this->seller_job_existing_ad_thumbnail_image) {
                    Storage::disk('public')->delete($this->seller_job_existing_ad_thumbnail_image);
                }

                $this->validate([
                    'seller_job_ad_title' => 'required|min:5|max:20',
                    'seller_job_ad_category' => 'required',
                    'seller_job_ad_thumbnail_image' => 'required|image',
                    'seller_job_ad_job_type' => 'required',
                    'seller_job_ad_work_address' => 'required|min:5',
                    'seller_job_ad_salary' => 'required|numeric',
                    'seller_job_ad_education_level' => 'required',
                    'seller_job_ad_short_description' => 'required|min:80|max:130',
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
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
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
    
                session()->flash('message', 'Seller Job Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }
            else {

                $this->validate([
                    'seller_job_ad_title' => 'required|min:5|max:20',
                    'seller_job_ad_category' => 'required',
                    'seller_job_ad_job_type' => 'required',
                    'seller_job_ad_work_address' => 'required|min:5',
                    'seller_job_ad_salary' => 'required|numeric',
                    'seller_job_ad_education_level' => 'required',
                    'seller_job_ad_short_description' => 'required|min:80|max:130',
                    'seller_job_ad_description' => 'required|min:100',
                ]);
    
                $seller_ad->update([
                    'user_first_name' =>$this->seller_user_first_name,
                    'user_last_name' =>$this->seller_user_last_name,
                    'user_email' =>$this->seller_user_email,
                    'user_phone_number' =>$this->seller_user_phone_number,
                    'user_district' =>$this->seller_user_district,
                    'ad_title' =>$this->seller_job_ad_title,
                    'ad_category' =>$this->seller_job_ad_category,
                    'ad_job_type' =>$this->seller_job_ad_job_type,
                    'ad_work_address' =>$this->seller_job_ad_work_address,
                    'ad_salary' =>$this->seller_job_ad_salary,
                    'ad_education_level' =>$this->seller_job_ad_education_level,
                    'ad_short_description' =>$this->seller_job_ad_short_description,
                    'ad_description' =>$this->seller_job_ad_description,
                ]);
    
                $this->clearSellerAdData();
    
                $this->emit('seller-job-summernote');
    
                session()->flash('message', 'Seller Job Advertisement Updated Successfully.');
    
                return redirect()->route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]);

            }   

        }
    }

    public function render()
    {
        $general_categories = Category::where('ad_type', 'general')->get();
        $property_categories = Category::where('ad_type', 'property')->get();
        $job_categories = Category::where('ad_type', 'job')->get();

        return view('livewire.home.seller-ad.seller-ad-edit-component', ['general_categories'=>$general_categories, 'property_categories'=>$property_categories, 'job_categories'=>$job_categories])->layout('layouts.base');
    }
}
