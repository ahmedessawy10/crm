<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;
    protected $fillable = ['logo', 'app_name', 'about_us', 'default_language'];

    public $translatable = ['app_name', 'about_us'];

    public function settings()
    {
        return $this->hasOne(Setting::class, "id");
    }

}
