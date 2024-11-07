<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Model;

class Nationalitie extends Model
{
    use HasTranslations;
    //لترجمة الحقل
    public $translatable = ['Name'];
    protected $fillable =['Name'];
}
