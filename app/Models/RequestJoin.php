<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestJoin extends Model
{
    protected $fillable = [
        'brand_name',
        'email',
        'phone',
        'website_url',
        'note',
        'is_read',
    ];

}
