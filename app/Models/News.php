<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasTranslations;

    protected $fillable = [
        "title",
        "content",
        "image",
        "link",
    ];

    public $translatable = ['title', "content"];

}
