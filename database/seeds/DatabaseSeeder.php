<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
//        $this->call(GradeTableSeeder::class);
//        $this->call(ClassroomsTableSeeder::class);
//        $this->call(SectionsTableSeeder::class);
        $this->call(BloodTableSeeder::class);
       $this->call(NationalitiesTableSeeder::class);
        $this->call(religionTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
//        $this->call(StudentsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
