<?php

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sections')->delete();

        $Sections = [
            ['en'=> 'A', 'ar'=> 'أ'],
            ['en'=> 'B', 'ar'=> 'ب'],
            ['en'=> 'C', 'ar'=> 'ج'],
            ['en'=> 'D', 'ar'=> 'د'],
            ['en'=> 'E', 'ar'=> 'ه'],
            ['en'=> 'F', 'ar'=> 'و'],

        ];
        foreach ($Sections as $section) {
            Section::create([
                'Name_Section' => $section,
                'Status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Class_id' => Classroom::all()->unique()->random()->id
            ]);
        }
    }
}
