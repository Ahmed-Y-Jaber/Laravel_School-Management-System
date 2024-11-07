<?php

use Illuminate\Support\Facades\Route;



use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ------ ٍStart Gard --------
// Auth::routes();

Route::get('/', 'HomeController@index')->name('selection');

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');

    Route::post('/login','LoginController@login')->name('login');

    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');


    });

// ------ End Gard --------

// Auth::routes(['register' => false]);


Route::group(['middleware' => ['guest']] ,function(){

    // طول ما الزائر عامل تسجيل دخول لا تظهر له شاشة تسجيل الدخول مرة اخرى

// Route::get('/', function()
// {
//     return view('auth.login');

// });
});


//==============================Translate all pages============================

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

        // المفروض ما يزور الصفحات الا الى مسجل دخول صحيح
        // لذلك تم اضافة كلمة auth
        // داخل ال middleware

     //==============================dashboard============================

    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    // 1- go to App\Http\Controllers HomeControoler
    // 2-   public function index()
    // {
    //     return view('dashboard');

    // 3- go to app\http\controllers\auth\LoginController
    // we find protected $redirectTo = RouteServiceProvider::HOME;
    // go to  providers\RouteServiceProvider
    // public const HOME = '/dashboard';


    //==============================Grades============================

	Route::group(['namespace'=>'Grades'],function(){
        // لاني ضايف مجلد Grades
        // ، فمش حيقدر يشوف
        // GradeController
        // الا لما نكتب السطر الي فوق
        // ثم نكتب namespace App\Http\Controllers\Grades;
        // داخل صفحة GradeController
        Route::resource('Grades', 'GradeController');
    });

    //==============================Classrooms============================

	Route::group(['namespace'=>'Classrooms'],function(){

        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
    });


     //============================== Sections ============================


    Route::group(['namespace' => 'Sections'], function () {

        Route::resource('Sections', 'SectionController');

        Route::get('/classes/{id}', 'SectionController@getclasses');
        // from ajax code to view classes
        // getclasses function  -- from section controller

    });

    Route::get('test', function () {
        // return "ff";
        return view('test_pg');

    });


        //==============================parents============================

    Route::view('add_parent','livewire.show_Form')->name('add_parent');
        // copy the empty page and past to livewire and rename to show_form






    //==============================Teachers============================
    Route::group(['namespace' => 'Teachers'], function () {
        Route::resource('Teachers', 'TeacherController');
    });



    //==============================Students============================
    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('Promotion', 'PromotionController');
        Route::resource('Fees_Invoices', 'FeesInvoicesController');

        // Route::get('/Print_invoice/{id}', 'FeesInvoicesController@Print_invoice'); // Print
        Route::resource('Fees', 'FeesController');

        Route::resource('online_classes', 'OnlineClasseController');
        Route::resource('receipt_students', 'ReceiptStudentsController');
        Route::resource('ProcessingFee', 'ProcessingFeeController');
        Route::resource('Payment_students', 'PaymentController');

        Route::resource('library', 'LibraryController');
        Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');

        Route::resource('Attendance', 'AttendanceController');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');

        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');


//        Route::resource('Posts', 'PostController');

        // Route::get('/view_post/{id}', [PostController::class,'view_post']);
        // Route::get('Post/{id}', [app\Models\Post::class,'view_post'])->name('Posts');

        // route::get('x/{id}', [controllername, 'functionname'])->name('routename');

        // Route::get('lastservice/{id}',[Frontend\Allservices::class,'showlast'])->name('lastservice.showlast');


    });

    //==============================subjects============================
    Route::group(['namespace' => 'Subjects'], function () {
        Route::resource('subjects', 'SubjectController');
});

         //==============================Quizzes============================
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });


        //==============================questions============================
    Route::group(['namespace' => 'questions'], function () {
        Route::resource('questions', 'QuestionController');
    });

    //==============================Setting============================
    Route::resource('settings', 'SettingController');
});



