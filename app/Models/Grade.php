<?php

//  namespace Grade;
//  لاننا ادخلنا ال grade بداخل مجلد يجب تغييرها الى
// ثم من
// GradeController
// use app\models\Grade;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class Grade extends Model
{

    use HasTranslations;

    public $translatable = ['Name']; // الحقل الذي يستخدم الترجمة

    protected $fillable=['Name','Notes'];
    //عشان اسمح للداتا انها تدخل

    protected $table = 'Grades';
    public $timestamps = true;


      // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة

      public function Sections()
      {
          return $this->hasMany('App\Models\Section', 'Grade_id');
      }

}
