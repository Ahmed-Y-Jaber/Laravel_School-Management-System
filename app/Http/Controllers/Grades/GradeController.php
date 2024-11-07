<?php



namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use app\http\Controllers\Grades;
use App\Models\Grade;
use Illuminate\Validation\ValidationData;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;



class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

    $Grades = Grade::all();
    return view('pages.Grades.Grades',compact('Grades'));

    // يجب ان نذهب الى
    //app\Models\Grade
    // نزبط  اسم name space
    //

    //return view('pages.Grades.Grades');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
//   public function store(Request $request)


    public function store (StoreGrades $request)
  {

        //  حتى نعمل تحقق كي لا يضيف اسم المرحلة مرتين
        // يوجد طريقتين
        // الاولى عبر باكيج
        // codezero-be
        // https://github.com/codezero-be/laravel-localized-routes

        // اما الافضل فهي الطريقة الثانية حتى لا يكون باكيجات كثيرة في المشروع
        // وهي من لارافيل
            // وتكتب قبل try

        if (Grade::where('Name->ar', $request->Name)->orWhere('Name->en',$request->Name_en)->exists()) {

            return redirect()->back()->withErrors(trans('Grades_trans.exists'));
        }


    // لكي تظهر رسالة الخطأ بصورة جميلة نستخدم try & catch
    try {
      // نعمل الخطوات التالية
    //   Validation
    // use App\Http\Requests\StoreGrades;
    //   php artisan make:request StoreGrades
    //
    //   app\http\requests\
    // $validator = Validator::make($request->all(), [
        // 'Name' => 'required',

      //      ]);

      $validated = $request->validated();

      // ثم اضافة ملف ال error
      // td Grades.blade

      // الخطوة التالية لازم اعمل ترجمة داخل قاعدة البيانات
      // نستخدم باكيج spati translitable
      // موقعها https://github.com/spatie/laravel-translatable
      //composer require spatie/laravel-translatable
      //php artisan vendor:publish --provider="Spatie\Translatable\TranslatableServiceProvider"
      // config --> translatable --> 'fallback_locale' => 'en',
      // go to model --> Grade
      // use Spatie\Translatable\HasTranslations;
      // يتم اضافة بعض الاكواد حسب شرح الموقع


      //-----------
      $Grade = new Grade();

      //طريقتين للترجمة
      // طريقة 1
    //   $translations = [
    //     'en' => $request->Name_en,
    //     'ar' => $request->Name
    //  ];
    //  $Grade->setTranslations('name', $translations);

        // طريقة 2
      $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
      $Grade->Notes = $request->Notes;
      $Grade->save();

      // لاظهار رسالة بنجاح العملية نستخدم
      // toastr package
      // https://github.com/yoeunes/toastr
      // Run ---> $ composer require yoeunes/toastr
      // config -- > app.php -- >  Yoeunes\Toastr\ToastrServiceProvider::class,
      // php artisan vendor:publish -- >  11

      //toastr()->success('Data has been saved successfully!');
      // بدي اترجم الرسالة

      toastr()->success(trans('messages.success'));

      return redirect()->route('Grades.index');
    }
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update (StoreGrades $request)
  {
    try {
        $validated = $request->validated();
        $Grades = Grade::findOrFail($request->id);
        $Grades->update([
          $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
          $Grades->Notes = $request->Notes,
        ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Grades.index');
    }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {

    // نضع شرط قبل الحذف للتأكد انه لا يوجد صفوف تابعة للمراحل
    // حتى لا يحذف الصفوف التابعة لها عند حذف المرحلة
    $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

    if($MyClass_id->count() == 0){

        $Grades = Grade::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Grades.index');
    }

    else{

        toastr()->error(trans('Grades_trans.delete_Grade_Error'));
        return redirect()->route('Grades.index');

    }


}



  }



?>
