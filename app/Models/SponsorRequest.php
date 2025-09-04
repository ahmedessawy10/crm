<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorRequest extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'note',
        'is_read',
    ];

}
