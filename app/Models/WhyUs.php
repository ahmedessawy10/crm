<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WhyUs extends Model
{
    use HasTranslations;
    public $fillable = ["title", "content", "icon"];

    public $translatable = ["title", "content"];

}
