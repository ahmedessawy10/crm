<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DayActivity extends Model
{
    use HasTranslations;
    protected $fillable = ["number", "content"];

    public $translatable = ["content"];

    public function program()
    {
        $this->belongsTo(Program::class, "programe_id");
    }
}
