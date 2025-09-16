<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Report extends Model
{

    use HasTranslations;

    protected $fillable = [
        "title",
        "file",
        "description",
    ];
    public $translatable = ["description", "title"];

}
