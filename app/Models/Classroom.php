<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{

    protected $table = 'Classrooms';
    public $timestamps = true;

    protected $fillable=['Name_Class','Grade_id'];


    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
        //relation ont to many
        // يتم تسجيل العلاقة هنا حتى يظهر اسم المرحلة وليس فقط الرقم
    }



    use HasTranslations;

    public $translatable = ['Name_Class'];
    // الحقل الذي يستخدم الترجمة




}
