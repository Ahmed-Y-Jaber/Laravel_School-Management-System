<?php

namespace App\Http\Controllers;

use App\Models\My_Parent;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        return view('dashboard');
    }


    // public function index()
    // {
    //     // $x = Student::count();
    //     // return view('dashboard' , compact ('x'));

    //     //في حالة كان عدة متغيرات نريد ارجاعها في الكومباكت نضعها في مصفوفة مثل الطريقة التالية
    //     // ثم ننادي عليها ب su
    //     // او tt


    //     $data['su'] = Student::count();
    //     $data['tt'] = Teacher::count();
    //     $data['yy'] = My_Parent::count();

    //     return view('dashboard' , $data);

    //     // يوجد طريقة اخرى انك تستدعيها على الصفحة مباشرة وتعتبر اسرع

    // }
}


