<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Artical extends Model
{
    use HasTranslations;
    protected $fillable = ["image"];

    public $translatable = ['title', "content"];

    public function program()
    {
        $this->belongsTo(Program::class, "programe_id");
    }
}
