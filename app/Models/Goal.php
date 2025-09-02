<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Goal extends Model
{
    use HasTranslations;
    protected $fillable = ["icon", 'program_id', 'title', "content"];

    public $translatable = ['title', "content"];

    public function program()
    {
        $this->belongsTo(Program::class, "programe_id");
    }
}
