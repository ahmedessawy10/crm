<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    protected $fillable = [
        'logo',
        'app_name',
        'default_language',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'instagram_url',
        'snapchat_url',
        'about_us',
        'about_us_image',
        'why_us',
        'why_us_image',
        'address',
        'phone',
        'email',
    ];

    public $translatable = ['app_name', 'about_us', 'address', 'why_us'];
}
