<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProgramFag extends Model
{
    use HasTranslations;
    protected $fillable = ["question", "answer", "program_id"];

    public $translatable = ["question", "answer"];

}
