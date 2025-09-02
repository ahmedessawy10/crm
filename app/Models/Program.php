<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Program extends Model
{
    use HasTranslations;
    protected $fillable  = ["image", 'name', "description"];
    public $translatable = ['name', "description"];

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
