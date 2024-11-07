<?php


namespace App\Http\Controllers\Sections;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use App\Http\Requests\StoreSections;
use App\Models\Teacher;

class SectionController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {



    //return view ('pages.Sections.Sections');

    $Grades = Grade::with(['Sections'])->get();
    // sections
    // هي العلاقة بين الجداول موضحة في
    //app/models/grade

    $list_Grades = Grade::all();


    $teachers = Teacher::all();
    /* تم اضافة السطر السابق حتى يأتي بأسماء المعلمين وقد تم انشائها بعد جدول العلاقات مني تو مني
        ايضا تم اضافة ال
      teachers in compact in the next
      حتى يأتي باسماء المعلمين في شاشة الاقسام*/
     return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));

  }

  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreSections $request)
  {



   try {

        $validated = $request->validated();
        $Sections = new Section();

        $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;
        $Sections->Status = 1;
        $Sections->save();

        $Sections->teachers()->attach($request->teacher_id);//تم اضافتها بعد انشاء علاقة مني تو مني واضافة المعلمين


        toastr()->success(trans('messages.success'));

        return redirect()->route('Sections.index');
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
  public function update(StoreSections $request)
  {

    try {
        $validated = $request->validated();
        $Sections = Section::findOrFail($request->id);

        $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;

        if(isset($request->Status)) {
          $Sections->Status = 1;
        } else {
          $Sections->Status = 2;
        }


        // update pivot tABLE
        if (isset($request->teacher_id)) {
            $Sections->teachers()->sync($request->teacher_id);
        } else {
            $Sections->teachers()->sync(array());
        }


        $Sections->save();
        toastr()->success(trans('messages.Update'));

        return redirect()->route('Sections.index');
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
  public function destroy(request $request)
  {

    Section::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Sections.index');


  }

  public function getclasses($id)
  {
      $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

      return $list_classes;
  }

}

?>
