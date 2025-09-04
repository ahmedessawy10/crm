<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sponsor extends Model
{

    use HasTranslations;
    protected $fillable = ["name", "image", "is_active"];

    public $translatable = ['name'];
}
