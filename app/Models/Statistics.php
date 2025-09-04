<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistics extends Model
{
    use HasTranslations;
    public $fillable = ["title", "number", "icon"];

    public $translatable = ["title"];
}
