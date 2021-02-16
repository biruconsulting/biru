<?php

namespace App\Http\Controllers;

use App\Models\SellerAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SellerAdPostController extends Controller
{
    public function store(Request $request)
    {
        if ($request->seller_ad_type == 'seller-general') {

            $request->validate([
                'seller_user_first_name' => 'required',
                'seller_user_last_name' => 'required',
                'seller_user_email' => 'required',
                'seller_user_phone_number' => 'required',
                'seller_user_district' => 'required',
                'seller_ad_type' => 'required',
                'seller_general_ad_title' => 'required',
                'seller_general_ad_category' => 'required',
                'seller_general_ad_thumbnail_image' => 'required',
                'seller_general_ad_other_images' => 'required',
                'seller_general_ad_condition' => 'required',
                'seller_general_ad_brand' => 'required',
                'seller_general_ad_model' => 'required',
                'seller_general_ad_price' => 'required',
                'seller_general_ad_short_description' => 'required',
                'seller_general_ad_description' => 'required',
            ]);
            
            if($request->hasFile('seller_general_ad_thumbnail_image') && $request->hasFile('seller_general_ad_other_images'))
            {
                // for thumbnail image 
                $thumbnail_image = $request->file('seller_general_ad_thumbnail_image');
                
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
                $request->seller_general_ad_thumbnail_image = 'images/general_ad/' . $fileNameToStore_thumbnail_image;


                // for other images
                foreach ($request->seller_general_ad_other_images as $image) {
                    $other_images = array();
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
                $request->seller_general_ad_other_images = json_encode($other_images);
            }

            SellerAd::create([
                'user_id' => Auth::user()->id,
                'user_first_name' =>$request->seller_user_first_name,
                'user_last_name' =>$request->seller_user_last_name,
                'user_email' =>$request->seller_user_email,
                'user_phone_number' =>$request->seller_user_phone_number,
                'user_district' =>$request->seller_user_district,
                'ad_type' =>$request->seller_ad_type,
                'ad_title' =>$request->seller_general_ad_title,
                'ad_category' =>$request->seller_general_ad_category,
                'ad_thumbnail_image' =>$request->seller_general_ad_thumbnail_image,
                'ad_images' =>$request->seller_general_ad_other_images,
                'ad_condition' =>$request->seller_general_ad_condition,
                'ad_brand' =>$request->seller_general_ad_brand,
                'ad_model' =>$request->seller_general_ad_model,
                'ad_price' =>$request->seller_general_ad_price,
                'ad_short_description' =>$request->seller_general_ad_short_description,
                'ad_description' =>$request->seller_general_ad_description,
            ]);

            $notification = array(
                'message' => 'Seller Advertisement Posted Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

    }
}
