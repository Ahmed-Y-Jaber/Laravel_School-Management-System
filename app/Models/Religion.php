<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use HasTranslations;
    //لترجمة الحقل
    public $translatable = ['Name'];
    protected $fillable =['Name'];
}
