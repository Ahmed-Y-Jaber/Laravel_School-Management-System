<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_Parent extends Model
{
    // لترجمة الحقول المطلوبة

    use HasTranslations;
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
    protected $table = 'my__parents';
    protected $guarded=[];

   /*  $guarded
     بدل ما اكتب protected $fillable
     لكل حقل في كافة الجدول
     لذلك نستخدم
     $guarded
     المقصود بها ادخال وتعديل جميع الحقول
    تستخدم عندما يكون حقول كثيرة واريد اختصر الكتابة
    */
}
