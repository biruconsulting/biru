<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerAd extends Model
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
        'ad_title',
        'ad_category',
        'ad_ex_district',
        'ad_brand',
        'ad_model',
        'ad_ex_min_price',
        'ad_ex_max_price',
        'ad_ex_job_type',
        'ad_ex_education_level',
        'ad_short_description',
        'ad_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
