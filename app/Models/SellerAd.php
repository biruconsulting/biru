<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_first_name',
        'user_last_name',
        'user_email',
        'user_phone_number',
        'user_district',
        'ad_available',
        'ad_type',
        'ad_name',
        'ad_category',
        'ad_thumbnail_image',
        'ad_images',
        'ad_condition',
        'ad_property_address',
        'ad_brand',
        'ad_model',
        'ad_price',
        'ad_job_type',
        'ad_work_address',
        'ad_salary',
        'ad_education_level',
        'ad_short_description',
        'ad_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
