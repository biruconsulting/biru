<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_logo',
        'site_about_us',
        'site_contact_num',
        'site_email',
        'site_location',
    ];
}
