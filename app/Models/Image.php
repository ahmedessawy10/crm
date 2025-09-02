<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Image extends Model
{
    use HasTranslations;
    protected $fillable = ["image", 'program_id', 'title'];

    public $translatable = ['title'];

    public function program()
    {
        $this->belongsTo(Program::class, "programe_id");
    }
}
