<?php

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['en'=> 'First grade', 'ar'=> 'الصف الأول'],
            ['en'=> 'Second Grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third Grade', 'ar'=> 'الصف الثالث'],
            ['en'=> 'Fourth Grade', 'ar'=> 'الصف الرابع'],
            ['en'=> 'Fifth Grade', 'ar'=> 'الصف الخامس'],
            ['en'=> 'Sixth  Grade', 'ar'=> 'الصف السادس'],

        ];
        foreach ($classrooms as $classroom) {
            Classroom::create([
            'Name_Class' => $classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);

        }
    }
}
