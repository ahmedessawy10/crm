<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeroSection extends Model
{
    use HasTranslations;

    protected $fillable = ["title", "content", "image1", "image2", "image3", "image4"];

    public $translatable = ['title', "content"];

}
