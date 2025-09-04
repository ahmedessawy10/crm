<?php
namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Artical extends Model
{
    use HasTranslations;
    protected $fillable = ["image", 'title', "content", "program_id"];

    public $translatable = ['title', "content"];

    public function program()
    {
        $this->belongsTo(Program::class, "program_id");
    }
}
